
<?php
//author @pkohn
//Array with 5 elements of names
$PrintNameArray = array("Australia", "Belguim", "Cuba", "Denmark", "Egypt");

//loop that returns names
foreach ($PrintNameArray as $key => $name) {
  
    $key = (int)$key+1; //define the variable key to access index of array
    echo "Country Name ". $key ." = " . $name, "<br />";
}

//Array with 10 numeric values
$SumNumericArray = array(1, 11, 21, 31, 41, 51, 61, 71, 81, 91);
echo "<br />";
//prints all elements in the array
foreach ($SumNumericArray as $value) {
    
    print_r($value . " + " );
}
//prints sum of all elements
echo "<br /> sum = " . array_sum($SumNumericArray)

?>