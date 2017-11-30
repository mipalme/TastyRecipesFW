<?php


namespace TastyRecipes\Model;

use TastyRecipes\Integration\DatabaseHandler;

/**
 * Description of User
 *
 * @author Michael
 */
class User {
    private $uname, $pwd;

    public function __construct($uname, $pwd) {
        $this->uname = $uname;
        $this->pwd = $pwd;
    }
    
    public function login($uname, $pwd) {
        $database = new DatabaseHandler($uname, $pwd, null);
        $result = $database->checkLogin($this->uname);
        $resultCheck = mysqli_num_rows($result);
        
         if ($resultCheck < 1) {
            return 'invalidUser';
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                if (!password_verify($pwd, $row['user_pwd'])) {
                    return 'invalidPassword';
                } elseif (password_verify($pwd, $row['user_pwd'])) {
                    return 'loginSuccess';
                }
            }
        }
        return $database->checkLogin($this->uname, $this->pwd);
    }
    
    public function register ($uname, $pwd){     
        $database = new DatabaseHandler($uname, $pwd, null);
        if (!preg_match("/^[a-zA-Z]*$/", $uname) || !preg_match("/^[a-zA-Z]*$/", $pwd)) {
            return 'InvalidCharacters';            
        }
        elseif(mysqli_num_rows($database->getUser($uname))>0){
            return 'UsernameTaken';
        }
        else{
        $database->insertUser($this->uname, $this->pwd);
        return 'RegistrationSuccess';
        }
    }
}