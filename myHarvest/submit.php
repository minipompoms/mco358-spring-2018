
<?php include "header.php";?>
<body >
<canvas style=height:100px;></canvas>
<div>
</div>
<?php

echo "Order Date: " . $_POST['todaysDate']. "<br>";
echo "Customer Name: " . $_POST['customerFirstName']['customerLastName'] 
."   Phone Number:" . $_POST['TEL '] . "<br>";
echo "Customer Address: " . $_POST['deliveryAddress']['DeliveryAddress2']
['city']['state']['zip'] . "<br><br>";

echo "Items: " . "  Quantity  " . "   Item Number   " . "   Item Description   " . "<br>";
 $_POST['quantity'].['itemNumber'].['itemDescription']."<br><br>";

 $_POST['delivery_box'];
 echo "Thank you for your order." 


?>
<p><canvas style=height:200px;></canvas>
</body>
<?php include "footer.php";?>