<?php 
session_start();
include('db.php');
$username=$_POST['username'];
$password=$_POST['password'];
$query = mysql_query("SELECT * FROM user WHERE Username= '$username'") or die(mysql_error());
$query1 = mysql_query("SELECT * FROM user WHERE Password = '$password'") or die(mysql_error());

$user= mysql_fetch_array($query);
$user1= mysql_fetch_assoc($query1);
if(isset($_POST['login'])){
	if(isset($_POST['username'])){
		if(isset($_POST['password'])){
			if (($password == $user1['Password']) && ($username == $user['Username'])){
			$_SESSION['user'] = $username;
			print '<script language="javascript">alert("Login Success"); window.location="home.php"</script>';
			}
			else{
				echo "Plase check your login details";
				include('login.php');
				}
				}
			else{
				echo "Plase check your password";
				include ('login.php');
				}
				}	 		
			else{
				echo "Plase check your user name!";
				include ('login.php');
				}

}
else {
		//echo"plase check that you filed out the login form!";
		include ('home.php');
		}
?>
