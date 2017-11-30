<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Shows the pancakes page of the application.
 */
class Pancakes extends AbstractRequestHandler {

    protected function doExecute() {
        return 'pancakes_recipe';
    }

}
