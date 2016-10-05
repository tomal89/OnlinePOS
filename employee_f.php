<?php
include('db.php');
function customer()
{
	$query = mysql_query ("SELECT * FROM employee ORDER BY e_id DESC LIMIT 0, 10 ") or die (mysql_error());
	if(mysql_num_rows($query) == 0)
	{
	echo "<tr><td clospan =\"3\">No Post Were Found</td></tr>";
	}else{
	 	while ($post = mysql_fetch_assoc($query))
	 	{
 	 	echo "<tr>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['e_name']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['e_add']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['e_phone']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['e_mob']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['e_email']."</td>
    	<td style='border: 1px solid black;' align='left' valign='top'>".$post['e_dis']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['e_post']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>".$post['e_sal']."</td>
		<td style='border: 1px solid black;' align='left' valign='top'>
			Edit
			<br/>
			<a href=\"del_employee.php?id_del=".$post['e_id']."\">Delete</a>
		</td>";
 		 }
	}
}
?>

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
</div>
<div align="left">
<table width="1093"  height="38" border="0" style="background:#FBFBFD; margin-left:0;-moz-border-radius: 3px; table-layout:auto; margin-top:5px; margin-bottom:5px;">
  <tr>
    <td width="174" height="28" valign="top"><a style='text-decoration: none; color:Blue;'  href="home.php">Home</a>->Employee Entry</td>
  
  </tr>
 
</table>
</div>

<div align="left">
<table width="650" height="456" border="0" style="background:#FBFBFD;">
  <tr>
    <td width="15" valign="top">&nbsp;</td>
    <td width="856" valign="top">
<form  method="post" action="in_emp.php">
<fieldset>
<legend>Employe Details  Entry</legend>
   <label>Employee Name:</label>
<input type="text" name="e_name" size="30" required pattern="[a-zA-Z . ]+" placeholder="Enter Your Name"/></br>
<p>   
   <label> Address:</label> 
<input type="text" name="e_add" size="30" required pattern="[a-zA-Z . 0-9 # / , . ]+" placeholder="Enter Your Address"/></br>
     <p>

     <label>Phone :</label> 
     <input type="text" pattern="\d*"  name="e_phone" value=""  aria-required="true" placeholder="+88073166804">

     <p>
   <label>Mobile :</label> <input type="text" pattern="\d*" name="e_mob" required aria-required="true" placeholder="+8801727002781" size="50"></br>
        <p>
              
              <span id="sprytextfield1">
              <label>Email :</label> 
              <input type="email" id="text1" name="e_email"  value=""   aria-required="true" placeholder="example@yahoo.com">
              </span>
              
              </br>
        <p>
        <p>
   <label>District:</label> <input type="text" name="e_dis" pattern="[a-zA-Z ]+"required placeholder="Enter Your District Name" size="50"></br>
        <p>
   <label>Post:</label> 
   <input type="text" name="e_post" pattern="[a-zA-Z ]+"required placeholder="Enter The Post" size="50"></br>
        <p>
   <label>Salary:</label> <input type="text" name="e_sal"  pattern="\d*" required placeholder="salery" size="50"></br>
   
   <p style="float: right;">
<input type="submit" name="submit" value="Submit" class="submit"/>
<button type="reset" class="reset" />Reset</button>
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
<div style="margin-left:0px;" align="left">

<table width="auto" cellspacing="0" style="margin-top:10px; border: 1px solid black;" >
<thead>
<tr>
			<td width="auto" style="background:#FBFBFD;">Name</td>
			<td width="auto" style="background:#FBFBFD;">Address</td>
	  		<td width="auto" style="background:#FBFBFD;">Phone</td>
			<td width="auto" style="background:#FBFBFD;">Mobile</td>
			<td width="auto" style="background:#FBFBFD;">E-Mail</td>
    		<td width="auto" style="background:#FBFBFD;">Distric</td>
    		<td width="auto" style="background:#FBFBFD;">Post</td>
    		<td width="auto" style="background:#FBFBFD;">Salery</td>
			<td width="auto" style="background:#FBFBFD;">Edit/Del</td>
            
</tr>
</thead>
		<tbody>
			<?php 
		customer();			
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

<!--<form oninput="x.value=parseInt(a.value)+parseInt(b.value)">0
<input type="range" name="a" value="50">100  +
<input type="number" name="b" value="50">=
<output name="x" for="a b"></output>
</form>-->