<? 
// ak sate date time 
include('db.php');
$result = mysql_query(" SELECT `carttemp_date` FROM `carttemp` WHERE `carttemp_sess` = '4588f62aec3ea191772fbccfb35556a2'");

while ($row = mysql_fetch_array($result))
{
 $to = date("m.d.y",strtotime($row['carttemp_date']));
echo $to;
}
?>

<? 
// Alada  date time 

$result = mysql_query(" SELECT `carttemp_date` FROM `carttemp` WHERE `carttemp_sess` = '4588f62aec3ea191772fbccfb35556a2'");

while ($row = mysql_fetch_array($result))
{
 $to = date("m.d.y");
echo $to;
 echo "</br>";
 
 $to1 =  strtotime($row['carttemp_date']);
 echo $to1;
 $to5 = date('g:ia', strtotime($result_ar['airtime']));
  echo $to5;
}
?>
