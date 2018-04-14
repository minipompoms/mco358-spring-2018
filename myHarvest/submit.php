<?php
session_start();
include "header.php";
include "config.php";
?>
<?php
if (isset($_POST['submit'], $_POST['cust_name'])) {
    $sql = "SELECT * FROM products";
}
?>
<title>Order Complete!</title>

<body>
	<canvas style="height: 30px;"></canvas>

	<div style="text-align: left; margin-left: 520px; padding: 24px;"></div>

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

$TOTAL = "0.00";

mysqli_query($db, "INSERT INTO ORDERS (CUST_TEL, ORDER_DATE, ORDER_TYPE_ID, ORDER_TOTAL,  CUSTOMERS_CUST_ID) 
VALUES ('$TEL', '$DATE', '$DELIVERY', '$TOTAL',  '$TEL')");

$orderid = mysqli_insert_id($db);

if (mysqli_affected_rows($db) > 0) {
    mysqli_affected_rows($db);
} else {
    
    echo mysqli_error($db);
}
?>
<b>ORDER ID:&nbsp;&nbsp;</b><?php echo $orderid ?><br>
<b>DATE:&nbsp;&nbsp;</b><?php echo $DATE ?><br>
	<b>NAME:&nbsp;&nbsp;</b><?php echo $CUST_NAME ?><br><br>
	<b>&nbsp;&nbsp;TEL:&nbsp;&nbsp;</b><?php echo $TEL ?><br>
	<b>ADDRESS:&nbsp;&nbsp;</b><?php echo $ADDRESS?><br>
	<b>&nbsp;&nbsp;</b><?php echo $CITY ?><br>
	<b>&nbsp;&nbsp;</b><?php echo $STATE ?><br>
	<b>&nbsp;&nbsp;</b><?php echo $ZIP ?><br>
	<b>&nbsp;&nbsp;<?php echo 'QTY'."\t\t" ?></b>
	<b>&nbsp;&nbsp;<?php echo 'ITEM DETAIL'."\t\t" ?></b>
	<b>&nbsp;&nbsp;<?php echo 'PRICE'."\t\t" ?></b>
	<b>&nbsp;&nbsp;<?php echo 'SUBTOTAL' ."\t\t"?></b><br>

<?php

foreach ($_POST['qty'] as $itemNo=>$itemQty) {
    if (! ($itemQty == 0 || $itemQty== "")) {
             
        $sql = "SELECT * FROM products WHERE ITEM_NO = $itemNo";
        $result = mysqli_query($db, $sql);
        
        if ($row = mysqli_fetch_array($result)) {
         echo $itemQty."\t\t\t"."&nbsp;&nbsp;";
         echo  $itemWeight = $row["ITEM_WEIGHT"]."\t\t\t";
         echo   $itemDesc = $row["ITEM_DESC"]."\t\t\t";
         echo    $price = $row["ITEM_PRICE"]."\t\t\t&nbsp;";
          
            $subtotal = $price*$itemQty;
            $total+= $subtotal;
            echo $subtotal."<br>";
            $sql= "INSERT INTO ORDER_LINE_ITEM (ITEM_DESC, ITEM_NO, ITEM_WEIGHT_TYPE, ORDER_ID,  PRICE, QUANTITY)
            VALUES ('$itemDesc', $itemNo, '$itemWeight', $orderid,  $price, $itemQty)";
            $result = mysqli_query($db, $sql);
            
           
           $_SESSION['cart'][$itemNo]['qty']="";
        }
    }
}

//update order total with actual total
$sql= "UPDATE ORDERS SET ORDER_TOTAL = $total WHERE ORDER_ID = $orderid";
     
$result = mysqli_query($db, $sql);

?>
<br>
	<blockquote>
		<b> Thank You For Your Order. A copy of this order has been sent to
			your email. </b>
	</blockquote><p>
		<canvas style="height: 200px;"></canvas>
</body>
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
