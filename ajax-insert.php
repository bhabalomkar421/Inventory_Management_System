<?php
    include('db.php');

    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $queryProd = "select * from products where product_id = $product_id";
    $res1 = mysqli_query($con, $queryProd);
    while ($rows = mysqli_fetch_array($res1)) {
        $product_quantity = $rows['product_quantity'];
        $product_name = $rows['product_name'];
    }
    if($product_quantity < 0){
        echo "No stocks left for $product_name";
    }else if($product_quantity < $quantity){
        echo "Only $product_quantity stocks left for $product_name";
    }else if(mysqli_num_rows($res1) > 0){
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