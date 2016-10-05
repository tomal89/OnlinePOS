<?php
include('db.php');
if(isset($_POST["back"]))
{
echo  header('location: edit_del_suplier.php');
}

$s_id = $_POST['s_id'];
$s_name = $_POST['s_name'];
$s_i_code = $_POST['s_i_code'];
$c_name = $_POST['c_name'];
$s_add = $_POST['s_add'];
$s_phone = $_POST['s_phone'];
$s_email = $_POST['s_email'];
$s_web = $_POST['s_web'];
$s_dis = $_POST['s_dis'];


$sql="UPDATE suplier SET 
`s_name` = '$s_name' ,
`c_name` = '$c_name' , 
`s_i_code` = '$s_i_code' , 
`s_add` = '$s_add' , 
`s_phone` = '$s_phone' , 
`s_email` = '$s_email' ,
`s_web` = '$s_web' ,
`s_dis` = '$s_dis' 
WHERE s_id= $s_id ";
mysql_query($sql) or die (mysql_error());

print '<script language="javascript">alert("!!!Update!!!"); window.location="edit_del_suplier.php"</script>';







