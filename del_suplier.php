<?
include('db.php');
$del_temp = $_GET['id_del'];
function deltemp($del_temp)
{
$id = (int) $del_temp;  
mysql_query("DELETE FROM suplier WHERE `s_id`='$id'") or die(mysql_error());
print '<script language="javascript">alert("!!!Deleted Successfully!!!"); window.location="suplier_f.php"</script>';
echo  header('location: suplier_f.php');
}
deltemp($_GET['id_del']);
?>