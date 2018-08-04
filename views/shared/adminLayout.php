<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php print $title ; ?></title>
        <?php
        loadCSS();
        loadFonts();
        ?>
</head>
<body>
<div class="myHeader">
    <?php //require('views/shared/header/adminHeader.php');?>
    <?php include('views/shared/menu/adminMenu.php');?>
</div>
<div class="container content">
        <?php
        print '<h2><a href="?controller='.$controller.'">'.ucwords($controller).'</a> | <i>'.ucwords($view).'</i></h2>';
        include('views/'.$controller.'/'.$view.".php");
        //require('views/'.$controller.'/'.$view.".php");
        ?>
</div>
<div class="myFooter">
    <?php include('views/shared/footer/adminFooter.php');?>
</div>

<?php loadJS(); ?>
</body>
</html>