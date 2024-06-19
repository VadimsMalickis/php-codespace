<?php
    // jābūt login formai
    
    // jābūt iespējai ielogoties kā admins
    
    // jābūt iespējai pievienot bloga ierakstu blog.csv failā
    include "classes/FormManager.php";
    session_start();
    $adminUsername = "admin";
    $adminPassword = "123";

    if (FormManager::isPostRequest() && !isset($_SESSION["admin"])) {
        if ($_POST["login"] == $adminUsername && $_POST["password"] == $adminPassword) {
            $_SESSION["admin"] = true;
            FormManager::redirectToPage("admin.php");
        } else {
            echo "Wrong credentials";
            exit();
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "inc/head.php";?>
<body>
    <?php if (isset($_SESSION["admin"])):?>
        <form action="" method="POST">
            <label for="blog-title">Blog title:</label>
            <input type="text" id="blog-title" name="blog-title">
            <label for="blog-content">Blog content:</label>
            <input type="text" id="blog-content" name="blog-content">
        <input type="submit" value="Submit">
    </form>
    <?php else: ?>
        <form action="" method="POST">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
</body>
</html>