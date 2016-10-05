<?php
session_start();
include('db.php');
if (isset($_POST['carttemp_item_id'])) 
	{
  $item_id = $_POST['carttemp_item_id'];
	}

if (isset($_POST['carttemp_hidden'])) 
	{
   $carttemp_hidden = $_POST['carttemp_hidden'];
	}
	
if (isset($_POST['carttemp_qun'])) 
	{
   $carttemp_qun = $_POST['carttemp_qun'];
	}

$prod = "SELECT * FROM item " ."WHERE i_id ='$item_id'";
$prod2 = mysql_query($prod);
$prod3 = mysql_fetch_array($prod2);
$e = $prod3['i_qun'];
/*echo "total i_qun from item table";
echo $e;
echo "</br> ";
*/
$f = $carttemp_qun;
/*echo "i_qun from ";
echo $f;
echo "</br> ";*/
$g = ($e + $f);


mysql_query("UPDATE item SET `i_qun` = '$g' WHERE `i_id` ='$item_id'");
mysql_query("UPDATE temp_order SET `t_i_qun` = '$g'	WHERE `t_i_id` ='$item_id'");
$action = $_REQUEST['action'];
$sess = session_id();
//echo $sess;
switch ($action) 
{
  case "add":
    $query = "INSERT INTO carttemp (
              carttemp_sess, 
              carttemp_quan, 
              carttemp_item_id)
              VALUES ('$sess','$qty','$item_id')";
    $message = "<div align=\"center\"><strong>Item added.</strong></div>";
    break;

  case "change":
    $query = "UPDATE carttemp
              SET carttemp_quan = '$modified_quan'
	             WHERE carttemp_hidden = '$modified_hidden'";
    $message = "<div align='center'><strong>Quantity changed.</strong></div>";
    break;

  case "delete":
    $query = "DELETE FROM carttemp 
              WHERE carttemp_hidden = '$carttemp_hidden'";
			 mysql_query
			 ("DELETE FROM sales_details
              WHERE s_carttemp_hidden  = '$carttemp_hidden'
			 ");
    $message = "<div align='center'><strong>Item deleted.</strong></div>";
    break;

  case "empty":
    $query = "DELETE FROM carttemp WHERE carttemp_sess = '$sess'";
    $message = "<div align='center'><strong>Cart emptied.</strong></div>";
    break;
 }
$results = mysql_query($query)
  or die(mysql_error());
//echo $message;
print '<script language="javascript">window.location="sales_f.php"</script>';
?>