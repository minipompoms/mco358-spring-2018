<?php
include "config.php";

if($db->connect_errno){
    echo "DB connection failed. ".$db->connect_error;
}

$USERNAME = 'NKOHN';
$PASSWORD = 'nkpass';
$CUSTOMER_ID = '7187445278';

$sql =  "INSERT INTO `AUTHORIZED_USERS`(`CUSTOMERS_CUSTOMER_ID`,`USERNAME`, `CUSTOMER_ID`, `PASSWORD`) 
VALUES('$CUSTOMER_ID','$USERNAME', '$CUSTOMER_ID', '$PASSWORD')";



if($db->query($sql)=== true){
    echo "record created successfully";
}
    else{
        
    echo "error: ".$db->error;
   
}

$db->close();

?>