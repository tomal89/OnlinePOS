<?
if (!session_id()) 
{
  session_start();
}//connect to the database
include('db.php');

if(isset($_POST["back"]))
{
echo  header('location: sales_barcode.php');
}

$total = $_POST['total'];
$paid = $_POST['paid'];
$Due = $_POST['Due'];
$f_s_cus_id = $_POST['f_s_cus_id'];
$sess = $_POST['carttemp_sess'];

$result_s = mysql_query(" SELECT `s_d_id` FROM `sales_details` WHERE `carttemp_sess` = '$sess' ");
$row_s = mysql_fetch_array($result_s);
$sup = $row_s['s_d_id'];
 

//echo $sess; 
$modified_hidden = $_POST['modified_hidden']; 
echo "<title>";
echo "Finla Sales";
echo "</title>";

mysql_query("INSERT INTO `sales` VALUES(
'',
'$sess',
'$total',
'$paid',
'$Due',
'$f_s_cus_id',
'$sup'
)
");



$sql = "UPDATE `sales_details` \n"
    . " SET `s_d_cust_id` = '$f_s_cus_id'"
    . " WHERE `carttemp_sess` ='$sess'";
mysql_query($sql);
echo mysql_error();

//$query = "DELETE FROM carttemp WHERE carttemp_sess = '$sess'";
//mysql_query($query);
//echo mysql_error();
?>
<?
//echo $f_s_cus_id;
if(empty($f_s_cus_id))
{
//echo "kjhkj";
}else
{

$sql = mysql_query("SELECT * FROM `customer` WHERE c_id = $f_s_cus_id ");
$rcus = mysql_fetch_array($sql);
extract($rcus);
}

?>
<div align="center">
<P><h3>M/S IHSAN ALI BISWAS. <h3></P>
<P>YUSUF BISWAS MERKET ,
 356, SONAPOTTY , PABNA
 01711316910
 0731-65221</P>
</div>
<hr />
<table width="510" border="1" align="center" style="color: #333333;">
<tr>
    <th colspan="2" scope="col">Customer Information : </th>
  </tr>
  <tr>
    <th width="92" scope="col">Name :</th>
    <th width="402" scope="col"><? echo $c_name;?></th>
  </tr>
  <tr>
    <th scope="col">Address :</th>
    <th scope="col"><? echo $c_add; ?></th>
  </tr>
  <tr>
    <th scope="col">Mobile :</th>
    <th scope="col"><? echo $c_mob; ?></th>
  </tr>
</table>

<table width="auto" border="1" align="center" style="margin-top:5px;">
<tr>
    <th colspan="2" scope="col">Sales information :</th>
  </tr>
  <tr>
  
  <tr>
    <th scope="col">
	<table border="1" align="left" cellpadding="5"align="center"  width="500" style="clear:right;">

 <tr>
<th>Date</th>
<th>
<? 
$result = mysql_query(" SELECT `carttemp_date` FROM `carttemp` WHERE `carttemp_sess` = '$sess'");

while ($row = mysql_fetch_array($result))
{
 $to = date("d/m/Y",strtotime($row['carttemp_date']));
echo $to;
}
 ?>
 </th>
  </tr>
  <tr>
    <td>Quantity</td>
    <td>Item Name</td>
    <td>Price Each</td>
    <td>Extended Price</td>  
  </tr>
<?php
$sessid = session_id();
$query = " SELECT * FROM carttemp WHERE carttemp_sess = '$sessid'";
$results = mysql_query($query)
  or die (mysql_query());

$total = 0;
while ($row = mysql_fetch_array($results)) 
{
  extract($row);
  $prod = "SELECT * FROM item WHERE
           `i_id` = '$carttemp_item_id'";
  $prod2 = mysql_query($prod);
  $prod3 = mysql_fetch_array($prod2);
  extract($prod3);
   echo "<tr>";
  echo "</tr>";
  echo "<tr><td>";
  echo $carttemp_quan;
  echo "</td>"; 
   echo "<td>";
  echo $i_name;
  echo "</td>";
  echo "<td align=\"right\">";
  echo $i_sal_price;
  echo "</td>";
  echo "<td align=\"right\">";
  //get extended price
  $extprice = ($i_sal_price * $carttemp_quan);
  echo $extprice;
  echo "</td>";
  echo "</tr>";
  //add extended price to total
  $total = ($extprice + $total);

}

?>

<tr>
<td colspan="4" align="right">Total Amount</td>
<td align="right"> <?php echo $total; ?></td>
</tr>
<tr>

<td colspan="4" align="right">Paid Amount</td>
<td align="right"> <?php echo $paid; ?></td>
</tr>

<tr>
<td colspan="4" align="right">Due Amount :</td>
<td align="right"> <?php echo $Due; ?></td>
</tr>
</table>

<table>
  <tr>
    <th width="82" style="padding-top:10px;" scope="col">
<form><input type="button" value=" Print this page "
onclick="window.print();return false;" /></form> 
	
	</th>
    <th width="73" style="padding-top:10px;" scope="col">
<form method="POST" action="sales_f_final.php">
<input type="hidden" name="carttemp_sess" value="<?php echo $sess; ?>">
<input type="submit" id="submit_cart" value="Porsess">
</form>	</th>
     </tr>  
</table>






