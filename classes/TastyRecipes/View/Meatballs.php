<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Shows the meatballs page of the application.
 */
class Meatballs extends AbstractRequestHandler {

    protected function doExecute() {
        return 'meatballs_recipe';
    }

}
