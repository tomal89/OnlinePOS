<?
include('db.php');
$is = $_POST['s_item'];
$select = mysql_query("SELECT * FROM `item` WHERE `barcode` = $is");
$row = mysql_fetch_assoc($select);
$t_i_name= $row['i_name'];
$t_i_qun= $row['i_qun']; 
$t_i_per_price =  $row['i_per_price'];
$t_i_sal_parice = $row['i_sal_price'];
$t_i_id = $row['i_id'];


mysql_query("INSERT INTO `temp_order` VALUES(
'',
'$t_i_name',
'$t_i_qun',
'$t_i_per_price',
'$t_i_sal_parice',
'$t_i_id')
");
echo mysql_error();
print '<script language="javascript">window.location="sales_barcode.php"</script>'
?>