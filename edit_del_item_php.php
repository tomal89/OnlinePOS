<?php
include('db.php');
if(isset($_POST["back"]))
{
echo  header('location: edit_del_item.php');
}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file1"]["name"]);
$extension = end($temp);
if ((($_FILES["file1"]["type"] == "image/gif")
|| ($_FILES["file1"]["type"] == "image/jpeg")
|| ($_FILES["file1"]["type"] == "image/jpg")
|| ($_FILES["file1"]["type"] == "image/pjpeg")
|| ($_FILES["file1"]["type"] == "image/x-png")
|| ($_FILES["file1"]["type"] == "image/png"))
&& ($_FILES["file1"]["size"] < 200000000000000000000000000000000000000000000000000000000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file1"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file1"]["error"] . "<br>";
    }
  else
    {
		$name_rename11  = uniqid();
		
   		$file_name1 = $_FILES["file1"]["name"];
		
		$newfilename111 = $name_rename11 . $file_name1;
    
    if (file_exists("upload/" . $newfilename111))
      {
      $error1 = "already exists";
      }
    else
      {
     
	 
	  move_uploaded_file($_FILES["file1"]["tmp_name"],"upload/"  . $newfilename111);
	  
	 
      $file_path1  = "upload/" . $name_rename11 . $_FILES["file1"]["name"];
	  $com1 = "upload complet";	  
	  //mysql_query("INSERT INTO `upload` VALUES ('','$cus_id','$file_name1 ','$file_path1')");	  
      }
    }
  }
else
  {
 $inv1 = "Invalid file";
  }


/////////////////////////////////////////////


$id_del = $_POST['id'];
$i_sal_price= $_POST['i_sal_price'];
$i_paid = $_POST['i_paid'];
//echo $i_suplier;
$i_due = $_POST['i_due'];
$i_des = $_POST['i_des'];
$barcode = $_POST['barcode'];
$i_suplier = $_POST['i_suplier'];
$i_name = $_POST['i_name'];
$i_qun = $_POST['i_qun'];
$i_per_price = $_POST['i_per_price'];
$i_total_price = $_POST['i_total_price'];
$i_p_date = $_POST['i_p_date'];

$direct_order_rate = $_POST['direct_order_rate'];
//echo $direct_order_rate;
echo $i_suplier;
$national_program_rate = $_POST['national_program_rate'];
$spacial_program_rate = $_POST['spacial_program_rate'];
$product_discount_rate = $_POST['product_discount_rate'];

$market_retailar_price = $_POST['market_retailar_price'];
$offer_prog = $_POST['offer_prog'];
$offer_prog_start_date = $_POST['offer_prog_start_date'];
$offer_prog_end_date = $_POST['offer_prog_end_date'];

$i_delivery_qun = $_POST['i_delivery_qun'];
$i_due_qun = $_POST['i_due_qun'];


$i_p_date = $_POST['i_p_date'];
if ($i_p_date == '')
{
	$i_p_date = '';
	}
	elseif($i_p_date != '')
	{
		$i_p_datee_e = $i_p_date;
$d_i_p_date = new DateTime($i_p_date_e);
$i_p_date =  $d_i_p_date->format('Y-m-d');
}


$offer_prog_end_date = $_POST['offer_prog_end_date'];
if ($offer_prog_end_date == '')
{
	$offer_prog_end_date = '';
	}
	elseif($offer_prog_end_date != '')
	{
		$i_offer_prog_end_date = $offer_prog_end_date;
$d_i_offer_prog_end_date = new DateTime($i_offer_prog_end_date);
$offer_prog_end_date =  $d_i_offer_prog_end_date->format('Y-m-d');
}



$offer_prog_start_date = $_POST['offer_prog_start_date'];
if ($offer_prog_start_date == '')
{
	$offer_prog_start_date = '';
	}
	elseif($offer_prog_start_date != '')
	{
		$i_offer_prog_start_date = $offer_prog_start_date;
$d_i_offer_prog_start_date = new DateTime($i_offer_prog_start_date);
$offer_prog_start_date =  $d_i_offer_prog_start_date->format('Y-m-d');
}



$sql="UPDATE item SET 
`i_suplier` = '$i_suplier' ,
`i_name` = '$i_name' , 
`i_des` = '$i_des' , 
`barcode` = '$barcode' , 
`i_qun` = '$i_qun' , 
`i_delivery_qun` = '$i_delivery_qun' ,
`i_due_qun` = '$i_due_qun' ,
`i_per_price` = '$i_per_price' ,
`direct_order_rate` = '$direct_order_rate' , 
`national_program_rate` = '$national_program_rate' ,
`spacial_program_rate` = '$spacial_program_rate' ,
`product_discount_rate` = '$product_discount_rate' ,
`i_sal_price` = '$i_sal_price' , 
`market_retailar_price` = '$market_retailar_price' ,
`offer_prog` = '$offer_prog' ,
`offer_prog_start_date` = '$offer_prog_start_date' ,
`offer_prog_end_date` = '$offer_prog_end_date' , 
`i_paid` = '$i_paid' ,
`i_due` = '$i_due' ,
`i_total_price` = '$i_total_price' ,
`product_pic_path` = '$file_path1' , 
`i_p_date` = '$i_p_date' 
WHERE i_id = $id_del ";
mysql_query($sql) or die (mysql_error());

print '<script language="javascript">alert("!!!Update Susseccfuly!!!"); window.location="edit_del_item.php"</script>';







