<?php
    include('db.php');
    $cart_id = $_GET['id'];
    $customer_id = $_GET['customer_id']; 
    $delete_query = "delete from cart where id = $cart_id";
    if(mysqli_query($con, $delete_query)){
        echo "<script>window.open('customerAddOrder.php?id={$customer_id}','_self')</script>";
    }else{
        echo "";
    }
     

?>