<?php 
include "connection.php";
if (mysqli_connect_errno()) {
    
    echo "Could  not connect to database: Error: ".mysqli_connect_error();
    
    exit();
}

$sql = "SELECT ITEM_DESC FROM products";
$result=mysqli_query($db,$sql);

if ($result = mysqli_query($db,$sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $item_desc = $row['ITEM_DESC'];
        echo $item_desc."<br />";
    }
}
?>
 <select name="weight">

<?php 
$cdquery="SELECT * FROM products";
$cdresult=mysqli_query($db,$cdquery);

while ($row=mysqli_fetch_array($cdresult)) {
    
    echo "<option value='". $row['ITEM_NO']."'>".$row['ITEM_WEIGHT']
    .'</option>';
}
?> 
</select>

	