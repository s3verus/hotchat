<?php
    session_start();
    $_SESSION["username"]="";
    $_SESSION["password"]="";
    $_SESSION["permission"]="";
    session_destroy();
    header("location:index.php?er=signedOut")
 ?>
<!-- i thinks it's better solve redirecting and write a function for exit -->
