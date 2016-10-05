<?php
$x = $_POST['x'];
echo $x;
$strings = $_POST['tel'] ;
if (ctype_digit($strings)) 
{
   echo "its ok";
}
 else 
{
echo "its not ok ";
}
?>
<form action="temp.php" method="post">
<input type="text" name="tel"/>
<input type="submit" name="submit" value="submit">
</form>
<?php
/*
 * build the program's capability - define variables and functions...
 */
$item_label = '';        // type string
$item_price = 0.0;       // type float
$item_qty = 1;           // type integer
$item_total = 0.0;       // type float - to set use calculate()

function calculate(){
  global $item_price, $item_qty, $item_total;
  $item_price = number_format($item_price, 2);
  $item_total = number_format(($item_price * $item_qty), 2);
}

function itemToString()
 {
  global $item_label, $item_price, $item_qty, $item_total;
  return "$item_label [price=\$$item_price, qty=$item_qty, total=\$$item_total]";
}

/*
 * run the program - set data, call methods...
 */
$item_label = "Coffee";
$item_price = 3.89;
$item_qty = 2;
calculate();           // set $item_total
echo itemToString();   // -> Coffee [price=$3.89, qty=2, total=$7.78]

$item_label = "Chicken";
$item_price = .80;     // per lb.
$item_qty = 3.5;       // lbs.
calculate();           // set $item_total
echo itemToString();   // -> Chicken [price=$0.80, qty=3.5, total=$2.80]
?>
<?php /*?>echo "name :"."<input type='text' name='i_name' value='echo $row['i_name'];'/>";  echo "<br>";
echo"qun :"; echo $row['i_qun']; echo"<br>";
echo"perches price:"; echo $row['i_per_price'];echo"<br>";
echo"sales price:"; echo $row['i_sal_price'];echo"<br>";
<?php */?>