<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'PW4';
$link = mysqli_connect($host,$user,$pass, $database);
if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
		}
$username = mysqli_real_escape_string($link,$_POST['username']);
$password = mysqli_real_escape_string($link,$_POST['password']);
$query = "SELECT username, password, fullname, email, power_animal FROM Users WHERE username = '$username';";
$result = mysqli_query ($link,$query) or die(mysqli_error($link));
	if(isset($_POST['username']) && !empty($_POST["username"])){
		    if(mysqli_num_rows($result)>0){
				$userData = mysqli_fetch_array($result, MYSQLI_NUM);
					if($_POST['password'] == $userData[1]){
						$_SESSION["session_username"]=$userData[0];
						$_SESSION["session_password"]=$userData[1];
						$_SESSION["session_fullname"]=$userData[2];
						$_SESSION["session_email"]=$userData[3];
						$_SESSION["session_animal"]=$userData[4];
						$_COOKIE["cookie_username"]=$username;
				    	include 'welcome.php';
				    	$wait = 5;
					}else{
				        echo "<script>
				       	  alert('Password did not match ! please try again');
				       	  window.location.href='login.html';
				       	  </script>";
					}
		    } else {
		        echo "<script>
		       	  alert('UserName not found please try again');
		       	  window.location.href='login.html';
		       	  </script>";
		    	}
		    mysqli_free_result($result);
		}
		mysqli_close($link);
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data; 
		}
?>