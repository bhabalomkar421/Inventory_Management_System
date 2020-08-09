<?php
    include('db.php');
    $cart_id = $_GET['id'];
    $delete_query = "delete from cart where id = $cart_id";
    if(mysqli_query($con, $delete_query)){
        echo "<script>window.open('addOrders.php','_self')</script>";
    }else{
        echo "";
    }
     

?>