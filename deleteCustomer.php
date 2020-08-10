<?php
    include('db.php');
    $customer_id = $_GET['id']; 
    $delete_query = "delete from customer where id = $customer_id";
    if(mysqli_query($con, $delete_query)){
        echo "<script>window.open('viewCustomers.php','_self')</script>";
    }else{
        echo "";
    }
     

?>