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
if (count($comments)> 0) {
    
    // output data of each row
    for ($i = 0; $i < count($comments); $i++) {            
        ?>        
        <form method="post" action="DeleteComment">
            <p class="breadtext">
                <?php echo $authors[$i] . ': '. $comments[$i]; ?>
                 <input type='hidden' name ='commentAuthor' value='<?php echo $authors[$i]?>'>
                 <input type='hidden' name ='commentContent' value='<?php echo $comments[$i]?>'>
        <?php if ($authors[$i] == $this->session->get(Constants::USERNAME)) { ?>                 
                    <input type="submit" value='Delete comment'>                                     
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


