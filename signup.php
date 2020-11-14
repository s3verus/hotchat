<?php
include 'functions.php';
if (isset($_POST["submit"])) {
    $user=$_POST["username"];
    $pass=md5($_POST["password"]);
    $email=$_POST["email"];
    $sql="INSERT INTO `users`( `username`, `password`, `email`) VALUES ('$user','$pass','$email')";
    $res=mysqli_query($connect,$sql);
    header("location:index.php?er=registered!");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sign up!</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <form class="form" action="signup.php" method="post">
                <h1>Sign up!</h1>
                <input class="input" type="text" name="username" value="" placeholder="username">
                <input class="input" type="password" name="password" value="" placeholder="password">
                <input class="input" type="email" name="email" value="" placeholder="email">
                <input class="submit" type="submit" name="submit" value="Sign up!">
            </form>
            <div class="change">
                <a href="index.php"><i class="fas fa-sign-in-alt"></i></a>
            </div>
        </main>
    </body>
</html>
