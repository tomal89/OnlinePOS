<?php
session_start();
include('db.php');
if (isset($_POST['qty']))
 {
  $qty = $_POST['qty'];
   }
if (isset($_POST['item_id'])) 
	{
  $item_id = $_POST['item_id'];
	}
if (isset($_POST['modified_hidden'])) 
	{
   $modified_hidden = $_POST['modified_hidden'];
	}
$action = $_REQUEST['action'];
	
if (isset($_POST['modified_quan'])) 
	{
  $modified_quan = $_POST['modified_quan'];
	}
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
              WHERE carttemp_hidden = '$modified_hidden'";
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
print '<script language="javascript"> window.location="sales_f.php"</script>';
?>
