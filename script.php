<?php
//signup
require 'connection.php';
$sql = "SELECT * FROM users";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_assoc($result);
	extract($row);

  if(isset($_POST['signup']) && $_POST['username'] != $row['username']){
  	$username = $_POST['username'];
  	$password = $_POST['password'];
  	$pw2 = $_POST['pw2'];
  	$firstname = ucwords($_POST['firstname']);
  	$lastname = ucwords($_POST['lastname']);
  	$email = $_POST['email'];

  	if($password == $pw2){
  		$password = sha1($password);

  		$sql = "INSERT INTO users (username, password, firstname, lastname, email, role) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', 'regular')";
  		mysqli_query($conn,$sql);

  		$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username' AND password = '$password'";

  		$result = mysqli_query($conn,$sql);

  		if(mysqli_num_rows($result)>0){
  		while($row = mysqli_fetch_assoc($result)){
  			extract($row);
  		$_SESSION['message']= "Login Successful";
  			$_SESSION['username'] = $username;
  			$_SESSION['firstname'] = $firstname;
  			$_SESSION['lastname'] = $lastname;
  			$_SESSION['id'] = $id;
  			$_SESSION['role'] = $role;

  			header('location:profile.php');

  		}
  	}		
  	}else if($_POST['username'] == $row['username']){
  		return '<p>Username already taken</p>';
  		
  	}else {
  		echo '<p>password did not match</p>';
  	}
  	
  }
}
//function login() {
require('connection.php');
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$email = $_POST['username'];
	$password = sha1($_POST['password']);
	$sql = "SELECT *
			FROM users
			WHERE username = '$username' OR email = '$username' AND password = '$password'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			extract($row);
			$_SESSION['message']= "Login Successful";
			$_SESSION['username'] = $username;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['id'] = $id;
			$_SESSION['role'] = $role;
		}
	}header('location:index.php');
}

//submit video
if(isset($_POST['submit_video'])){
	$title = $_POST["title"];
	$synopsis = $_POST['synopsis'];
	$url = $_POST['url'];
	$date_uploaded = date("Y-m-d");
	$filmmaker = $_POST['filmmaker'];
	$category = $_POST['category'];
	$user_id = $_SESSION['id'];
	$sql = "INSERT INTO videos (title, synopsis, url, date_uploaded, filmmaker, category, user_id)
			VALUES ('$title', '$synopsis', '$url', '$date_uploaded', '$filmmaker', '$category', '$user_id')";
	mysqli_query($conn,$sql);
	header('location:index.php');
}

function get_thumbnail($url){
	if(preg_match("/youtube/", $url)){
		$youtubeUrlArr = explode("=",$url);
		$youtubeVideoId = $youtubeUrlArr['1'];
		echo 'http://img.youtube.com/vi/'.$youtubeVideoId.'/hqdefault.jpg';
		}
	if(preg_match("/vimeo/", $url)){
		$vimeoUrlArr = explode("/", $url);
		$vimeoVideoId = $vimeoUrlArr[3];
		$arr_vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vimeoVideoId.php"));
	    $thumbURL = $arr_vimeo[0]['thumbnail_medium'];
	    echo $thumbURL;
	}	
}

function embed_video($url){
	if(preg_match("/youtube/", $url)){
		$youtubeUrlArr = explode("=",$url);
		$youtubeVideoId = $youtubeUrlArr['1'];
		echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$youtubeVideoId.'" frameborder="0" allowfullscreen></iframe>';
	}

	if(preg_match("/vimeo/", $url)){
		$vimeoUrlArr = explode("/", $url);
		$vimeoVideoId = $vimeoUrlArr[3];
		$arr_vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vimeoVideoId.php"));
    	echo '<iframe src="https://player.vimeo.com/video/'.$vimeoVideoId.'?color=ece6e5&title=0&byline=0&portrait=0&badge=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}	
}
//delete video
if(isset($_POST['deletevideo'])){
	require ("connection.php");
	$id = $_GET['v'];	
	$sql = "DELETE
			FROM videos
			WHERE id='$id'";	
	mysqli_query($conn,$sql);
	header('location:videos.php');
}		
?>