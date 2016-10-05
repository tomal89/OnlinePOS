<?
include('db.php');
$del_temp = $_GET['id_del'];
function deltemp($del_temp)
{
$id = (int) $del_temp;  
mysql_query("DELETE FROM customer WHERE `c_id`='$id'") or die(mysql_error());
echo  header('location: customer_f.php');
}
deltemp($_GET['id_del']);
?>