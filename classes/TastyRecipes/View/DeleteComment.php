<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the comment page of the application, as well as deleted a comment and loads all comments..
 */
class DeleteComment extends AbstractRequestHandler {
    private $commentContent, $commentAuthor;
    
    public function setCommentContent($commentContent){
        $this->commentContent = $commentContent;
    }
    
    public function setCommentAuthor($commentAuthor){
        $this->commentAuthor = $commentAuthor;
    }

    protected function doExecute() {
        
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
       
               
        $recipe = $this->session->get(Constants::RECIPE);
        
        $contr->deleteComment($this->commentContent, $recipe, $this->commentAuthor);
        
        $allComments = $contr->readComments($this->session->get(Constants::RECIPE));
        $allAuthors = $contr->getAuthors($this->session->get(Constants::RECIPE));
        $this->addVariable('comments', $allComments);  
        $this->addVariable('authors', $allAuthors);   
        
        $this->session->set(Constants::STATUS, 'commentDeleted');
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);
        
        return $recipe;
    }

}
