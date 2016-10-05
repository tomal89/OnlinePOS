<?php
include('db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
function item()
{
	$query = mysql_query ("SELECT * FROM item ORDER BY i_id DESC LIMIT 0, 10 ") or die (mysql_error());
	if(mysql_num_rows($query) == 0)
	{
	echo "<tr><td clospan =\"3\">No Post Were Found</td></tr>";
	}else{
	 	while ($post = mysql_fetch_assoc($query))
	 	{
		
		$i_suplier =  $post['i_suplier'];
		
		if(empty($i_suplier))
		{
         $sup = "<b>Suplier was not Selected yet</b>";
		}else{
		$i_id = $post['i_id'];		
		$query2 = mysql_query ("SELECT * FROM suplier WHERE `s_id`  =".$i_suplier."") or die (mysql_error());
		$post2 = mysql_fetch_assoc($query2);
		$sup = $post2['c_name'];
		}
		
		
		
		
		
		
				
		$app_photo = $post['product_pic_path'];
		$p1 = '<img src="'.$app_photo.'" width="90" height="77" />';
		
 	 	echo "<tr>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$sup."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$p1."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_name']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top' >".$post['i_des']."</td>
		
		<td style='border: 1px solid black;'  align='left' valign='top' >".$post['batch_no']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['barcode']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_qun']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_sal_price']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['market_retailar_price']."</td>
    	<td style='border: 1px solid black;' align='left' valign='top'>".$post['i_paid']."</td>
    	<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_total_price']."</td>
	    <td style='border: 1px solid black;' align='left' valign='top'>".$post['i_due']."</td>
		<td style='border: 1px solid black;'  align='left' valign='top'>".$post['i_p_date']."</td>
		<td style='border: 1px solid black;' >
		<a style='text-decoration: none; color:Blue;' href=\"view_item.php?id_del=".$post['i_id']."\">View</a>
		</br>
			<a style='text-decoration: none; color:Blue;' href=\"del_item.php?id_del=".$post['i_id']."\">Delete</a>
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

.tableami {
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


<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css"> 
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="lib/datepicker/css/datepicker.css">
<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zsoft Inventory And Sales</title>

</head>
<link rel="icon"  type="image/png" href="image/icon.png">
<body>
<div style="width:100%;; height:40px; background-color:#3B5998; margin-top:0px; color:#FFF; margin:10px;" align="right"><a href="logout.php">Log-Out </a>&nbsp; &nbsp; &nbsp;
</div>
<div align="center" style="margin:10px;">
<table width="150" height="227" border="0" align="left" style="background-color:#;"class="tableami">
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
<table width="1083"  height="38" border="0" style="background:#FBFBFD; margin-left:0;-moz-border-radius:3px; table-layout:auto; margin-top:5px; margin-bottom:3px;">
  <tr>
    <td width="174" height="28" valign="top"><a style='text-decoration: none; color:Blue;'  href="home.php">Home</a>->Item Entry</td>
  
  </tr>
 
</table>
</div>


<div align="left">
<table width="auto" height="600" border="0" style="background:#FBFBFD;">
  <tr>
    <td width="17" valign="top">&nbsp;</td>
    <td width="733" valign="top">
<form  enctype="multipart/form-data" action="in_item.php" method="post">
<fieldset>
<legend>Item Details Entry</legend>
   <label>Select Company</label>
<?php
include('db.php');
?>
   <select name="i_suplier" id="selectme">
   <option value=""></option>
			 <?php
			 $result = mysql_query("SELECT * FROM suplier ORDER BY s_id ASC");
			 While( $cat =mysql_fetch_assoc($result)) 
			 {
			 ?>
			 <option value= "<?php echo $cat['s_id'];?>"><?php echo $cat['c_name']; ?>
             </option>
			 <?php 
			 }
			 ?>
	    </select>
</br>
<p></p>  
<p>   
   <label>Item Name:</label> 
<input type="text"  name="i_name" size="30" required  placeholder="Enter Product name "/></br>
     </p>
	 
	 <p>   
   <label>Batch No:</label> 
<input type="text"  name="batch_no" size="30" required  placeholder="Enter Product name "/></br>
     </p>
	 
	 
	 
<p> 	 
	 <label>Item/Product Photo</label>
        <input name="file1" type="file" title="Search for a file to add">
</p>		
		
		
<p>   
   <label>Item Description:</label> 
<textarea  rows="4" cols="30" name="i_des"></textarea><br>
<p>

     <label>Item BarCode:</label> 
     <input type="text"  name="barcode" value="" required aria-required="true" placeholder="Barcode ">

     <p>
	 
	 
     <p>
     <label>Total Item Qun:</label> 
     <input type="text" pattern="[\d* . ]+" name="i_qun" value="" required aria-required="true" placeholder="integer value like 1.2.3.">
     <p>
     
     <p>
     <label>Delivery Item Qun:</label> 
     <input type="text" pattern="[\d* . ]+" name="i_delivery_qun" value="" required aria-required="true" placeholder="Delivery Item Qun">
     <p>
     
      <p>
     <label>Undelivered  Item Qun:</label> 
     <input type="text" pattern="[\d* . ]+" name="i_due_qun" value="" required aria-required="true" placeholder="Due Item Qun">
     <p>
     
     
     
   <label><b>Direct Order Rate(DO):</b></label> 
   <input   type="text" pattern="[\d* . ]+" name="i_per_price" required aria-required="true" placeholder="integer value like 1.2.3." size="50"></br>
        <p>
		
		
		<p>
   <label>National Program Rate(NP)%  :</label> 
   <input type="text" pattern="[\d* . ]+" name="national_program_rate" required aria-required="true" placeholder="integer value like 1.2.3." size="50"></br>
        <p>
		
			<p>
   <label>Spacial Program  Rate(SP)%  :</label> 
   <input type="text" pattern="[\d* . ]+" name="spacial_program_rate" required aria-required="true" placeholder="integer value like 1.2.3." size="50"></br>
        <p>
		
		
			<p>
   <label>Product Discount Rate (PD)</label> 
   <input type="text" pattern="[\d* . ]+" name="product_discount_rate" required aria-required="true" placeholder="integer value like 1.2.3." size="50"></br>
        <p>
        
       
        
		
        <p>
   <label><b>Item/Product Costing:</b></label> 
   <input type="text" pattern="[\d* . ]+" name="i_sal_price" required aria-required="true" placeholder="integer value like 1.2.3." size="50"></br>
        <p>
        
         <p>
   <label>Market Retailar Price(MRP):</label> 
   <input type="text" pattern="[\d* . ]+" name="market_retailar_price" required aria-required="true" placeholder="integer value like 1.2.3." size="50"></br>
        <p>
              

              <label>Item Total Cost  :</label> 
              

   
   
              
   <input type="text" pattern="[\d* . ]+"  name="i_total_price"    for="i_qun i_price" required aria-required="true" placeholder="Total Price">

              
              </br>
        <p>
   <label>Paid Amount:</label> 
   <input type="text" pattern="[\d* . ]+" name="i_paid" required aria-required="true" placeholder="integer value like 1.2.3." size="50"></br>
        <p>
        
         <p>
   <label>Due Amount:</label> 
   <input type="text"  name="i_due" for="i_price i_paid"  size="50"   placeholder="There was no due amount."></br>
        <p>
        
     <p>
   <label>Offer Prog </label> 
   <input type="text"  name="offer_prog"   size="50"   placeholder="Offer Prog Details "></br>
        <p>
        
        <p>
   <label>Offer Prog  Start Date </label> 
   <input type="text"  name="offer_prog_start_date"  id="datepicker"  size="50"   placeholder="Offer Prog Start Date"></br>
        <p>
        
        <p>
   <label>Offer Prog  End Date </label> 
   <input type="text"  name="offer_prog_end_date"  id="datepicker1" size="50"   placeholder="Offer Prog End Date"></br>
        <p>
        
        
       
  
        <p>
        <p>
   <label>Purchase date:</label>
    <input type="date" name="i_p_date" required  id="datepicker2" placeholder="plz flow this type yy-mm-date"/></br>
   <p style="float: right;">
<input type="submit" name="submit" value="Submit" class="submit"/>
<button type="reset" class="reset" />Reset</button>
</p>

     <p>
   <label>Exper date:</label>
    <input type="date" name="i_p_date" required  id="datepicker2" placeholder="plz flow this type yy-mm-date"/></br>
   <p style="float: right;">
<input type="submit" name="submit" value="Submit" class="submit"/>
<button type="reset" class="reset" />Reset</button>
</p>
</fieldset>
</form>
   </td>
  </tr>
</table>

<div style="margin-left:0px;" align="left">

<table width="auto" id="sidenav2"  cellspacing="0" style="margin-top:40px;  border: 1px solid black; " >
	<thead>
	<tr>
			<td width="auto" style="background:#FBFBFD;">Supplier</td>
			<td width="auto" style="background:#FBFBFD;">Item Photo</td>
			<td width="auto" style="background:#FBFBFD;">Item</td>
			<td width="auto" style="background:#FBFBFD;">Description</td>
			<td width="auto" style="background:#FBFBFD;">Batch No</td>
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
		item();				
			?>
		</tbody>
        	
</table>
</div>




<table width="100%" height="80" border="0" style="background:#3B5998;">
  <tr>
    <td align="center"><a href="home.php">Go back to the main page</a></td>
  </tr>
</table>
</body>
</html>

<script type="text/javascript">
$(document).ready(function () {
$('#datepicker').datepicker();
});

$(document).ready(function () {
$('#datepicker1').datepicker();
});
$(document).ready(function () {
$('#datepicker2').datepicker();
});


</script>
<!--<form oninput="x.value=parseInt(a.value)+parseInt(b.value)">0
<input type="range" name="a" value="50">100  +
<input type="number" name="b" value="50">=
<output name="x" for="a b"></output>
</form>-->