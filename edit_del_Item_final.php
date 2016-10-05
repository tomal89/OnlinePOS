<?php
include('db.php');
$id_del = $_GET['id_del'];
$query = mysql_query ("SELECT * FROM item  WHERE i_id = '$id_del'") or die (mysql_error());
$post = mysql_fetch_assoc($query);
$i_suplier =  $post['i_suplier'];
$i_id = $post['i_id'];
		
$query2 = mysql_query ("SELECT * FROM suplier WHERE `s_id`  = $i_suplier") or die (mysql_error());
$post2 = mysql_fetch_assoc($query2);
$c_name = $post2['c_name'];

$i_name = $post['i_name'];
$i_des  = $post['i_des'];
$barcode = $post['barcode'];
$i_qun = $post['i_qun'];
$i_per_price = $post['i_per_price'];
$i_sal_price = $post['i_sal_price'];
$i_paid = $post['i_paid'];
$i_due = $post['i_due'];
$i_total_price =$post['i_total_price'];
$i_p_date =$post['i_p_date'];
$app_photo = $post['product_pic_path'];
$p1 = '<img src="'.$app_photo.'" width="190" height="177" />';
		
		
$direct_order_rate = $post['direct_order_rate'];
$national_program_rate = $post['national_program_rate'];
$spacial_program_rate = $post['spacial_program_rate'];
$product_discount_rate = $post['product_discount_rate'];

$market_retailar_price = $post['market_retailar_price'];
$offer_prog = $post['offer_prog'];
$offer_prog_start_date = $post['offer_prog_start_date'];
$offer_prog_end_date = $post['offer_prog_end_date'];

$i_delivery_qun = $post['i_delivery_qun'];
$i_due_qun = $post['i_due_qun'];




 
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
    <td width="174" height="28" valign="top"><a style='text-decoration: none; color:Blue;'  href="home.php">Home</a>->
    <a style='text-decoration: none; color:Blue;' href="edit_del_item.php">Item Details Edit/Del</a>->Edit/Update</td>
  
  </tr>
 
</table>
</div>

<div align="left">
<table width="auto" height="600" border="0" style="background:#FBFBFD;">
  <tr>
    <td width="17" valign="top">&nbsp;</td>
    <td width="733" valign="top">
<form  method="post" action="edit_del_item_php.php" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo $id_del; ?>"/>
<fieldset>
<legend>Item  Details View</legend>
   <label><b>Selected Company:</b></label>
   <div style="margin-left:150px; width:100%; clear:right; margin-top:5px;">
   <?php  
  if(isset($c_name)){
   echo $c_name;
  }else{
	  echo "There was no data found select -> Udpade Company ";
	  }
  
   ?>
   </div>
   


<p></p>

   <label>Update Company</label>
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
<p> 
<p></p>  
   <label>Item Name:</label> 
<input type="text"  name="i_name" size="30"   placeholder="Enter Product name " value="<?php echo $i_name;?>"/></br>
     <p>
	  </br>
   
<p> 	 
	 <label> Product Photo</label>
        <div style="margin-left:0px; width:300px;  height:200px;"><label><?php echo $p1;?></label></div>
         
        	

<p>
</br>

  
<p> 	 
	 <label>Item/Product Photo</label>
        <input name="file1" type="file" placeholder="Search for a file to add" value="<?php echo $app_photo;?>">
        
<p>		
		
		
<p>   
   <label>Item Description:</label> 
