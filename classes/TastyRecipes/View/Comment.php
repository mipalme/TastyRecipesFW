<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the login page of the application.
 */
class Comment extends AbstractRequestHandler {
private $comment;
    
    public function setComment($comment){
        $this->comment = $comment;
    }
    
    protected function doExecute() {
        
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);
        
        $author = $this->session->get(Constants::USERNAME);
        $recipe = $this->session->get(Constants::RECIPE);
        
        $contr->postComment($this->comment, $recipe, $author);
        
        
        return $recipe;
    }

}
