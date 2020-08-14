<?php
include('db.php');
if(isset($_GET['id'])){
    $customer_id = $_GET['id'];

    //fetch all rows of that specific customer_id in cart table
    $query = "select * from cart where customer_id = $customer_id";
    $res = mysqli_query($con, $query);

    $queryOrder = "select * from orders";
    $resOrder = mysqli_query($con, $queryOrder);
    if(mysqli_num_rows($resOrder) == 0){
        $order_number = 1;
    }else if(mysqli_num_rows($resOrder) > 0){
        
        while($rowOrder = mysqli_fetch_assoc($resOrder)){
            $order_number = $rowOrder['order_id'] + 1;
        }
    }else{
        echo "";
    }

    if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            // $prod_quan = "$product_id : $quantity";
            // $newOrder->$product_id = $quantity;
            // $customerOrder .=" ".$prod_quan.",";

            //product query
            $product_query = "select * from products where product_id = $product_id";
            $run_product_query = mysqli_query($con, $product_query);
            while ($product = mysqli_fetch_array($run_product_query)) {
                $product_quantity = $product['product_quantity'];
                $product_price = $product['product_price'];
                $product_name = $product['product_name'];
            }
            if($quantity > 0 && $product_quantity > 0){
                
                $total_amount = $product_price * $quantity;
                // insert to orders(customer_id, product_id, quantity, total_amount, dateTime)  
                $queryInsertOrder = "insert into orders(order_id,customer_id, product_id, product_name, quantity, total_amount, date_time) values ('$order_number','$customer_id', '$product_id', '$product_name', '$quantity','$total_amount',NOW())";
                $run_insert_query = mysqli_query($con, $queryInsertOrder);

                //descrease quantity
                $descrease_quantity = $product_quantity - $quantity;
                $query_descrease_quan = "UPDATE products SET product_quantity = '$descrease_quantity' WHERE product_id = '$product_id'";
                if(mysqli_query($con, $query_descrease_quan)){
                    echo ".";
                } else {
                echo "Error updating record: " . mysqli_error($con);
                }

                $sum_query = "SELECT sum(total_amount) as sum_total_amount FROM orders where customer_id = $customer_id";
                $run_sum_query = mysqli_query($con, $sum_query);
                while($rows = mysqli_fetch_array($run_sum_query)){
                    $sum_final = $rows['sum_total_amount'];
                }

                $query_increase_expen = "UPDATE customer SET total_expenditure = '$sum_final' WHERE id = '$customer_id'";
                if(mysqli_query($con, $query_increase_expen)){
                    echo "<script>window.open('viewOrders.php','_self')</script>";
                    echo "success";
                } else {
                echo "Error updating record: " . mysqli_error($con);
                }

            }else{
                echo "Quantity should be greater than 0";
            }
        }
    }
    $delete_query = "delete from cart where customer_id = $customer_id";
    if(mysqli_query($con, $delete_query)){
        echo "<script>window.open('customerDetails.php?id=$customer_id','_self')</script>";
    }else{
        echo "";
    }
}

?>