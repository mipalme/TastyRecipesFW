<?php

namespace TastyRecipes\Model;

use TastyRecipes\Integration\DatabaseHandler;

/**
 * A class in which all comment handling is done.
 *
 * @author Michael
 */
class CommentHandler {

    private $comment, $author, $recipe;

    public function __construct($comment, $recipe, $author) {
        $this->comment = $comment;
        $this->author = $author;
        $this->recipe = $recipe;
    }

    public function postComment() {
        $database = new DatabaseHandler($this->author, null, $this->comment);
        $database->insertComment($this->comment, $this->recipe, $this->author);
    }

    public function deleteComment() {      
        $database = new DatabaseHandler($this->author, null, $this->comment);
        $database->removeComment($this->recipe);
    }

    public function getComments($recipe) {
        $database = new DatabaseHandler(null, null, null);
        $result = $database->getAllComments($recipe);
        $comments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {             
                $comments[] = $row["comment_content"];
            }
        }
        return $comments;
    }
    public function getAuthors($recipe) {
        $database = new DatabaseHandler(null, null, null);
        $result = $database->getAllAuthors($recipe);
        $authors = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $authors[] = $row["comment_author"];            
            }
        }
        return $authors;
        
    }
}
