<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
/**
 * Shows the registration page of the application.
 *
 * 
 */
class ShowRegistration extends AbstractRequestHandler {
    protected function doExecute(){
        return 'registration';
    }
}
