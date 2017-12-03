<?php


namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
/**
 * Shows the login page of the application.
 *
 */
class ShowLogin extends AbstractRequestHandler {
    protected function doExecute(){
        return 'login';
    }
}
