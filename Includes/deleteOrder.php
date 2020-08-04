<?php
include ('db.php');

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $select_order = "select * from orders where order_id = $order_id";
    $run_select_query = mysqli_query($con, $select_order);
    while($rows0 = mysqli_fetch_array($run_select_query)){
        $customer_id = $rows0['customer_id'];
        $product_id = $rows0['product_id'];
        $quantity = $rows0['quantity'];
    }

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

    $delete_order = "delete from orders where order_id = $order_id";
    mysqli_query($con, $delete_order);

    $sum_query = "SELECT sum(total_amount) as sum_total_amount FROM orders where customer_id = $customer_id";
    $run_sum_query = mysqli_query($con, $sum_query);
    while($rows = mysqli_fetch_array($run_sum_query)){
        $sum_final = $rows['sum_total_amount'];
    }

    $query_increase_expen = "UPDATE customer SET total_expenditure = '$sum_final' WHERE id = '$customer_id'";
    if(mysqli_query($con, $query_increase_expen)){
        echo "<script>window.open('viewOrders.php','_self')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

}
?>