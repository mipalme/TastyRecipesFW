<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the login page of the application.
 */
class Logout extends AbstractRequestHandler {

    
    protected function doExecute() { 
        $this->session->set(Constants::USERNAME, null);
        $this->session->set(Constants::STATUS, null);
        return 'index';
    }

}
