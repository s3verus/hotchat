<?php
include 'functions.php';
//God damn you, what is it?!?! solve it before messing up!
if($_SESSION["password"] == ""){
    header("location:index.php?er=AccessDenied");
}
// TODO solve private chat for phone devices
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>hot chat!</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="css/chat.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript">
            function openNav() {
                document.getElementById("open").style.display = "none";
                document.getElementById("nav").style.display = "block";
                document.getElementById("nav").style.width = document.getElementById("aside").style.width;
                document.getElementById("close").style.display = "block";
            }
            function closeNav() {
                document.getElementById("close").style.display = "none";
                document.getElementById("nav").style.width = "0%";
                document.getElementById("open").style.display = "block";
            }
        </script>
    </head>
    <body>
        <main>
            <aside id="aside">
                <div class="bar">
                    <div class="menu">
                        <a id="close" class="close" onclick="closeNav()"><i class="fas fa-times"></i></a>
                        <a id="open" onclick="openNav()"><i class="fas fa-bars"></i></a>
                    </div>
                    <input class="search" type="text" name="search" placeholder="search..."> <!-- write user searching -->
                </div>
                <div class="aside">
                <?php
                        $user=$_SESSION["username"];
                        $res=getChats($user);
                        $i=1;
                        while($row=mysqli_fetch_array($res,1)):
                            if ($_SESSION["username"] == $row["usersend"]) {
                ?>
                                <a href="main.php?usr=<?php echo $row["usergive"]; ?>">
                <?php
                            }else{
                ?>
                                <a href="main.php?usr=<?php echo $row["usersend"]; ?>">
                <?php
                            }
                ?>
                            <div class="lists"> <!-- i add some bugs here -->
                <?php
                            if ($_SESSION["username"] == $row["usersend"]) {
                ?>
                                <img src="pic/default.png" alt="user picture"> <!-- solve this show user pic -->
                                <h1><?php echo $row["usergive"]; ?></h1>
                <?php
                            }else {
                ?>
                                <img src="pic/default.png" alt="user picture"> <!-- solve this show user pic -->
                                <h1><?php echo $row["usersend"]; ?></h1>
                <?php
                            }
                ?>
                            </div>
                            </a>
                <?php
                            $i=$i+1;
                        endwhile;
                ?>
                </div>
                <div class="nav" id="nav">
                    <div class="proPic">
                    <?php
                        $id=$_SESSION["id"];
                        $res=getPicture($id);
                        while($row=mysqli_fetch_array($res,1)):
                    ?>
                            <img src="pic/<?php echo $row["pic"];?>" alt="profile picture" width="100px" height="100px">
                    <?php
                        endwhile;
                    ?>
                    </div>

                    <h3><?php echo $_SESSION["username"]; ?></h3>
                    <a href="main.php">Home</a>
                    <a href="profile.php">Profile</a>
                    <a href="#">Messages</a>
                    <a href="setting.php">Setting</a>
                    <a href="exit.php">Exit</a>
                </div>

            </aside>
            <article class="">
                <?php
                if(isset($_GET["usr"])){
                    include 'chat.php';
                }
                ?>
            </article>
        </main>
    </body>
</html>
