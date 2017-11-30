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
        <title>registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1 class="logo"> Tasty Recipes! </h1>
        <h2 class="home"> <a href ="index"> Home </a> </h2>
        <p class="heavytext"> Register below </p><
        
        <?php
        if ($this->session->get(Constants::STATUS) == 'registrationSuccess') {
            $this->session->set(Constants::STATUS, null);
            ?>
            <div class="notification">
                <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                Registration successful!
            </div>
            <?php }
            
            
            if ($this->session->get(Constants::STATUS) == 'registrationInvalid') {
                $this->session->set(Constants::STATUS, null);?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                Invalid username or password
            </div>
        <?php } 
        
        if ($this->session->get(Constants::STATUS) == 'nameTaken') {
            $this->session->set(Constants::STATUS, null);?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                That username is already taken
            </div>
        <?php } ?>
           
        <div class="container">
            <form action="Registration" method="POST">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                     
                <input type="submit" value='Register!'>  
            </form>
        </div>
        
    </body>
</html>
