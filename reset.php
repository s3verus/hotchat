<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Get Help!</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <form class="form" action="reset.php" method="post">
                <h1>reset!</h1>
                <input class="input" type="email" name="email" value="" placeholder="enter your email...">
                <input class="submit" type="submit" name="submit" value="Send">
            </form>
            <div class="change">
                <a href="index.php"><i class="fas fa-sign-in-alt"></i></a>
            </div>
        </main>
    </body>
</html>
<!-- TODO write it! -->
<?php
    if(isset($_POST["submit"])){
        header("location:index.php?er=checkYourEmail!");
    }
 ?>
