<?php
    include('db.php');

    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $queryProd = "select * from products where product_id = $product_id";
    $res1 = mysqli_query($con, $queryProd);
    if(mysqli_num_rows($res1) > 0){
        $insert_query = "insert into cart(customer_id,product_id,quantity) values ('{$customer_id}','{$product_id}','{$quantity}')";

        if( mysqli_query($con, $insert_query)){
            
            echo "inserted";
        }else{
            echo "";
        }
    }else{
        echo "<script>alert('Invalid product id');</script>";
    }
?>