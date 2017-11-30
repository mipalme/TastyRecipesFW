<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Shows the calendar page of the application.
 */
class Calendar extends AbstractRequestHandler {

    protected function doExecute() {
        return 'calendar';
    }

}
