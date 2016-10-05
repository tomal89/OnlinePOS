<?php
session_start();
if(isset($_SESSION['user'])){
	header('location:home.php');
}
else{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="vab.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-image: url();
}
</style>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link rel="icon"  type="image/png" href="image/icon.png">
</head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zsoft Sales Application </title>



<body>
<div style="width:100%;; height:70px; background-color:#3B5998; margin-bottom:10px;color:#FFF;font-size:25px;" align="center">
M/S IHSAN ALI BISWAS.
		<div style="font-size:12px;" >Yusuf Biswas Merket , 356, Sonapotty , Pabna, Contact : 01711316910 0731-65221</div>
</div>
<form action="dologin.php" method="post">
<table align="center">
  <td colspan="2" align="center">
 <img src="image/online_img/User-icon.png" width="99" height="85"></td>
<tr>
	<td><span>User Name: </span></td>
	<td><input required type="text" name="username" size="25"/></td>
</tr>

<tr>
	<td><span>Password:</span></td>
	<td><input  required type="password" name="password" size="25"/></td>
</tr>
  <td colspan="2" align="right">
  
  <input type="submit" name="login" value="Login" class="submit"/>
<button type="reset" class="reset" />Reset</button>


</td>
</table>
</form>
<?php 
}
?>
<div style="width:100%;; height:40px; background-color:#3B5998; color:#FFF; margin-top:20px;" align="center">@Copy Right Zsoft IT Solution Pvt. Ltd . +8801727002781, Web: Zsoft.com.bd. 


&nbsp;&nbsp;&nbsp; <b> Not registered?  </b>&nbsp;&nbsp;&nbsp;
  <a href="http://zsoft-bd.com/">Create an account</a> &nbsp;&nbsp;&nbsp;<a href="change_pass.php"> Change Password </a></div>
</body>
</html>

