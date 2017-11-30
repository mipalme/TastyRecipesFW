<p class = "heavytext" >Comments</p>
<?php

use TastyRecipes\Util\Constants;

if ($this->session->get(Constants::STATUS) == 'commentDeleted') {
    $this->session->set(Constants::STATUS, null);
    ?>
    <div class="notification">
        <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
        Comment deleted!
    </div>
<?php } ?>

<?php

//Loop through all the comments and post them in the order of their ID.       
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>        
        <form method="post" action="Comment">
            <p class="breadtext">
                <?php echo $row["comment_author"] . ": " . $row["comment_content"]; ?>
        <?php if ($_SESSION['u_uname'] == $row["comment_author"]) { ?>
                    <button type="submit" class="deleteButton" name="delete" value=<?php echo $row["comment_postID"] ?>>
                        Delete comment
                    </button>
        <?php } ?>
            </p>
        </form>   
        <?php
    }
} else {
    echo "There are no comments for this recipe yet";
}

//Submitting comments
if ($this->session->get(Constants::USERNAME) != null) {
    ?>
    <h2>Leave a comment:</h2>
    <form method="post" action="Comment">  
        <textarea name="comment" placeholder="Your comment" name='comment' maxLength="256" required></textarea>      
        <input type="submit" value='Submit'>
    </form>
<?php } else { ?>
    <h2>Log in to leave a comment</h2>
<?php } ?>


