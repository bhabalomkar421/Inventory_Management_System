<?php
    include('db.php');
    $customer_id = $_GET['id'];
    
    $select_order = "select * from orders where customer_id = $customer_id";
    $run_select_order = mysqli_query($con, $select_order);
    while($rows_x = mysqli_fetch_array($run_select_order)){
        $product_id = $rows_x['product_id'];
        $quantity = $rows_x['quantity'];
        
        $select_quantity = "select product_quantity from products where product_id = $product_id";
        $run_select_query2 = mysqli_query($con, $select_quantity);
        while($rows1 = mysqli_fetch_array($run_select_query2)){
            $product_quantity = $rows1['product_quantity'];
        }
    
        $final_quantity = $quantity + $product_quantity;
        $update_query = "UPDATE products SET product_quantity = '$final_quantity' where product_id = $product_id";
        if(mysqli_query($con, $update_query)){
            echo ".";
        } else {
            echo "Error updating record: ".mysqli_error($con);
        }
    }

    $delete_query = "delete from customer where id = $customer_id";
    $delete_order = "delete from orders where customer_id = $customer_id";
    if(mysqli_query($con, $delete_order)){
        if(mysqli_query($con, $delete_query) ){
            echo "<script>window.open('viewCustomers.php','_self')</script>";
        }else{
            echo "";
        }
    }else{
        echo ".";
    }
    
    
     

?>