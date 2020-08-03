<?php
include ('db.php');

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    
    $delete_order = "delete from orders where order_id = $order_id";
    $run_delete = mysqli_query($con, $delete_order);
    if($run_delete){
        //increase the quantity in products table
        //decrease the expenditure from customer expen
        echo "<script>window.open('viewOrders.php','_self')</script>";
    }
}
?>