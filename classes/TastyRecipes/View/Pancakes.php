<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the pancakes page of the application.
 */
class Pancakes extends AbstractRequestHandler {

    protected function doExecute() {
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        
        $this->session->set(Constants::RECIPE, 'pancakes_recipe');
        
        $allComments = $contr->readComments($this->session->get(Constants::RECIPE));
        $allAuthors = $contr->getAuthors($this->session->get(Constants::RECIPE));
        $this->addVariable('comments', $allComments);  
        $this->addVariable('authors', $allAuthors);  
        
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);
        
        return 'pancakes_recipe';
    }

}
