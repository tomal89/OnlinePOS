<?php
include('db.php');
function suplier()
{
	$query = mysql_query ("SELECT * FROM item ORDER BY i_id DESC LIMIT 0, 10") or die (mysql_error());
	if(mysql_num_rows($query) == 0)
	{
	echo "<tr><td clospan =\"3\">No Post Were Found</td></tr>";
	}else{
	 	while ($post = mysql_fetch_assoc($query))
	 	{
		$i_suplier =  $post['i_suplier'];
		$i_id = $post['i_id'];
		
		$query2 = mysql_query ("SELECT * FROM suplier WHERE `s_id`  = $i_suplier") or die (mysql_error());
		$post2 = mysql_fetch_assoc($query2);
		$c_name = $post2['c_name'];

		
		$app_photo = $post['product_pic_path'];
		$p1 = '<img src="'.$app_photo.'" width="90" height="77" />';
		
 	 	echo "<tr>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post2['c_name']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$p1."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_name']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top' >".$post['i_des']."</td>
		
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['barcode']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_qun']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_sal_price']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['market_retailar_price']."</td>
    	<td style='border: 1px solid black;' align='left' valign='top'>".$post['i_paid']."</td>
    	<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_total_price']."</td>
	    <td style='border: 1px solid black;' align='left' valign='top'>".$post['i_due']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_p_date']."</td>
		<td style='border: 1px solid black;' >
		<a style='text-decoration: none; color:Blue;' href=\"edit_del_Item_final.php?id_del=".$post['i_id']."\">Edit</a>
		</br>
			<a style='text-decoration: none; color:Blue;' href=\"del_item_php.php?id_del=".$post['i_id']."\">Delete</a>
		</td>";
 		 }
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function SuplierSearch()
{

$barcode = $_POST['barcode'];
	$query = mysql_query ("SELECT * FROM item WHERE  barcode = '$barcode' ") or die (mysql_error());
	if(mysql_num_rows($query) == 0)
	{
	echo "<tr><td clospan =\"3\">No Post Were Found</td></tr>";
	}else{
	 	while ($post = mysql_fetch_assoc($query))
	 	{
 	 	$i_suplier =  $post['i_suplier'];
		$i_id = $post['i_id'];
		
		$query2 = mysql_query ("SELECT * FROM suplier WHERE `s_id`  = $i_suplier") or die (mysql_error());
		$post2 = mysql_fetch_assoc($query2);
		$c_name = $post2['c_name'];

		
		$app_photo = $post['product_pic_path'];
		$p1 = '<img src="'.$app_photo.'" width="90" height="77" />';
		
 	 	echo "<tr>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post2['c_name']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$p1."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_name']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top' >".$post['i_des']."</td>
		
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['barcode']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_qun']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_sal_price']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['market_retailar_price']."</td>
    	<td style='border: 1px solid black;' align='left' valign='top'>".$post['i_paid']."</td>
    	<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_total_price']."</td>
	    <td style='border: 1px solid black;' align='left' valign='top'>".$post['i_due']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_p_date']."</td>
		<td style='border: 1px solid black;' >
		<a style='text-decoration: none; color:Blue;' href=\"edit_del_Item_final.php?id_del=".$post['i_id']."\">Edit</a>
		</br>
			<a style='text-decoration: none; color:Blue;' href=\"del_item_php.php?id_del=".$post['i_id']."\">Delete</a>
		</td>";
 		 }
	}
}
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zsoft Inventory And Sales</title>

</head>
<link rel="icon"  type="image/png" href="image/icon.png">
<body>
<div style="width:100%;; height:40px; background-color:#3B5998; margin-top:0px; color:#FFF;" align="right"><a href="logout.php">Log-Out </a>&nbsp; &nbsp; &nbsp;
</div>
<div align="center">
<table width="150" height="227" border="0" align="left" style="background-color:#;"class="table">
  <tr>
    <td width="113" valign="top">
    <p style="color:#999;">Main Section</p>
	<p><a href="home.php">Home</a></p>
    <p><a href="suplier_f.php">Supplier</a></p>
    <p><a href="item_f.php">Item Entry</a></p>
    <p><a href="customer_f.php">Customer</a></p>
    <p><a href="sales_f.php">Sales</a></p>
    <p><a href="employee_f.php">Employee</a></p>
    <p><a href="#">Bank Entry</a></p>
    <p><a href="#">Cash In</a></p>
    <p><a href="#">Cash Out</a></p>
    </td>
  </tr>
  <tr>
  <td style="color:#999;">Edit/Del Section</td>
  </tr>
    <tr>
    <td valign="top"><p><a href="edit_del_suplier.php">Supplier Edit/Del</a></p>
    <p><a href="report/r_item.php">Item Details Edit/Del</a></p>
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
<div align="left">
<table width="1093"  height="38" border="0" style="background:#FBFBFD; margin-left:0;-moz-border-radius: 3px; table-layout:auto; margin-top:5px;">
  <tr>
    <td width="174" height="28" valign="top"><a style='text-decoration: none; color:Blue;'  href="home.php">Home</a>->Item Details Edit/Del</td>
  
  </tr>
 
</table>
</div>

<div style="margin-left:0px; margin-top:5px;">
<table width="1093"  height="38" border="0" style="background:#FBFBFD; margin-left:0;-moz-border-radius: 3px; table-layout:auto;">
  <tr>
    
   <td width="902" valign="top">
      <form action="" method="post">
        <input type="text" name="barcode" size="30"  placeholder="Search By Item Code"/>
        <input type="submit" name="submit" value="Search" class="submit"/> 
        &nbsp; &nbsp; <a href="edit_del_item.php" style='text-decoration: none; color:Blue;' >All Data </a>
        &nbsp; &nbsp; <a href="item_f.php" style='text-decoration: none; color:Blue;' >Item Entry </a>
      </form>    </td>
  </tr>
 </table>
<div style="margin-left:0px;" align="left">

<table width="auto" id="sidenav2"  cellspacing="0" style="margin-top:1px;  border: 1px solid black; " >
	<thead>
	<tr>
			<td width="auto" style="background:#FBFBFD;">Supplier</td>
			<td width="auto" style="background:#FBFBFD;">Item Photo</td>
			<td width="auto" style="background:#FBFBFD;">Item</td>
			<td width="auto" style="background:#FBFBFD;">Description</td>
	  		<td width="auto" style="background:#FBFBFD;">BarCode</td>
			<td width="auto"style="background:#FBFBFD;">Qun</td>
			<td width="auto"style="background:#FBFBFD;">Parches Price(Costing)</td>
			<td width="auto"style="background:#FBFBFD;">Sales Price(MRP) </td>
    		<td width="auto"style="background:#FBFBFD;">Total Price</td>
			<td width="auto"style="background:#FBFBFD;">Paid Amount</td>
			<td width="auto"style="background:#FBFBFD;">Due Amount</td>
			<td width="auto"style="background:#FBFBFD;">Parches date</td>
			<td width="auto"style="background:#FBFBFD;">View/Del</td>
            
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