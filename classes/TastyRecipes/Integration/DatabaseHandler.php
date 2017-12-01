<?php

namespace TastyRecipes\Integration;

/**
 * All communication with the database is done in this class.
 */
class DatabaseHandler {

    private $uname, $pwd, $conn, $comment;

    public function __construct($username, $password, $comment) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $dbServername = "localhost";
        $dbUsername = "root2";
        $dbPassword = "";
        $dbName = "loginsystem";

        $this->conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
        if ($this->conn->connect_error) {
            die("Connection failed " . $conn->connect_error);
        }
        $this->uname = $username;
        $this->pwd = $password;
        $this->comment = $comment;
    }
    public function getUser ($uname){
        $sql = "SELECT * FROM users WHERE user_uname = '$uname'";
        return mysqli_query($this->conn, $sql);
    }
    public function insertUser($uname, $pwd) {
        $validateduname = $this->conn->real_escape_string($uname);
        $validatedpwd = $this->conn->real_escape_string($pwd);
        $hashed_pwd = password_hash($validatedpwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user_uname,user_pwd) VALUES ('$validateduname','$hashed_pwd')";
        mysqli_query($this->conn, $sql);
    }

    public function checkLogin($uname) {
        $sql = "SELECT * FROM users WHERE user_uname='$uname'";
        return mysqli_query($this->conn, $sql);      
    }

    public function insertComment($comment, $recipe, $author) {      
        $validatedcomment = $this->conn->real_escape_string($comment);
        $sql = "INSERT INTO comment (comment_author, comment_recipe, comment_content)"
                . " VALUES ('$author','$recipe','$validatedcomment')";
        mysqli_query($this->conn, $sql);   
    }
    public function removeComment($recipe){     
        $sql = "DELETE FROM comment WHERE comment_content = '$this->comment' AND comment_author = '$this->uname' AND comment_recipe = '$recipe'";
        mysqli_query($this->conn, $sql); 
    }
    public function getAuthor($postID){
        $sql = "SELECT comment_author FROM comment WHERE comment_postID='$postID'";
        $temp= mysqli_query($this->conn, $sql);
        $temp2= mysqli_fetch_object($temp);
        $author=$temp2->comment_author;
        return $author;
    }
    public function getAllComments($recipe){
        $sql = "SELECT comment_postID, comment_author, comment_content FROM comment WHERE comment_recipe = '$recipe'";
        return mysqli_query($this->conn, $sql);
    }
    public function getPostID(){
        $sql = "SELECT comment_postID FROM comment WHERE comment_content = '$this->comment'";
        return mysqli_query($this->conn, $sql);
    }
    public function getAllAuthors($recipe){
        $sql = "SELECT comment_postID, comment_author, comment_content FROM comment WHERE comment_recipe = '$recipe'";
        return mysqli_query($this->conn, $sql);
    }

}
