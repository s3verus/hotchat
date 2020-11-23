<div class="chat-main">
    <div class="chat-bar">
        <div class="info">
                <img src="pic/default.png" alt="user picture"><!-- solve it -->
                <h4><?php echo $_GET["usr"]; ?></h4>
        </div>
    </div>
    <div class="chat-body">
        <?php
            $user=$_SESSION["username"];
            $res=getChats($user);
            while($row=mysqli_fetch_array($res,1)):
        ?>
                <!-- this is for reading messages -->
                <div class="messages">
        <?php
                    if ($_SESSION["username"] == $row["usersend"] && $_GET["usr"] == $row["usergive"]) {
        ?>
                    <div class="message-pic">
                        <img src="pic/default.png" alt="user picture">
                    </div>
                    <div class="pointer"></div>
                    <div class="message-text greenit">
                        <h1><?php echo $row["message"]; ?></h1>
                    </div>
        <?php
                    }elseif ($_SESSION["username"] == $row["usergive"] && $_GET["usr"] == $row["usersend"]) {
        ?>
                        <div class="message-pic">
                            <img src="pic/default.png" alt="user picture">
                        </div>
                        <div class="pointer"></div>
                        <div class="message-text">
                            <h1><?php echo $row["message"]; ?></h1>
                        </div>
        <?php
                    }
        ?>
                </div>
        <?php
            $i=$i+1;
            endwhile;
        ?>
    </div>
        <!-- this is for send messages -->
        <form class="chat-line" action="" method="post">
            <a href="#"><i class="fas fa-paperclip"></i></a>
            <input class="message-bar" name="message" placeholder="write somethings...">
            <input class="chat-btm" type="submit" name="send" value="send">
        </form>
</div>
<?php
    if (isset($_POST["send"])) {
        $usersend=$_SESSION["username"];
        $usergive=$_GET["usr"];
        $message=$_POST["message"];
        $sql="INSERT INTO `chat`(`usersend`, `usergive`, `message`) VALUES ('$usersend','$usergive','$message')";
        $res=mysqli_query($connect,$sql);
    }
 ?>
