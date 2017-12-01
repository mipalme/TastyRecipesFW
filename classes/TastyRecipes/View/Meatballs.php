<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the meatballs page of the application.
 */
class Meatballs extends AbstractRequestHandler {

    protected function doExecute() {
        
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);
        
        $this->session->set(Constants::RECIPE, 'meatballs_recipe');
        
        $allComments = $contr->readComments($this->session->get(Constants::RECIPE));
        $allAuthors = $contr->getAuthors($this->session->get(Constants::RECIPE));
        $this->addVariable('comments', $allComments);  
        $this->addVariable('authors', $allAuthors);   
        
        return 'meatballs_recipe';
    }

}
