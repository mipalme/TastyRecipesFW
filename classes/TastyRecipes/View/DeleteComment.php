<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the login page of the application.
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
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);
               
        $recipe = $this->session->get(Constants::RECIPE);
        
        $contr->deleteComment($this->commentContent, $recipe, $this->commentAuthor);
        
        $this->session->set(Constants::STATUS, 'commentDeleted');
        
        return $recipe;
    }

}
