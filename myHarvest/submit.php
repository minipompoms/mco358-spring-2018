<!DOCTYPE html>
<html>          
<?php 
include "header.php";
include "config.php";

?>
<title>Order Complete!</title>  
       
<body>
<canvas style=height:30px;></canvas>

<div style=text-align:left;margin-left:520px;padding:24px;></div>

<h2>Order Summary</h2>
<?php 
$CUST_NAME = $_POST['cust_name'];
$DATE = $_POST['date'];
$TEL = $_POST['tel'];
$ADDRESS = $_POST['address'];
$CITY = $_POST['city'];
$STATE = $_POST['state'];
$ZIP = $_POST['zip'];
$DELIVERY = $_POST['delivery'];


$TOTAL = "44.11";



mysqli_query($db,"INSERT INTO ORDERS (CUST_TEL, ORDER_DATE, ORDER_TYPE_ID, ORDER_TOTAL,  CUSTOMERS_CUST_ID) 
VALUES ('$TEL', '$DATE', '$DELIVERY', '$TOTAL',  '$TEL')");




if(mysqli_affected_rows($db)>0){
     mysqli_affected_rows($db);
     
}
else{
   
    echo mysqli_error($db);
}
?>

<b>DATE:&nbsp;&nbsp;</b><?php echo $DATE ?><br>
<b>NAME:&nbsp;&nbsp;</b><?php echo $CUST_NAME ?><br><br>
<b>&nbsp;&nbsp;TEL:&nbsp;&nbsp;</b><?php echo $TEL ?><br>
<b>ADDRESS:&nbsp;&nbsp;</b><?php echo $ADDRESS?><br>
<b>&nbsp;&nbsp;</b><?php echo $CITY ?><br>
<b>&nbsp;&nbsp;</b><?php echo $STATE ?><br>
<b>&nbsp;&nbsp;</b><?php echo $ZIP ?><br>
<br><?php echo $qty ?><br>
<br><?php echo $item_no ?><br>
<br><?php echo $item_desc ?><br>	

<?php echo $TOTAL?>




<br>
<blockquote><b> Thank You For Your Order. A copy of this order has been sent to your email. </b>
</blockquote>



<p><canvas style=height:200px;></canvas>
</body>
<?php 

?>
<?php include "footer.php";?>
<?php 

function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
