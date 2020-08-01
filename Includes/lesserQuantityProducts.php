<?php 
    include('nav.php');
    ?>

<div class="container" style = "margin-top : 25px">
    <div class="row">
        <div class ="col col-lg-6">
            <h1> Lesser Quantity Products </h1>
        </div>
        
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Product id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Quantity Lower Limit</th>
                <th scope="col">Product Price</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            $product_query = "select * from products where products.product_quantity < products.quantity_lower_limit";
            $run_query = mysqli_query($con, $product_query);

            while ($rows = mysqli_fetch_array($run_query)) {
                $product_id = $rows['product_id'];
                $product_name = $rows['product_name'];
                $product_quantity = $rows['product_quantity'];
                $quantity_lower_limit = $rows['quantity_lower_limit'];
                $product_price = $rows['product_price'];
                echo "<tr>
                        <th scope='row'>$product_id </th>
                        <td>$product_name</td>
                        <td>$product_quantity</td>
                        <td>$quantity_lower_limit </td>
                        <td>$product_price</td>
                    </tr>";
            }  
        ?>
            
            
        </tbody>
    </table>
</div>

<?php 
    include('footer.php');
    ?>