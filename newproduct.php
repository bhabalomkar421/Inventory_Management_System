<?php 
    include('nav.php');
    ?>

<div class="container">
    <div class="row">
        <h1>Add new product</h1>
        </span>
    </div>
    <form action="newProduct.php" method=POST>
        <div class="form-group">
            <label for="exampleInputName1">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="exampleInputName1" aria-describedby="name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Quantity</label>
            <input type="text" class="form-control" name="product_quantity" id="exampleInput1" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPhone1">Quantity Lower Limit</label>
            <input type="text" class="form-control" name="quantity_lower_limit" id="exampleInputPhone1" aria-describedby="quantity" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPhone1">Product Price (per quantity)</label>
            <input type="text" class="form-control" name="product_price" id="exampleInputPhone1" aria-describedby="quantity" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
    </form>
</div>

<?php 
    include('footer.php');
    ?>
<?php
if(isset($_POST['submit'])){
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['product_quantity'];
    $quantity_lower_limit = $_POST['quantity_lower_limit'];
    $product_price = $_POST['product_price'];

    $query = "insert into products (product_name,product_quantity,quantity_lower_limit,product_price) 
		values ('$product_name','$product_quantity','$quantity_lower_limit','$product_price')";

    $run_register_query = mysqli_query($con, $query);
    echo "<script>alert('SucessFully ADDED...');</script>";
	echo "<script>window.open('viewAllProducts.php','_self')</script>";
}

?>

