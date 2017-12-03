<?php
include_once "includes/header.php";
include_once "resources/XML/simpleXML.php";
use TastyRecipes\Util\Constants;
$this->session->set(Constants::RECIPE, 'pancakes_recipe');
$cookbook = $xmlstr;
$recipeNumber = 1;
?>
<!DOCTYPE html>
<html>
    <head>         
        <title>pancakes_recipe</title>    
    </head>
    <body>        
        <?php include_once "includes/recipeContent.php" ?> 
        <p> <a href ="Meatballs"> Check out our meatballs recipe! </a> <br/> <br/>
            <?php
            include_once "includes/comments.php";
            ?>
    </body>
</html>
