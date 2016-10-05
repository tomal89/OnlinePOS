<?php
session_start();
include('db.php');
$abc = $_POST['item_id'];
$prod = "SELECT * FROM item " ."WHERE i_id ='$abc'";
$prod2 = mysql_query($prod);
$prod3 = mysql_fetch_array($prod2);

if (isset($_POST['qty']))
 {
  $qty = $_POST['qty'];
   }
if (isset($_POST['item_id'])) 
	{
  $item_id = $_POST['item_id'];
	}
	
	
$e = $prod3['i_qun'];
$f = $_POST['qty'];
$d = $e - $f;
$var1 = empty($f);
if ( $f <= $e and $var1 == "0")
  { 
       	mysql_query("UPDATE item SET `i_qun` = '$d'
		WHERE `i_id` ='$abc'");
		mysql_query("UPDATE temp_order SET `t_i_qun` = '$d'
		WHERE `t_i_id` ='$abc'");
		$action = $_REQUEST['action'];
	}		
else
  {
   print '<script language="javascript"> alert("There was not enough Stock or Trying to insert 0 value"); window.location="sales_barcode.php"</script>';
   }
$sess = session_id();
//echo $sess;
switch ($action) 
{
  case "add":
    $query = "INSERT INTO carttemp (
              carttemp_sess, 
              carttemp_quan, 
              carttemp_item_id,
			  carttemp_date)
              VALUES ('$sess','$qty','$item_id',CURRENT_TIMESTAMP)";
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
$query1 = "SELECT * FROM carttemp WHERE carttemp_sess = '$sess'";
$results1 = mysql_query($query1)
or die (mysql_query());
$row1 = mysql_fetch_array($results1);
extract($row1);

$prod1 = "SELECT * FROM item " ."WHERE i_id ='$carttemp_item_id'";
$prod21 = mysql_query($prod1);
$prod31 = mysql_fetch_array($prod21);
extract($prod31);


//$carttemp_quan ;
//$i_id; 
//$i_name; 
//$i_sal_price;
//-->

$extprice = ($i_sal_price * $carttemp_quan);

mysql_query("INSERT INTO `sales_details` VALUES(
'',
'$carttemp_quan',
'$i_name',	
'$i_sal_price',
'$extprice',
'$i_id',
'$sess',
'$carttemp_hidden',
'',
''
)");
print '<script language="javascript"> window.location="sales_barcode.php"</script>';
?>
