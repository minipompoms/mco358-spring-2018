<?php
session_start();
include "config.php";
if(isset($_POST['submit'])){
    unset($_SESSION['cart'][$key]);
    
    foreach($_POST['qty'] as $key => $val) {
        
        if($val==0) {
            unset($_SESSION['cart'][$key]);
        }else{
            $_SESSION['cart'][$key]['qty']=$val;
        }
    }
    
}

?>
 

<a href="order.php">back</a> 
<br>
<form method="post" action="submit.php"> 
      
    <table> 
          
        <tr> 
            <th>item</th> 
            <th>qty</th> 
            <th>price</th> 
            <th>subtotal</th> 
        </tr> 
          
        <?php 
          
            
            $sql = "SELECT * FROM products";
            
            $result = mysqli_query($db,$sql);
                   
                    
                    $totalprice=0; 
                    while($row=mysqli_fetch_array($result)){ 
                        $subtotal=$_SESSION['cart'][$row['ITEM_NO']]['qty']*$row['ITEM_PRICE']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                             <td><?php echo $row['ITEM_NO'] ?></td> <td>                       
                            <td><input type="text" name="qty[<?php echo $row['ITEM_NO'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['ITEM_NO']]['qty'] ?>" /></td> 
                            <td><?php echo $row['ITEM_PRICE'] ?>$</td> 
                            <td><?php echo $_SESSION['cart'][$row['ITEM_NO']]['qty']*$row['ITEM_PRICE'] ?>$</td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="5">Total Price: <?php echo $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
 
	
    <input type="submit" name="submit_button" value="Submit Order" />
</form> 
<br /> 

<?php 


