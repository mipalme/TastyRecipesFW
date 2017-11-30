<?php
include_once "includes/header.php";
use TastyRecipes\Util\Constants;
?>
<!DOCTYPE html>
<html>
    <head>         
        <title>index</title>    
    </head>
    <body>
        <?php
        if ($this->session->get(Constants::STATUS) == 'loginSuccess') {
            $this->session->set(Constants::STATUS, null);           
            ?>
            <div class="notification">
                <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                Login successful!
            </div>
        <?php }


        if ($this->session->get(Constants::STATUS) == 'Error') {
            $this->session->set(Constants::STATUS, null);
            ?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
            Error
        </div>
        <?php } ?>
        <p class="heavytext"> <a href ="Calendar"> Calendar </a> <br/> <br/>
            Welcome to Tasty Recipes, where we have 2 very nice recipes!! <br/> <br/>
            We have <a href ="Meatballs"> meatballs </a> <br>
            And also <a href ="Pancakes"> pancakes </a> <br/>                 
        </p>           
    </body>
</html>
