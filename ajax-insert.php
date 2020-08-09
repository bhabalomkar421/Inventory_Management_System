<?php
    include('db.php');

    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $insert_query = "insert into cart(customer_id,product_id,quantity) values ('{$customer_id}','{$product_id}','{$quantity}')";

    if( mysqli_query($con, $insert_query)){
        echo "inserted";
    }else{
        echo "";
    }
?>