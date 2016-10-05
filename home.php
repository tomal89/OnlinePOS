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
<div style=" left:0;right:0; padding-right:10px;height:40px; background-color:#3B5998; margin-top:0px; color:#FFF;" align="right"><a href="logout.php">Notification</a>&nbsp; &nbsp; &nbsp;<a href="logout.php">Log-Out </a>
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
    <p><a href="sales_barcode.php">Sales</a></p>
    <p><a href="employee_f.php">Employee</a></p>
    <p><a href="bank_entry.php">Bank Entry</a></p>
    <p><a href="#">Cash In</a></p>
    <p><a href="#">Cash Out</a></p>
	<p><a href="#">Daily Expence</a></p>
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
  
  <td style="color:#999;">Admin Section</td>
  </tr>
    <tr>
    <td valign="top"><p><a href="report/r_suplier.php">User Create</a></p>
    <p><a href="report/r_item.php">User Details</a></p>
    <p><a href="report/r_cutomer.php">Customer Details</a></p>
    <p><a href="report/r_sales.php">Shope Setup</a></p>
    <p><a href="report/r_employee.php">Database Backup</a></p>
	<p><a href="report/r_sales_due.php">#</a></p>
    </td>
  </tr>
  
</table>

<div align="left">
  <table width="574" height="74" border="0" class="table2">
    <tr>
      <th width="82" height="70" align="center" valign="top" scope="col">&nbsp;</th>
        <th width="400" align="center" valign="middle" scope="col"style="font-size:22px;">M/S IHSAN ALI BISWAS.
		<div style="font-size:12px;" >Yusuf Biswas Merket , 356, Sonapotty , Pabna, Contact : 01711316910 0731-65221</div>

</th>
        <th width="78" align="center" valign="top" scope="col">&nbsp;</th>
      </tr>
  </table>
</div>
<div align="left">
  <table width="574" height="37" border="0" class="table2">
    <tr>
      <th height="31" align="center" valign="top" scope="col"><h3 style="color:#333333;"> Entry Section </h3></th>
      </tr>
  </table>
</div>

<div align="left">
  <table width="574" height="112" border="0" class="table2">
    <tr>
      <th width="110" height="106" align="center" valign="top" scope="col"><a href="sales_f.php"></a><a href="sales_f.php"><img src="image/online_img/1257379451482993920.png" width="75" height="69" border="0"></a></th>
        <th width="112" align="center" valign="top" scope="col"><a href="item_f.php"><img src="image/online_img/inventory_icon_f.jpg" width="92" height="73" border="0"></a></th>
        <th width="110" align="center" valign="top" scope="col"><a href="suplier_f.php"><img src="image/online_img/LorryGreen.png" width="69" height="68" border="0"></a></th>
        <th width="110" align="center" valign="top" scope="col"><a href="employee_f.php"><img src="image/online_img/provider.png" width="62" height="61" border="0"></a></th>
        <th width="110" align="center" valign="top" scope="col"><a href="customer_f.php"><img src="image/online_img/User-icon.png" width="69" height="65" border="0"></a></th>
      </tr>
  </table>
</div>
<div align="left">
  <table width="575" height="74" border="0" class="table2">
    <tr>
      <th width="124" height="70" align="center" valign="top" scope="col" style="font-size:12px;">
        
        <a href="sales_f.php" style="color:#000000">Process sales and returns</a>        </th>
        <th width="124" align="center" valign="top" scope="col"style="font-size:12px;">
        <a href="item_f.php" style="color:#000000">- Add, Update, Delete, and Search Item </a></th>
        <th width="136" align="center" valign="top" scope="col" style="font-size:12px;">
        <a href="suplier_f.php" style="color:#000000">- Add, Update, Delete, and Search Supplier	</a></th>
        <th width="132" align="center" valign="top" scope="col" style="font-size:12px;">
        <a href="employee_f.php" style="color:#000000">- Add, Update, Delete, and Search Employee</a> </th>
        <th width="104" align="center" valign="top" scope="col" style="font-size:12px;">
        <a href="customer_f.php" style="color:#000000">- Add, Update, Delete, and Search Customer</a> </th>
      </tr>
  </table>
</div>
<div align="left">
  <table width="574" height="37" border="0" class="table2">
    <tr>
      <th height="31" align="center" valign="top" scope="col"><h3 style="color:#333333;"> Reporting Section </h3></th>
      </tr>
  </table>
</div>

<div align="left">
  <table width="574" height="93" border="0" class="table2">
    <tr>
      <th width="102" height="87" align="center" valign="top" scope="col"><a href="sales_f.php"></a><a href="sales_f.php"><img src="image/online_img/sales report.jpg" width="80" height="80" border="0"></a></th>
        <th width="118" align="center" valign="top" scope="col"><a href="item_f.php"><img src="image/online_img/stock report.png" width="80" height="80" border="0"></a></th>
        <th width="109" align="center" valign="top" scope="col"><a href="suplier_f.php"><img src="image/online_img/employee_report.jpg" width="80" height="80" border="0"></a></th>
        <th width="109" align="center" valign="top" scope="col"><a href="employee_f.php"><img src="image/online_img/expance.png" width="80" height="80" border="0"></a></th>
        <th width="112" align="center" valign="top" scope="col"><a href="customer_f.php"><img src="image/online_img/income.jpg" width="80" height="80" border="0"></a></th>
      </tr>
  </table>
</div>
<div align="left">
  <table width="575" height="74" border="0" class="table2">
    <tr>
      <th width="124" height="70" align="center" valign="top" scope="col" style="font-size:12px;">
        
        <a href="sales_f.php" style="color:#000000">-Sales Report</a>        </th>
        <th width="124" align="center" valign="top" scope="col"style="font-size:12px;">
        <a href="item_f.php" style="color:#000000">- Stock Report </a></th>
        <th width="136" align="center" valign="top" scope="col" style="font-size:12px;">
        <a href="suplier_f.php" style="color:#000000">- Employee Report</a></th>
        <th width="132" align="center" valign="top" scope="col" style="font-size:12px;">
        <a href="employee_f.php" style="color:#000000">- Daily expense</a> </th>
        <th width="104" align="center" valign="top" scope="col" style="font-size:12px;">
        <a href="customer_f.php" style="color:#000000">-Income Statemanet </a> </th>
      </tr>
  </table>
</div>






<div style="width:100%;; height:40px; background-color:#3B5998; margin-top:250px; color:#FFFFFF;">@Copy Right Zsoft IT Solution Pvt. Ltd .
	+8801727002781, Web: Zsoft.com.bd
</div>
</body>
</html>

