<?php
    include('db.php');
    $product_id = $_GET['id']; 
    $delete_query = "delete from products where product_id= $product_id";
    if(mysqli_query($con, $delete_query)){
        echo "<script>window.open('viewAllProducts.php','_self')</script>";
    }else{
        echo "";
    }
     

?>