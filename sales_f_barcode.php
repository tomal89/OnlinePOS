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
			<a  style='text-decoration: none; font-size:14px;'  href=\"sales_f_barcode.php?sal_id=".$post['t_i_id']."\">Sales</a>
			<br/>
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

<style>
a:link, a:visited {
    background-color: #3B5998;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
	font-size:14px;	
    display: inline-block;
}


a:hover, a:active {
    background-color: rgb(128,128,128);
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zsoft Sales Page </title>
</head>

<link rel="icon"  type="image/png" href="image/icon.png">
<body>
<table width="100%" height="50" border="0" style="background:#3B5998;">
  <tr>
    <td align="center"><a href="home.php">Go Back To Main Page</a></td>
  </tr>
</table>

<div style="margin-right:100px;">
<table width="" height="" border="0" align="left">
  <tr>
    <td width="" valign="top">&nbsp;</td>
    <td width="" valign="top">
<form  method="post" action="select_sels.php">
<fieldset>
<legend>Search Item For Sales </legend>
Search Item For Sales:
<input type="text" name="product" size="26" placeholder= "Enter Barcode"/>             
<input type="submit" name="submit" value="Add" class="submit_s"/>
</p>
</fieldset>
</form>
</table>
</div>

<fieldset>
<legend>Final Sales</legend>
<?
include('cart_m.php');
?>
</fieldset>

<div>
Sales item Qun
<form method="POST" action="modcard_m_s_in.php?action=add">
<input type="hidden" name="item_id" value="<?php echo $row['i_id'] ?>">      
        Quantity: <input type="text" name="qty" size="2" id="textarea" required pattern="[\d* . ]+" 
		value="<?php echo $row['i_qun'];?>">
  <input type="submit" name="Submit" value="Add to Sales" class="submit_s">
</form>
</div>


<div>
<form  method="post" action="">
<fieldset>
<legend>Item Details For Sales</legend>
<table  border="1"  cellspacing="0">
	<thead>
	<tr>
			<td  style="background:#FBFBFD;">Name</td>
			<td  style="background:#FBFBFD;">Qun</td>
	  		<td  style="background:#FBFBFD;">Perches Price</td>
			<td style="background:#FBFBFD;">Sales Price</td>
			<td style="background:#FBFBFD;">Sales/Del</td>
            
	</tr>
	</thead>
		<tbody>
			<?php 
		select_item();				
			?>
		</tbody>
        	
</table>
</div>
</form>


  </td>
  </tr>
</table>

</fieldset>

<?
$t_to_i = $_REQUEST['sal_id'];
$query = "SELECT * FROM item WHERE i_id ='$t_to_i'";
$results = mysql_query($query)
  or die(mysql_error());
$row = mysql_fetch_array($results);

//extract($row);

?>






<table width="100%" height="50" border="0" style="background:#3B5998;">
  <tr>
    <td align="center"><a href="home.php">Go Back To Main Page</a></td>
  </tr>
</table>
</body>
</html>

<!--<form oninput="x.value=parseInt(a.value)+parseInt(b.value)">0
<input type="range" name="a" value="50">100  +
<input type="number" name="b" value="50">=
<output name="x" for="a b"></output>
</form>-->
