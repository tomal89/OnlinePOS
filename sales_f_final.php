<?
if (!session_id()) 
{
  session_start();
}//connect to the database
include('db.php');

$sess = $_POST['carttemp_sess'];
$query = "DELETE FROM carttemp WHERE carttemp_sess = '$sess'";
mysql_query($query);

session_regenerate_id();
session_destroy();
unset($_SESSION);
session_regenerate_id(TRUE);
print_r($_SESSION);
//echo $sess;
print '<script language="javascript">alert("Sales Complet"); window.location="sales_barcode.php"</script>'
?>