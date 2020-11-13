<?php
/*
DATABASE Structure

hot-chat:
-chat:
	id (AI)
	usersend
	usergive
	message

-users:
	id (AI)
	username (unique)
	password
	email (unique)
	pic (default.png)

*/

// TODO clean codes please
session_start();
function connect_db(){
    GLOBAL $connect;
    $connect = mysqli_connect("localhost","admin","iamnotadmin","hot-chat");
}
connect_db();

function getChats($user){
	GLOBAL $connect;
	$sql="SELECT * FROM `chat` WHERE usersend= '$user' OR usergive='$user' ORDER by `id` ASC ";
	$res=mysqli_query($connect,$sql);
	return $res;
}
function getPicture($id){
	GLOBAL $connect;
	$sql="SELECT * FROM `users` WHERE id = '$id' ORDER by `id` DESC ";
	$res=mysqli_query($connect,$sql);
	return $res;
}
function uploadPicture($id,$pre)
{
    GLOBAL $connect;
    $pic=$_FILES["pic"];
    if(is_uploaded_file($pic["tmp_name"])){
        $dst="pic/";
        if($pic["type"]=="image/jpg"){
		    $type="jpg";
        }else if($pic["type"]=="image/png"){
            $type="png";
        }else if($pic["type"]=="image/jpeg"){
            $type="jpeg";
        }
		$picname="pic".$pre.$id.$type;
        move_uploaded_file($pic["tmp_name"],$dst.$picname);
    }
    $sql="UPDATE `users` SET `pic`='$picname' WHERE id='$id'";
    $res=mysqli_query($connect,$sql);
	header("location:main.php?er=uploaded!");
}
// TODO create email Authentication
// TODO create Encryption function
// TODO solve logical bug on Authentication for main page
/*
function checkSession($user,$pass)
{
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $sql ="SELECT * FROM `users` where username='$username' and password='$password'";
    $res = mysqli_query($connect, $sql);
    if (mysqli_num_rows($res) > 0 ) {
        $row = mysqli_fetch_array($res, 1);
        if ($_SESSION["password"] != $row["password"]) {
            header("location:index.php?er=refused");
        }
    } else {
        header("location:index.php?er=refused");
    }
}
*/
?>

