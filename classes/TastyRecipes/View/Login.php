<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the login page of the application.
 */
class Login extends AbstractRequestHandler {
private $username, $password;
    
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    
    protected function doExecute() {
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);
        
        if ($contr->login($this->username, $this->password) == 'loginSuccess'){
            $this->session->set(Constants::USERNAME, $this->username);
            $this->session->set(Constants::STATUS, 'loginSuccess');         
            return 'index';
        } 
        else if ($contr->login($this->username, $this->password) == 'invalidUser') {
            $this->session->set(Constants::STATUS, 'invalidUser');         
            return 'login';
        }
        else if ($contr->login($this->username, $this->password) == 'invalidPassword'){
            $this->session->set(Constants::STATUS, 'invalidPassword');
            return 'login';
        }
         
    }

}
