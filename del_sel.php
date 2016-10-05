<?
include('db.php');
$del_temp = $_GET['id_del'];
function deltemp($del_temp)
{
$id = (int) $del_temp;  
mysql_query("DELETE FROM temp_order WHERE `t_id`='$id'") or die(mysql_error());
echo  header('location: sales_barcode.php');
}
deltemp($_GET['id_del']);
?>