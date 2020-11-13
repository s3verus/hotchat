<?php
    include 'functions.php';
    if( ! isset($_SESSION["password"])){
        header("location:index.php?er=AccessDenied");
    }
    if (isset($_POST["submit"]) && ($_SESSION["password"] == $_POST["password"])) {
        $id=$_SESSION["id"];
        $username=$_POST["username"];
        $password=$_POST["new-password"];
        $email=$_POST["email"];
        $sql="UPDATE `users` SET `username`='$username',`password`='$password',`email`='$email' WHERE id='$id'";
        $res=mysqli_query($connect,$sql);
      header("location:index.php?er=profileUpdated!");
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Setting</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <form class="form" action="setting.php" method="post">
                <h1>Edit Profile</h1>
                <input class="input" type="text" name="username" value="<?php echo $_SESSION["username"]; ?>" placeholder="username">
                <input class="input" type="password" name="password" placeholder="old password">
                <input class="input" type="password" name="new-password" placeholder="new password">
                <input class="input" type="email" name="email" value="<?php echo $_SESSION["email"]; ?>" placeholder="email">
                <input class="submit" type="submit" name="submit" value="Edit">
            </form>
            <div class="change">
                <a href="main.php"><i class="fas fa-home"></i></a>
            </div>
        </main>
    </body>
</html>
