<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <link rel="stylesheet" type="text/css" href="Public/Style/style.css">
</head>
<body>
    <?php require("header.php") ?>
    <?php echo $content?>
    <?php require("footer.php") ?>
</body>
</html>