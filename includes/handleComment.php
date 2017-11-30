<?php
session_start();
include 'dbh.php';

$recipe = $_SESSION['recipe'];
$author = $_SESSION['u_uname'];


//If submit button is clicked
if (isset($_POST['submit'])) {   
    //Post comment
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);
    $sql = "INSERT INTO comment (comment_author, comment_recipe, comment_content)"
            . " VALUES ('$author','$recipe','$comment')";
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
        header("Location: ../$recipe.php?comment=success");
        exit();
    }
    
    
  //If delete-button is clicked
} elseif (isset($_POST['delete'])) {
    $postID = $_POST['delete'];
    //Get the author of the comment that is to be removed
    $getAuthor = "SELECT comment_author FROM comment WHERE comment_postID='$postID'";
    $temp= mysqli_query($conn, $getAuthor);
    $temp2= mysqli_fetch_object($temp);
    $commentOwner=$temp2->comment_author;
    
    //Make sure the remover is the author
    if($author != $commentOwner){
        header("Location: ../$recipe.php?comment=noAuthority");
        exit();
    }
    //Delete comment
    $postID = $_POST['delete'];
    mysqli_query($conn, "DELETE FROM comment WHERE comment.comment_postID = '$postID'");
    header("Location: ../$recipe.php?comment=deleted");
    exit();
    
} else {
    header("Location: ../index.php?comment=error");
    exit();
}
