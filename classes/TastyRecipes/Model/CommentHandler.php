<?php

namespace TastyRecipes\Model;

use TastyRecipes\Integration\DatabaseHandler;

/**
 * Description of CommentHandler
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

    public function deleteComment($postID) {
        $database = new DatabaseHandler($this->author, null, $this->comment);
        $database->removeComment($postID);
    }

    public function getComments($recipe) {
        $database = new DatabaseHandler($this->author, null, $this->comment);
        $result = $database->getAllComments($recipe);
        $comments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comments[] = $row["comment_author"] . ": " . $row["comment_content"];
            }
        }
        return $comments;
    }
}
