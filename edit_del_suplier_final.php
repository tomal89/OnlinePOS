<?php
include('db.php');
$id_del = $_GET['id_del'];
$query = mysql_query ("SELECT * FROM suplier  WHERE s_id = '$id_del'") or die (mysql_error());
$post = mysql_fetch_assoc($query);
$s_name = $post['s_name'];
$s_i_code = $post['s_i_code'];
$c_name  = $post['c_name'];
$s_add = $post['s_add'];
$s_phone = $post['s_phone'];
$s_mob = $post['s_mob'];
$s_email = $post['s_email'];
$s_web = $post['s_web'];
$s_dis = $post['s_dis'];



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
<table width="1075"  height="38" border="0" style="background:#FBFBFD; margin-left:0;-moz-border-radius:3px; table-layout:auto; margin-top:5px; margin-bottom:3px;">
  <tr>
    <td width="174" height="28" valign="top"><a style='text-decoration: none; color:Blue;'  href="home.php">Home</a>->
    <a style='text-decoration: none; color:Blue;' href="edit_del_suplier.php">Supplier Edit/Del</a>->Edit/Update</td>
  
  </tr>
 
</table>
</div>

<div align="left">
<table width="682" height="413" border="0" style="background:#FBFBFD;">
  <tr>
    <td width="21" valign="top">&nbsp;</td>
    <td width="850" valign="top">
<form  method="post" action="edit_del_suplier_php.php" enctype="multipart/form-data">
<input type="hidden" name="s_id" value="<?php echo $id_del;?>" />
<fieldset>
<legend>Suplier Edit/Update</legend>
      <label> Company Name :</label> 
<input type="text" name="c_name" size="30" required  value= "<?php echo $c_name;?>"/></br>
<p>
<label>Supplier Name:</label>
<input type="text" name="s_name" size="30" required pattern="[a-zA-Z . , ]+" value= "<?php echo $s_name;?>"/></br>
<p>   
<p>
<label>Company Code:</label>
<input type="text" name="s_i_code" size="30" required value= "<?php echo $s_i_code;?>"/></br>
<p>

<p>   
   <label> Address:</label> 
<input type="text" name="s_add" size="30" required pattern="[a-zA-Z . , 0-9 ]+" value= "<?php echo $s_add;?>"/></br>
<p>


     <label>Phone :</label> 
     <input type="text" pattern="\d*"  name="s_phone"   aria-required="true" value= "<?php echo $s_phone;?>"/>

     <p>
   <label>Mobile :</label> <input type="text" pattern="\d*" name="s_mob" required aria-required="true" value= "<?php echo $s_mob;?>" size="50"/></br>
        <p>
              
              <span id="sprytextfield1">
              <label>Email :</label> 
              <input type="email" id="text1" name="s_email"    required aria-required="true" value= "<?php echo $s_email;?>">
              </span>
              
              </br>
        <p>
        <p>
		
		
		<p>
              
              <span id="sprytextfield1">
              <label>Web Address  :</label> 
              <input type="text" id="text1" name="s_web"  value="<?php echo $s_web;?>"   placeholder="www.google.com">
              </span>
              
              </br>
        <p>
        <p>
		
		
		
   <label>District:</label> <input type="text" name="s_dis" pattern="[a-zA-Z . , ]+"required value= "<?php echo $s_dis;?>" size="50"></br>
   <p style="float: right;">
<input type="submit" name="submit" value="Update" class="submit"/>
<input type="submit" name="back" value="Back" class="back"/>
</p>
</fieldset>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
</script>

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

<!--<form oninput="x.value=parseInt(a.value)+parseInt(b.value)">0
<input type="range" name="a" value="50">100  +
<input type="number" name="b" value="50">
<output name="x" for="a b"></output>
</form>-->

