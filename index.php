<!DOCTYPE html>
<html>
    <head>
        <title>Page TEST</title>
    </head>
    <body>
        <form method="post">
            <input type="password" name="pass">
            <input type="submit" value="get hash!">
        </form>
        <?php
            if (isset($_POST['pass'])){
                echo password_hash($_POST['pass'], PASSWORD_DEFAULT);
            }
        ?>
    </body>
</html>