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
        <!-- TODO solve sending messages -->
    </div>
    <div class="chat-line">
        <a href="#"><i class="fas fa-paperclip"></i></a>
        <textarea class="message-bar" name="message" placeholder="write somethings..."></textarea>
        <input class="chat-btm" type="submit" name="send" value="send">
    </div>
</div>
