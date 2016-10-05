<?php
session_start();
include('db.php');
?>
<html>
<head>
<link href="table_vab_card.css" rel="stylesheet" type="text/css" />
<link href="vab.css" rel="stylesheet" type="text/css" />
<title>Here is Your Sales Page !</title>
</head>
<body>
<div align="center">
You currently have

<?php
$sessid = session_id();

//display number of products in cart
$query = "SELECT * FROM carttemp WHERE carttemp_sess = '$sessid'";
$results = mysql_query($query)
  or die (mysql_query());
$rows = mysql_num_rows($results);
echo $rows;

?>
product(s) in your Seletion .<br>
<table border="4" align="center" cellpadding="5" class="table">
  <tr>
    <td>Quantity</td>
    <td>Item Image</td>
    <td>Item Name</td>
    <td>Price Each</td>
    <td>Extended Price</td>
    <td></td>
    <td></td>
<?php
$total = (int) 0;
while ($row = mysql_fetch_array($results))
{
  echo "<tr>";
  extract($row);  
  $prod = "SELECT * FROM item " ."WHERE i_id ='$carttemp_item_id'";
  $prod2 = mysql_query($prod);
  $prod3 = mysql_fetch_array($prod2);
  extract($prod3);
  echo "<td>";
  echo $carttemp_quan ;	
  echo "</td>";
  echo "<td>";
  echo "<br><img src=\"icon.png\" border=0  width='50' height='30'></a></td>";
  echo "<td>";
  echo $i_name; 
  echo "</a></td>";
  echo "<td align=\"right\">";
  echo $i_sal_price;
  echo "</td>";
  echo "<td align=\"right\">";
  //get extended price
  $extprice = $i_sal_price * $carttemp_quan ;
  echo $extprice;
  echo "</td>";
  echo "<td>";
  echo "<form method=\"POST\" action=\"modcard_m_e_in.php?action=delete\">
       <input type=\"hidden\" name=\"carttemp_qun\" value=\"$carttemp_quan\">
        <input type=\"hidden\" name=\"carttemp_hidden\" value=\"$carttemp_hidden\">
        <input type=\"hidden\" name=\"carttemp_item_id\" value=\"$carttemp_item_id\">";
		echo "<input type=\"submit\" name=\"Submit\" class=\"reset\"
          value=\"Delete Item\">
        </form></td>";
  echo "</tr>";
  //add extended price to total

    //echo "jhgjhgj";
  //$total = $extprice + $total;
 
    $total = $extprice + $total;
}

?>
<tr>
    <td colspan=\"4\" align=\"right\">
      Your total:</td>
      
    <td align=\"right\"> <?php echo $total; ?></td>
    
    <td></td>
    <td>

</td>
</tr>
</table>

<form method="POST" action="sales_final.php">

<input type="hidden" name="modified_hidden" value="<? echo "$carttemp_hidden";?>"/>

<input type="hidden" name="total_f" value="<? echo "$total";?>"/>
<input type="hidden" name="s_d_qun" value="<? echo "$carttemp_quan"; ?>"/>
<input type="hidden" name="s_d_i_name" value="<? echo "$i_name";?>"/>
<input type="hidden" name="s_d_price_each" value="<? echo "$i_sal_price";?>"/>
<input type="hidden" name="extprice" value="<? echo "$extprice";?>"/>
<input type="hidden" name="carttemp_sess" value="<? echo "$carttemp_sess";?>"/>

<input type="submit" id="submit_cart" value="Go">
</form>
</div>
</body>
</html>
