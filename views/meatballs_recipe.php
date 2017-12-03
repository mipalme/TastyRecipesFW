<?php
include_once "includes/header.php";
include_once "resources/XML/simpleXML.php";
use TastyRecipes\Util\Constants;
$this->session->set(Constants::RECIPE, 'meatballs_recipe');
$cookbook = $xmlstr;
$recipeNumber = 0;
?>
<!DOCTYPE html>
<html>
    <head>         
        <title>meatballs_recipe</title>    
    </head>
    <body>        
        <?php include_once "includes/recipeContent.php" ?>     
        <p> <a href ="Pancakes"> Check out our pancakes recipe! </a> <br/> <br/>
            <?php
            include_once "includes/comments.php";            
            ?>
    </body>
</html>
