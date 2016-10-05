<?
include('db.php');
$c_name = $_POST['c_name'];
$c_add = $_POST['c_add'];
$c_phone = $_POST['c_phone'];
$c_mob = $_POST['c_mob'];
$c_email = $_POST['c_email'];
$c_dis = $_POST['c_dis'];
mysql_query("INSERT INTO `customer` VALUES(
'',
'$c_name',
'$c_add',
'$c_phone',
'$c_mob',
'$c_email',
'$c_dis')
");
echo mysql_error();	
print '<script language="javascript">alert("!!!Save!!!"); window.location="customer_f.php"</script>';
?>