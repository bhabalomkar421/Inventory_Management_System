<?php
    include('db.php');
    $customer_id = $_GET['id'];
    $delete_query = "delete from customer where id = $customer_id";
    $delete_order = "delete from orders where customer_id = $customer_id";
    if(mysqli_query($con, $delete_order)){
        if(mysqli_query($con, $delete_query)){
            echo "<script>window.open('viewCustomers.php','_self')</script>";
        }else{
            echo "";
        }
    }else{
        echo "can't delete account";
    }
    
     

?>