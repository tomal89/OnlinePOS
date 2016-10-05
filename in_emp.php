<?
include('db.php');
$e_name = $_POST['e_name'];
$e_add = $_POST['e_add'];
$e_phone = $_POST['e_phone'];
$e_mob = $_POST['e_mob'];
$e_email = $_POST['e_email'];
$e_dis = $_POST['e_dis'];
$e_post  = $_POST['e_post'];
$e_sal  = $_POST['e_sal'];

mysql_query("INSERT INTO `employee` VALUES(
'',
'$e_name',
'$e_add',
'$e_phone',
'$e_mob',
'$e_email',
'$e_dis',
'$e_post',
'$e_sal')
");
echo mysql_error();	
print '<script language="javascript">alert("hoise "); window.location="employee_f.php"</script>'
?>