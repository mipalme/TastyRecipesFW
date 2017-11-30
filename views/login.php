<?php
use TastyRecipes\Util\Constants;
?>
<!DOCTYPE html>
<html>
    <head>    
        <link rel="stylesheet" href="/TastyRecipesFW/resources/css/browserreset.css">
        <link rel="stylesheet" href="/TastyRecipesFW/resources/css/CSS.css">
        <link rel="stylesheet" href="/TastyRecipesFW/resources/css/enterInfo.css">
        <link href='https://fonts.googleapis.com/css?family=Akronim' rel='stylesheet'>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>     
        <h1 class="logo"> Tasty Recipes! </h1>
        <h2 class="home"> <a href ="index"> Home </a> </h2>
        <p class="heavytext"> Log in below </p>
        
        <?php
        if ($this->session->get(Constants::STATUS) == 'invalidUser') {
            $this->session->set(Constants::STATUS, null);
            ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                Invalid username
            </div>
            <?php }
            
            
            if ($this->session->get(Constants::STATUS) == 'invalidPassword') {
                $this->session->set(Constants::STATUS, null);?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                Wrong password
            </div>
        <?php } ?>
            
        <div class="container">
            <form method="post" action="Login">  
                <label><b>Username</b></label>


                <input type="text" placeholder="Enter Username" name="username" required>



                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>   



                <input type="submit" value='Login!'>  
            </form>
        </div>

    </body>
</html>
