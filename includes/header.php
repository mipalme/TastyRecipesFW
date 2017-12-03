<?php      
    use TastyRecipes\Util\Constants;
?>
<html>
    <head> 
        <link rel="stylesheet" href="/TastyRecipesFW/resources/css/browserreset.css">
        <link rel="stylesheet" href="/TastyRecipesFW/resources/css/CSS.css">
        <link rel="stylesheet" href="/TastyRecipesFW/resources/css/enterInfo.css">
        <link href='https://fonts.googleapis.com/css?family=Akronim' rel='stylesheet'>
        <title>header</title> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php  if ($this->session->get(Constants::USERNAME) != null) { ?>   
         <p class ="loginOrRegister"> <a href ="Logout"> Log out </a> </p>
         <p class ="loginOrRegister"> Logged in as: <?php echo htmlentities($this->session->get(Constants::USERNAME)); ?> </p>
        <?php } elseif ($this->session->get(Constants::USERNAME) == null) { ?>
         <p class ="loginOrRegister"> <a href ="ShowLogin"> Log in </a> </p>
         <p class ="loginOrRegister"> <a href ="ShowRegistration"> Register here </a> </p>
        <?php } ?>     
         <h1 class="logo"> Tasty Recipes! </h1>
         <h2 class="home"> <a href ="FrontPage"> Home </a> </h2>
    </body>
</html>