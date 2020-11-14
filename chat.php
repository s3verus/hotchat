<div class="chat-main">
    <div class="chat-bar">
        <div class="info">
                <img src="pic/default.png" alt="user picture"> <!-- solve it -->
        </div>
    </div>
    <div class="chat-body">
        <?php
            $user=$_SESSION["username"];
            $res=getChats($user);
            while($row=mysqli_fetch_array($res,1)):
        ?>
                <div class="messages">
                    <div class="message-pic">
                        <img src="pic/default.png" alt="user picture"> <!-- solve it -->
                    </div>
                    <div class="pointer">

                    </div>
                    <div class="message-text">
                        <h1><?php echo $row["message"]; ?></h1> <!-- solve it -->
                    </div>
                </div>
        <?php
            $i=$i+1;
            endwhile;
        ?>
    </div> <!-- TODO solve sending messages -->
        <form class="chat-line" action="main.php" method="post">
            <a href="#"><i class="fas fa-paperclip"></i></a>
            <input class="message-bar" name="message" placeholder="write somethings...">
            <input class="chat-btm" type="submit" name="send" value="send">
        </form>
</div>
<?php
    if (isset($_POST["send"])) {
        $usersend=$_SESSION["username"];
        $usergive="";
        $message=$_POST["message"];
        $sql="INSERT INTO `chat`(`usersend`, `usergive`, `message`) VALUES ('$usersend','$usergive','$message')";
        $res=mysqli_query($connect,$sql);
        header("location:main.php");
    }
 ?>
