<?php
session_start();
include('db.php');
function select_item()
{
	$query = mysql_query ("SELECT * FROM temp_order ") or die (mysql_error());
	if(mysql_num_rows($query) == 0)
	{
	echo "<tr><td clospan =\"3\">No Post Were Found</td></tr>";
	}else{
	 	while ($post = mysql_fetch_assoc($query))
	 	{
 	 	echo "<tr>
		<td>".$post['t_i_name']."</td>
		<td>".$post['t_i_qun']."</td>
		<td>".$post['t_i_per_price']."</td>
		<td>".$post['t_i_sal_parice']."</td>
		<td>
			<a href=\"sales_f.php?sal_id=".$post['t_i_id']."\">Sales</a>
			<br/>
			<a href=\"del_sel.php?id_del=".$post['t_id']."\">Delete</a>
		</td>";
 		 }
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="vab.css" rel="stylesheet" type="text/css" />
<link href="table_vab.css" rel="stylesheet" type="text/css" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zsoft Inventory And Sales</title>

</head>
<link rel="icon"  type="image/png" href="image/icon.png">
<body>
<table width="173" height="227" border="0" align="left" style="background-color:#3B5998; color:#FFF;">
  <tr>
    <td width="167" valign="top">
    <p style="color:#999;">Entry Section</p>
    <p><a href="suplier_f.php">Suplier</a></p>
    <p><a href="item_f.php">Item Entry</a></p>
    <p><a href="customer_f.php">Customer</a></p>
    <p><a href="sales_f.php">Sales</a></p>
    <p><a href="employee_f.php">Employe</a></p>
    </td>
  </tr>
  <tr>
  <td style="color:#999;">Reporting Section</td>
  </tr>
    <tr>
    <td valign="top"><p><a href="#">Suplier Details</a></p>
    <p><a href="#">Item Details</a></p>
    <p><a href="#">Item Transaction Details</a></p>
    <p><a href="#">Customer Details</a></p>
    <p><a href="#">Sales Details</a></p>
    <p><a href="#">Employee Details</a></p>
    </td>
  </tr>

</table>

<table width="881" height="600" border="0">
  <tr>
    <td width="26" valign="top">&nbsp;</td>
    <td width="845" valign="top">
<form  method="post" action="select_sels.php">
<fieldset>
<legend>Add Item For Sales </legend>
   <select name="s_item">
   <option value=""></option>
			 <?php
			 include('db.php');
			 $result = mysql_query("SELECT * FROM `item`");
			 While( $cat =mysql_fetch_assoc($result)) 
			 {
			 ?>
			 <option value= "<?php echo $cat['i_id'];?>"><?php echo $cat['i_name']; ?>
             </option>
			 <?php 
			 }
			 ?>
			 </select>
             
<input type="submit" name="submit" value="Add" class="submit_s"/>
</p>
</fieldset>
</form>

<form  method="post" action="">
<fieldset>
<legend>Item Details For Sales</legend>
<table width="619" border="1"  id="sidenav2" class="table" cellspacing="0">
	<thead>
	<tr>
			<td width="82" style="background:#3B5998;">Name</td>
			<td width="67" style="background:#3B5998;">Qun</td>
	  		<td width="102" style="background:#3B5998;">Perches Price</td>
			<td width="75"style="background:#3B5998;">Sales Price</td>
			<td width="88"style="background:#3B5998;">Sales/Del</td>
            
	</tr>
	</thead>
		<tbody>
			<?php 
		select_item();				
			?>
		</tbody>
        	
</table>
</fieldset>
</form>
<?
$t_to_i = $_REQUEST['sal_id'];
$query = "SELECT * FROM item WHERE i_id ='$t_to_i'";
$results = mysql_query($query)
  or die(mysql_error());
$row = mysql_fetch_array($results);

//extract($row);

?>


<fieldset>
<legend>Sales item Qun</legend>
<form method="POST" action="modcard_m.php?action=add">
      
        Quantity: <input type="text" name="qty" size="2"><br>
      
        <input type="hidden" name="item_id" value="<?php echo $row['i_id'] ?>">
      
        <input type="submit" name="Submit" value="Add to Sales" class="submit_s">
        
      </form>
      
</fieldset>

<fieldset>
<legend>Final Sales</legend>
<?
include('cart_m.php');
?>
</fieldset>

  </td>
  </tr>
</table>

<table width="100%" height="80" border="0" style="background:#3B5998;">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<!--<form oninput="x.value=parseInt(a.value)+parseInt(b.value)">0
<input type="range" name="a" value="50">100  +
<input type="number" name="b" value="50">=
<output name="x" for="a b"></output>
</form>-->
