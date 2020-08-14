<?php 
    include('nav.php');
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $query_find_product = "select * from products where product_id = $product_id";
        $run_query_for_product = mysqli_query($con, $query_find_product);
        while ($rows = mysqli_fetch_array($run_query_for_product)) {
            $product_id = $rows['product_id'];
            $product_name = $rows['product_name'];
            $product_quantity = $rows['product_quantity'];
            $quantity_lower_limit = $rows['quantity_lower_limit'];
            $product_price = $rows['product_price'];
        }
        echo "
        <div class='container'>
            <form action='editProductDetails.php' method=POST>
                <div class ='row' style='margin-top:25px'>
                    <label for='product_id'>Product Id</label>
                    <input type='text' class='form-control' name='product_id' id='product_id' aria-describedby='name' value='$product_id' readonly required>
                </div>
                <div class ='row' style='margin-top:25px'>
                    <label for='product_name'>Product Name</label>
                    <input type='text' class='form-control' name='product_name' id='product_name' aria-describedby='name' value='$product_name'  required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='product_quantity'>Product Quantity</label>
                    <input type='text' class='form-control' name='product_quantity' id='product_quantity' aria-describedby='emailHelp'value='$product_quantity' required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='quantity_lower_limit'>product quantity lower limit</label>
                    <input type='text' class='form-control' name='quantity_lower_limit' id='quantity_lower_limit' aria-describedby='emailHelp'value='$quantity_lower_limit' required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='product_price'>product price</label>
                    <input type='text' class='form-control' name='product_price' id='product_price' aria-describedby='emailHelp'value='$product_price' required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <button class='btn btn-primary btn-lg' type='submit' name='update'>Update  </button>
                </div>
            </form>     
        </div>
        <div style='margin-left:115px;margin-top:50px'>
            <a href='./deleteProduct.php?id=$product_id' ><button class='btn btn-primary btn-lg' >Delete Product </button></a>
        </div>
        ";
    }else{
        echo "<h2>Invalid URL</h2>";
    }

global $con;
if(isset($_POST['update'])){
    $product_id = $_POST['product_id'];
    $product_name =  $_POST['product_name'];
    $product_quantity =  $_POST['product_quantity'];
    $quantity_lower_limit =  $_POST['quantity_lower_limit'];
    $product_price =  $_POST['product_price'];

    //product update query
    
    $product_update_query = "UPDATE products SET product_name = '$product_name', product_quantity = '$product_quantity', quantity_lower_limit = '$quantity_lower_limit' , product_price = '$product_price' WHERE product_id = '$product_id'";
    if(mysqli_query($con, $product_update_query)){
        echo "<script>window.open('viewAllProducts.php','_self')</script>";
        echo "";
    }else{
    echo "Error updating record: " . mysqli_error($con);
    }
}
include('footer.php');
?>