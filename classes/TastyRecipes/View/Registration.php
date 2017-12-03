<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * This class handles registration.
 */
class Registration extends AbstractRequestHandler {
    private $username, $password;
    
    public function setUsername($username){
        $this->username = htmlentities($username);
    }
    public function setPassword($password){
        $this->password = $password;
    }
    
    protected function doExecute() {
        if(empty($this->username) | empty($this->password)){
            return 'index';
        }
       
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);
        
        $result = $contr->register($this->username, $this->password);
        if ($result == 'RegistrationSuccess'){            
            $this->session->set(Constants::STATUS, 'registrationSuccess');
        }
        elseif ($result == 'UsernameTaken'){            
            $this->session->set(Constants::STATUS, 'nameTaken');
        }
        elseif ($result == 'InvalidCharacters'){            
            $this->session->set(Constants::STATUS, 'registrationInvalid');
        }
        return 'registration';
    }

}
