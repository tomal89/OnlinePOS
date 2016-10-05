<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="vab.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-image: url();
}
</style>
<?
include('db.php');
function suplier()
{
	$query = mysql_query ("SELECT * FROM suplier ORDER BY s_id DESC LIMIT 0, 10 ") or die (mysql_error());
	if(mysql_num_rows($query) == 0)
	{
	echo "<tr><td clospan =\"3\">No Post Were Found</td></tr>";
	}else{
	 	while ($post = mysql_fetch_assoc($query))
	 	{
 	 	echo "<tr>
		<td align='left' valign='top'>".$post['s_name']."</td>
		<td align='left' valign='top'>".$post['c_name']."</td>
		<td align='left' valign='top'>".$post['s_add']."</td>
		<td align='left' valign='top'>".$post['s_phone']."</td>
		<td align='left' valign='top'>".$post['s_mob']."</td>
		<td align='left' valign='top'>".$post['s_email']."</td>
		<td align='left' valign='top'>".$post['s_web']."</td>
    	<td align='left' valign='top'>".$post['s_dis']."</td>
		<td>
			<a  style='text-decoration: none; color:Blue;' href=\"edit_del_suplier_final.php?id_del=".$post['s_id']."\">Edit</a>
			<br/>
			<a style='text-decoration: none; color:Blue;' href=\"del_suplier_php.php?id_del=".$post['s_id']."\">Delete</a>
		</td>";
 		 }
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function SuplierSearch()
{

$c_name = $_POST['c_name'];
	$query = mysql_query ("SELECT * FROM suplier WHERE  c_name = '$c_name' ") or die (mysql_error());
	if(mysql_num_rows($query) == 0)
	{
	echo "<tr><td clospan =\"3\">No Post Were Found</td></tr>";
	}else{
	 	while ($post = mysql_fetch_assoc($query))
	 	{
 	 	echo "<tr>
		<td align='left' valign='top'>".$post['s_name']."</td>
		<td align='left' valign='top'>".$post['c_name']."</td>
		<td align='left' valign='top'>".$post['s_add']."</td>
		<td align='left' valign='top'>".$post['s_phone']."</td>
		<td align='left' valign='top'>".$post['s_mob']."</td>
		<td align='left' valign='top'>".$post['s_email']."</td>
		<td align='left' valign='top'>".$post['s_web']."</td>
    	<td align='left' valign='top'>".$post['s_dis']."</td>
		<td>
			<a  style='text-decoration: none; color:Blue;' href=\"edit_del_suplier_final.php?id_del=".$post['s_id']."\">Edit</a>
			<br/>
			<a style='text-decoration: none; color:Blue;' href=\"del_suplier.php?id_del=".$post['s_id']."\">Delete</a>
		</td>";
 		 }
	}
}





?>
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
	<p><a href="home.php">Home</a></p>
    <p><a href="suplier_f.php">Supplier</a></p>
    <p><a href="item_f.php">Item Entry</a></p>
    <p><a href="customer_f.php">Customer</a></p>
    <p><a href="sales_f.php">Sales</a></p>
    <p><a href="employee_f.php">Employee</a></p>
    </td>
  </tr>
  <tr>
  <td style="color:#999;">Reporting Section</td>
  </tr>
    <tr>
    <td valign="top"><p><a href="report/r_suplier.php">Supplier Details</a></p>
      <p><a href="report/r_item.php">Item Details</a></p>
    <p><a href="report/r_cutomer.php">Customer Details</a></p>
    <p><a href="report/r_sales.php">Sales Details</a></p>
    <p><a href="report/r_employee.php">Employee Details</a></p>
    </td>
  </tr>

</table>

<table width="682" height="50" border="0" style="background:#FBFBFD;">
  <tr>
    <td width="21" valign="top">&nbsp;</td>
    <td width="850" valign="top">
	<form action="" method="post">
<input type="text" name="c_name" size="30"  placeholder="Search By Company Name"/>
<input type="submit" name="submit" value="Search" class="submit"/> 
&nbsp; &nbsp; <a href="edit_del_suplier.php" style='text-decoration: none; color:Blue;' >All Data </a>
&nbsp; &nbsp; <a href="suplier_f.php" style='text-decoration: none; color:Blue;' >Suplier Entry </a>
</form>
   </td>
  </tr>
</table>

<div style="margin-left:190px;">

<table width="812" border="1"  id="sidenav2" class="table" cellspacing="0">
	<thead>
	<tr>
			<td width="114" style="background:#3B5998;">Name</td>
			<td width="120" style="background:#3B5998;">Company Name</td>
			<td width="74" style="background:#3B5998;">Address</td>
	  		<td width="83" style="background:#3B5998;">Phone</td>
			<td width="95"style="background:#3B5998;">Mobile</td>
			<td width="92"style="background:#3B5998;">E-Mail</td>
			<td width="92"style="background:#3B5998;">Web</td>
    		<td width="100"style="background:#3B5998;">Distric</td>
			<td width="100"style="background:#3B5998;">Edit/Del</td>
            
	</tr>
	</thead>
		<tbody>
			<?php 
			
if(isset($_POST["submit"]))
{
	
SuplierSearch();

}
	else
{
		suplier();				
}
			
		
			?>
		</tbody>
        	
</table>
</div>
<table width="100%" height="80" border="0" style="background:#3B5998; margin-top:70px;">
  <tr>
    <td align="center"><a href="home.php">Go back to the main page</a></td>
  </tr>
</table>
</body>
</html>

<!--<form oninput="x.value=parseInt(a.value)+parseInt(b.value)">0
<input type="range" name="a" value="50">100  +
<input type="number" name="b" value="50">=
<output name="x" for="a b"></output>
</form>-->