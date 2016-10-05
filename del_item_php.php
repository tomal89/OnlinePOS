<?
include('db.php');
$del_temp = $_GET['id_del'];
function deltemp($del_temp)
{
$id = (int) $del_temp;  
mysql_query("DELETE FROM item WHERE `i_id`='$id'") or die(mysql_error());
print '<script language="javascript">alert("!!!Deleted Item Successfully!!!"); window.location="edit_del_item.php"</script>';
echo  header('location: item_f.php');
}
deltemp($_GET['id_del']);
?>