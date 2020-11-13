<?php
include 'functions.php';
if (isset($_POST["submit"])) {
    $user=mysqli_real_escape_string($connect,$_POST["username"]);
    $pass=mysqli_real_escape_string($connect,$_POST["password"]);
    $sql="SELECT * FROM `users` WHERE username='$user' AND password='$pass'";
    $res=mysqli_query($connect,$sql);

    if (mysqli_num_rows($res) > 0) {
        session_start();
        $row = mysqli_fetch_array($res, 1);
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["email"] = $row["email"];
        header("location:main.php");
    } else {
        header("location:index.php?er=nologin");
    }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="send free message...">
        <meta name="keywords" content="chat,hot,message,online">
        <meta name="robots" content="index, follow">
    </head>
    <body>
        <main>
            <form class="form" action="index.php" method="post">
                <h1>Login</h1>
                <input class="input" type="text" name="username" value="" placeholder="username">
                <input class="input" type="password" name="password" value="" placeholder="password">
                <input class="submit" type="submit" name="submit" value="Login">
            </form>
            <div class="change">
                <a href="signup.php"><i class="fas fa-user-plus"></i></a>
                <a href="reset.php"><i class="fas fa-user-cog"></i></a>
            </div>
        </main>
    </body>
</html>