<textarea  rows="4" cols="30" name="i_des"><?php echo $i_des;?></textarea><br>
<p>

     <label>Item BarCode:</label> 
     <input type="text"  name="barcode" value="<?php echo $barcode;?>"  aria-required="true" placeholder="Barcode ">

     <p>
	 
	 
     <p>

     <label>Total Item Qun:</label> 
     <input type="text" pattern="[\d* . ]+" name="i_qun" value="<?php echo $i_qun;?>"  aria-required="true" placeholder="integer value like 1.2.3.">

     <p>
     
     <p>
     <label>Delivery Item Qun:</label> 
     <input type="text" pattern="[\d* . ]+" name="i_delivery_qun"  aria-required="true" placeholder="Delivery Item Qun" value="<?php echo $i_delivery_qun;?>"/>
     <p>
     
      <p>
     <label>Due Item Qun:</label> 
     <input type="text" pattern="[\d* . ]+" name="i_due_qun"   aria-required="true" placeholder="Due Item Qun" value="<?php echo $i_due_qun;?>"/>
     <p>
     
     
     
   <label><b>Direct Order Rate(DO):</b></label> 
   <input type="text" pattern="[\d* . ]+" name="i_per_price"  aria-required="true" placeholder="integer value like 1.2.3." size="50" value="<?php echo $i_per_price; ?>"></br>
        <p>
		
		 
		
		<p>
   <label>National Program Rate(NP)%  :</label> 
   <input type="text" pattern="[\d* . ]+" name="national_program_rate"  aria-required="true" placeholder="integer value like 1.2.3." size="50" value="<?php echo $national_program_rate; ?>"></br>
        <p>
		
			<p>
   <label>Spacial Program  Rate(SP)%  :</label> 
   <input type="text" pattern="[\d* . ]+" name="spacial_program_rate"  aria-required="true" placeholder="integer value like 1.2.3." size="50" value="<?php echo $spacial_program_rate; ?>"></br>
        <p>
		
		
			<p>
   <label>Product Discount Rate (PD)  :</label> 
   <input type="text" pattern="[\d* . ]+" name="product_discount_rate"  aria-required="true" placeholder="integer value like 1.2.3." size="50" value="<?php echo $product_discount_rate; ?>"></br>
        <p>
		
        <p>
   <label><b>Item/Product Costing:</b></label> 
   <input type="text" pattern="[\d* . ]+" name="i_sal_price"  aria-required="true" placeholder="integer value like 1.2.3." size="50" value="<?php echo $i_sal_price; ?>"></br>
        <p>
        
          <p>
   <label>Market Retailar Price(MRP):</label> 
   <input type="text" pattern="[\d* . ]+" name="market_retailar_price"  aria-required="true"
    placeholder="integer value like 1.2.3." size="50" value="<?php echo $market_retailar_price; ?>"></br>
        <p>
  <label>Item Total Cost:</label> 
              
              <input type="text" pattern="[\d* . ]+"  name="i_total_price"   placeholder="Total Price" value="<?php echo $i_total_price; ?>">

              
              </br>
        <p>
   <label>Paid Amount:</label> 
   <input type="text"  name="i_paid"  aria-required="true" placeholder="integer value like 1.2.3." size="50"value="<?php echo $i_paid; ?>"/></br>
        <p>
     <p>
   <label>Due Amount:</label> 
   <input type="text"  name="i_due" for="i_price i_paid"  size="50"   placeholder="There was no due amount." value="<?php echo $i_due; ?>"/></br>
        <p>
        
         <p>
   <label>Offer Prog </label> 
   <input type="text"  name="offer_prog"   size="50"   placeholder="Offer Prog Details" value="<?php echo $offer_prog; ?>"/></br>
        <p>
        
         <p>
   <label>Offer Prog  Start Date </label> 
   <input type="text"  name="offer_prog_start_date"  id="datepicker"  size="50"   placeholder="Offer Prog Start Date"value="<?php echo $offer_prog_start_date; ?>"/></br>
        <p>
        
        <p>
   <label>Offer Prog  End Date </label> 
   <input type="text"  name="offer_prog_end_date"  id="datepicker1"  size="50"   placeholder="Offer Prog End Date" value="<?php echo $offer_prog_end_date; ?>"/></br>
        <p>
        
        
  
        <p>
        <p>
   <label>Parches date:</label>
    <input type="date" name="i_p_date"  id="datepicker2"  placeholder="plz flow this type yy-mm-date"  value="<?php echo $i_p_date; ?>"/></br>
   <p style="float: right;">
<input type="submit" name="submit" value="Update" class="submit"/>
<input type="submit" name="back" value="Back" class="back"/>
</p>
</fieldset>
</form>
   </td>
  </tr>
</table>
</div>


<table width="100%" height="80" border="0" style="background:#3B5998; margin-top:70px;">
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
<input type="number" name="b" value="50">
<output name="x" for="a b"></output>
</form>-->

