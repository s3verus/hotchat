<?php
include 'functions.php';
if( ! isset($_SESSION["password"])){
    header("location:index.php?er=AccessDenied");
}
if(isset($_POST["upload"])){
    $id=$_SESSION["id"];
    $pre=$_SESSION["username"];
    uploadPicture($id,$pre);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <form class="form" action="profile.php" method="post" enctype="multipart/form-data">
                <h1>upload</h1>
                <input type="file" name="pic">
                <input class="submit" type="submit" name="upload" value="upload">
            </form>
            <div class="change">
                <a href="main.php"><i class="fas fa-home"></i></a>
            </div>
        </main>
    </body>
</html>
