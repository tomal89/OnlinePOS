<?
include('db.php');
$del_temp = $_GET['id_del'];
function deltemp($del_temp)
{
$id = (int) $del_temp;  
mysql_query("DELETE FROM suplier WHERE `s_id`='$id'") or die(mysql_error());
print '<script language="javascript">alert("!!!Deleted Successfully!!!"); window.location="edit_del_suplier.php"</script>';
echo  header('location: edit_del_suplier.php');
}
deltemp($_GET['id_del']);
?>