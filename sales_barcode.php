<?php
session_start();
include('db.php');
function select_item()
{
	$query = mysql_query ("SELECT * FROM temp_order ") or die (mysql_error());
	if(mysql_num_rows($query) == 0)
	{
	echo "<tr><td clospan =\"3\">No Post Were Found Plz use barcode to select Item</td></tr>";
	}else{
	 	while ($post = mysql_fetch_assoc($query))
	 	{
 	 	echo "<tr>
		<td>".$post['t_i_name']."</td>
		<td>".$post['t_i_qun']."</td>
		<td>".$post['t_i_per_price']."</td>
		<td>".$post['t_i_sal_parice']."</td>
		<td>
			<a  style='color:Green;' href=\"sales_barcode.php?sal_id=".$post['t_i_id']."\">Add To Sales</a>
			<br/>
			<a style='color:red;' href=\"del_sel.php?id_del=".$post['t_id']."\">Delete</a>
		</td>";
 		 }
	}
}
$t_to_i = $_REQUEST['sal_id'];
$query = "SELECT * FROM item WHERE i_id ='$t_to_i'";
$results = mysql_query($query)
  or die(mysql_error());
$row = mysql_fetch_array($results);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="vab.css" rel="stylesheet" type="text/css" />
<style type="text/css">

body {
	background-image: url();
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 0px;
	margin-bottom: 0px;
}

.table {
	margin-top:2px;
	margin-right:10px;
    color: #666;
    font-size: 12px;
    -moz-border-radius: 3px;
    -moz-box-shadow: 0 1px 2px #d1d1d1;
    -webkit-border-radius: 3px;
    -webkit-box-shadow: 0 1px 2px #d1d1d1;
    background: #3B5998;
    border: #ccc 1px solid;
    border-radius: 7px;
    box-shadow: 0 1px 2px #d1d1d1;
    font-family: Arial, Helvetica, sans-serif;
    margin-left:0px;
		

}
.table2 {
    margin: 20px;
    color: #666;
    font-size: 12px;
    -moz-border-radius: 3px;
    -moz-box-shadow: 0 1px 2px #d1d1d1;
    -webkit-border-radius: 3px;
    -webkit-box-shadow: 0 1px 2px #d1d1d1;
    background: #;
    border: #ccc 1px solid;
    border-radius: 7px;
    box-shadow: 0 1px 2px #d1d1d1;
    font-family: Arial, Helvetica, sans-serif;
    margin-left:0px;
}
.style1 {color: #000000}
</style>

<style>
.aParent div {
  float: left;
  clear: none; 
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zsoft Inventory And Sales</title>

</head>
<link rel="icon"  type="image/png" href="image/icon.png">
<body>
<div style="width:100%;; height:40px; background-color:#3B5998; margin-top:0px; color:#FFF;" align="right"><a href="logout.php">Log-Out </a>&nbsp; &nbsp; &nbsp;
</div>
<div align="center">
<table width="150" height="227" border="0" align="left" style="background-color:3B5998;"class="table">
  <tr>
    <td width="113" valign="top">
    <p style="color:#999;">Main Section</p>
	<p><a href="home.php">Home</a></p>
    <p><a href="suplier_f.php">Supplier</a></p>
    <p><a href="item_f.php">Item Entry</a></p>
    <p><a href="customer_f.php">Customer</a></p>
    <p><a href="sales_f.php">Sales</a></p>
    <p><a href="employee_f.php">Employee</a></p>
    <p><a href="bank_entry.php">Bank Entry</a></p>
    <p><a href="#">Cash In</a></p>
    <p><a href="#">Cash Out</a></p>
    </td>
  </tr>
  <tr>
  <td style="color:#999;">Edit/Del Section</td>
  </tr>
    <tr>
    <td valign="top"><p><a href="edit_del_suplier.php">Supplier Edit/Del</a></p>
    <p><a href="edit_del_item.php">Item Details Edit/Del</a></p>
    <p><a href="report/r_cutomer.php">Customer  Edit/Del </a></p>
    <p><a href="report/r_sales.php">Sales  Edit/Del </a></p>
    <p><a href="report/r_employee.php">Employee  Edit/Del </a></p>
	<p><a href="report/r_sales_due.php">Sales Due Paid  Edit/Del </a></p>
    </td>
  </tr>
  <td style="color:#999;">Reporting Section</td>
  </tr>
    <tr>
    <td valign="top"><p><a href="report/r_suplier.php">Supplier Details</a></p>
    <p><a href="report/r_item.php">Item Details</a></p>
    <p><a href="report/r_cutomer.php">Customer Details</a></p>
    <p><a href="report/r_sales.php">Sales Details</a></p>
    <p><a href="report/r_employee.php">Employee Details</a></p>
	<p><a href="report/r_sales_due.php">Sales Due Paid Details </a></p>
    </td>
  </tr>
  
</table>
</div>


<div style="margin-left:165px; margin-top:10px;">
<table>
  <tr>
     <td valign="top">
<form  method="post" action="select_sels.php">
<fieldset style="width:538px; background: #E8E8E8;">
<legend>1. Search Item By Barcode</legend>
        <input type="text" name="s_item" size="23"/>
<input type="submit" name="submit" value="Add To Search" class="submit_s"/>

</fieldset>
</form>
</td>
</tr>
</table> 
</div>
<div style="margin-left:165px; margin-top:10px;">
<fieldset style="width:523px; background: #E8E8E8;">
<legend>2.Select Item:</legend>
<table width="540" border="1">
	<thead>
	<tr>
			<td width="81">Name</td>
			<td width="99">Available Qun</td>
	  		<td width="121">Perches Price</td>
			<td width="98">Sales Price</td>
			<td width="115">Sales/Del</td>
            
	</tr>
	</thead>
		<tbody>
			<?php 
		select_item();				
			?>
		</tbody>
        	
</table>
</fieldset>
</div>

<div style="margin-left:163px; margin-top:10px;">
<table width="555">
  <tr>
     <td valign="top">
<form method="POST" action="modcard_m_s_in.php?action=add">      
<fieldset style="width:542px; background:#E8E8E8;">
<legend>3.Select Quantity:</legend>
<input type="hidden" name="item_id" value="<?php echo $row['i_id'] ?>">
<input type="text" name="qty" size="25"  required  value="<?php echo 'Available Stock Qun: '; echo $row['i_qun'];?>">
<input type="submit" name="Submit" value="Add to Sales" id="submit_cart" >
</fieldset>
</form>
</td>
</tr>
</table> 
</div>

<div align="left" style="margin-top:10px; margin-left:165px;">
<fieldset style="width:542px; background:#E8E8E8;">
<legend>4.Final Sales</legend>
<?
include('cart_m_barcode.php');
?>
</fieldset> 
</div>



<div align="center" style="width:100%;; height:23px; background-color:#3B5998; margin-top:200px; color:#FFFFFF;">@Copy Right Zsoft IT Solution Pvt. Ltd .
	+8801727002781, Web: Zsoft.com.bd
</div>
</body>
</html>

