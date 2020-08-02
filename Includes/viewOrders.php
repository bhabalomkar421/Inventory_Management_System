<?php 
    include('nav.php');
    ?>

<div class="container" style = "margin-top : 25px">
    <div class="row">
        <div class ="col col-lg-6">
            <h1>Our Orders</h1>
        </div>
        <div class ="col col-lg-6" style="float:right">
            <a href="newOrders.php">
                <button class="btn btn-primary btn-lg">Add new order</button>
            </a>
        </div>
    </div>
    <div class="row">
       <div class="form-group">
            <form action = 'viewOrders.php' method = POST>
                <label for="sortBy">sortBy</label>
                <select class="select" id="inputState" class="form-control" name="sort_by_submit">
                    <option value="total_price">Total Price</option>
                    <option value="date">Date</option>
                </select>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
         </div>
    </div>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order id</th>
                <th scope="col">Customer id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_POST['submit']) && isset($_POST['sort_by_submit'])){
                $sort = $_POST['sort_by_submit'];
                $product_query = "select * from products order by $sort";
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
                            <td> <a href='./viewCustomerOrders.php?id=$product_id'><button class='btn btn-primary'>View</button></a></td>
                    </tr>";
                }
            }else{
                $product_query = "select * from products";
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
                            <td> <a href='./viewCustomerOrders.php?id=$product_id'><button class='btn btn-primary'>View</button></a></td>
                    </tr>";
                }
            }
            
        ?>
            
            
        </tbody>
    </table>
</div>

<?php 
    include('footer.php');
    ?>