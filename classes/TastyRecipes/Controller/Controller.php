<?php

namespace TastyRecipes\Controller;
use TastyRecipes\Model\User;
use TastyRecipes\Model\CommentHandler;

/**
 * The application's controller, all calls to the model pass through here.
 */
class Controller {

    public function register($uname, $pwd) {
        $user = new User($uname, $pwd);
        return $user->register($uname,$pwd);
    }

    public function login($uname, $pwd) {     
        $user = new User($uname, $pwd);    
        return $user->login($uname,$pwd);
    }

    public function readComments($recipe) {
        $cmh = new CommentHandler();
        $cmh->getComments($recipe);
    }

    public function postComment($comment, $recipe, $author) {     
        $cmh = new CommentHandler($comment, $recipe, $author);
        $cmh->postComment();
    }

    public function deleteComment() {
        $deleteComment = new DoDeleteComment();
    }

}
