<?php
if (!session_id()) {
  session_start();
}//connect to the database
include('db.php');
?>

<form id="form1" name="form1" oninput="Due.value= String(total.value) - String(paid.value)" 
method="post" action="in_sales_final.php">
<?
$carttemp_sess = $_POST['carttemp_sess'];
?>
<input type="hidden" name="carttemp_sess" value="<? echo $carttemp_sess;?>"/>

<table width="576" border="1"  style="margin-top:0px;">
  <tr>
    <td width="282"><label>Total Amount</label></td>
    <? $total_f = $_POST['total_f']; ?>
    <td width="278" align="center">  <input type="text" name="total" readonly="readonly" value="<? echo $total_f ; ?>" size="45"/></td>
  </tr>
  <tr>
    <td><label>Paid Amount</label></td>
    <td align="center">  <input name="paid" type="text" size="45" /></td>
  </tr>
  <tr>
    <td>  <label>Due Amount</label></td>
    <td align="center">  <input name="Due" type="text" size="45" readonly  for="total  paid" /></td>
  </tr>
   <tr>
    <td>  <label>Customer Bank Name/No:</label></td>
    <td align="center">  <input name="Due" type="text" size="45"   for="total  paid" /></td>
   </tr>
   <tr>
    <td>  <label>Customer Bank Check Date:</label></td>
    <td align="center">  <input name="Due" type="text" size="45"   for="total  paid" /></td>
  </tr>
  
   
    <td>  <label>Bank Card No:</label></td>
    <td align="center">  <input name="Due" type="text" size="45"   for="total  paid" /></td>
  </tr>
  <tr>
   <tr>
    <td>  <label>Bank Acount No (Drop Down):</label></td>
    <td align="center">  <input name="Due" type="text" size="45"   for="total  paid" /></td>
  </tr>
  <tr>
  <tr>
    <td>  <label>Bank Amount:</label></td>
    <td align="center">  <input name="Due" type="text" size="45"   for="total  paid" /></td>
  </tr>
  

  <tr>
    <td>  <label>Select Customer</label></td>
    <td align="center"> 
    <?php
include('db.php');
?>
   <select name="f_s_cus_id"  style="width: 300px;">
   <option value=""></option>
			 <?php
			 $result = mysql_query("SELECT * FROM customer ORDER BY c_id ASC");
			 While( $cat =mysql_fetch_assoc($result)) 
			 {
			 ?>
			 <option value= "<?php echo $cat['c_id'];?>"><?php echo $cat['c_name']; ?>
             </option>
			 <?php 
			 }
			 ?>
	    </select>    </td>
  </tr>
  <tr>
    <td colspan="2" align="right">
	<input type="submit" name="back" value="Back" />   
	<input type="submit" name="submit" value="Next" />	</td>
    </tr>
</table>

<input type="hidden"  name="sess" value="<? echo $sess ?>"/>
<input type="hidden"  name="modified_hidden" value="<? echo $_POST['modified_hidden']; ?>"/>
</form>

<table border="1" align="left" cellpadding="5">
  <tr>
    <td>Quantity</td>
    <td>Item Name</td>
    <td>Price Each</td>
    <td>Extended Price</td>  
  </tr>
<?php
$sessid = session_id();
$query = "SELECT * FROM carttemp WHERE carttemp_sess = '$sessid'";
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
   echo "<tr> <td>";
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
<td colspan="3" align="right">Your total :</td>
<td align="right"> <?php echo $total; ?></td>

</tr>
</table>
<input type="hidden" name="total" value="<?php echo $total; ?>">