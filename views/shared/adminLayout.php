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
    <?php include('views/shared/menu/_adminMenu.php');?>
</div>
<div class="container content">
    <?php
        include ('includes/controller.php');
    ?>
</div>
<div class="myFooter">
    <?php include('views/shared/footer/adminFooter.php');?>
</div>

<?php loadJS(); ?>
</body>
</html>