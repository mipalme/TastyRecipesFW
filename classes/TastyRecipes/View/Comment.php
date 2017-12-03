<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the comment page of the application, as well as posts a comment and loads the comments.
 */
class Comment extends AbstractRequestHandler {
private $comment;
    
    public function setComment($comment){      
        $this->comment = htmlentities($comment);
    }
    
    protected function doExecute() {
        if(empty($this->comment)){
            return 'index';
        }
        
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        
        
        $author = $this->session->get(Constants::USERNAME);
        $recipe = $this->session->get(Constants::RECIPE);    
        
        $contr->postComment($this->comment, $recipe, $author);
        
        $allComments = $contr->readComments($this->session->get(Constants::RECIPE));
        $allAuthors = $contr->getAuthors($this->session->get(Constants::RECIPE));
        $this->addVariable('comments', $allComments);  
        $this->addVariable('authors', $allAuthors);  
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);
        
        
        return $recipe;
    }

}
