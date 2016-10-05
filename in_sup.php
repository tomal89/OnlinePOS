<?
include('db.php');
$s_name = $_POST['s_name'];
$s_i_code = $_POST['s_i_code'];
$c_name = $_POST['c_name'];
$s_add = $_POST['s_add'];
$s_phone = $_POST['s_phone'];
$s_mob = $_POST['s_mob'];
$s_email = $_POST['s_email'];
$web = $_POST['web'];
$s_dis = $_POST['s_dis'];
mysql_query("INSERT INTO `suplier` VALUES(
'',
'$s_name',
'$c_name',
'$s_i_code',
'$s_add',
'$s_phone',
'$s_mob',
'$s_email',
'$web',
'$s_dis')
");
echo mysql_error();	
print '<script language="javascript">alert("Save Successfully"); window.location="suplier_f.php"</script>'
?>