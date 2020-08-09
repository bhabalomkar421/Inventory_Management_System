<?php 
    include('nav.php');
    ?>

<div class="container" style = "margin-top : 25px">
    <div class="row">
        <div class ="col col-lg-6">
            <h1>Our Orders</h1>
        </div>
        <div class ="col col-lg-6" style="float:right">
            <a href="addOrders.php">
                <button class="btn btn-primary btn-lg">Add new order</button>
            </a>
        </div>
    </div>
    <div class="row">
       <div class="form-group">
            <form action = 'viewOrders.php' method = POST>
                <label for="sortBy">sortBy</label>
                <select class="select" id="inputState" class="form-control" name="sort_by_submit">
                    <option value="total_amount">Total Price</option>
                    <option value="date_time">Date</option>
                </select>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
         </div>
    </div>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Customer Id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price(₹)</th>
                <th scope="col">Date</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_POST['submit']) && isset($_POST['sort_by_submit'])){
                $sort = $_POST['sort_by_submit'];
                $order_query = "select * from orders order by $sort";
                $run_order_query = mysqli_query($con, $order_query);

                while ($order = mysqli_fetch_array($run_order_query)) {
                    $order_id = $order['order_id'];
                    $product_id = $order['product_id'];
                    $customer_id = $order['customer_id'];
                    $quantity = $order['quantity'];
                    $amount = $order['total_amount'];
                    $date = $order['date_time'];
                    //for product name
                    $product_query_1 = "select * from products where product_id = $product_id";
                    $run_prod1_query = mysqli_query($con, $product_query_1);

                    while ($prod = mysqli_fetch_array($run_prod1_query)) {
                        $product_name = $prod['product_name'];
                    }

                    //for customer name
                    $customer_query_1 = "select * from customer where id = $customer_id";
                    $run_cust_query = mysqli_query($con, $customer_query_1);

                    while ($cust = mysqli_fetch_array($run_cust_query)) {
                        $customer_name = $cust['customer_name'];
                    }

                    echo "<tr>
                            <th scope='row'>$order_id </th>
                            <td><a href='customerDetails.php?id=$customer_id'>$customer_id<a></td>
                            <td><a href='customerDetails.php?id=$customer_id'>$customer_name</a></td>
                            <td>$product_id</td>
                            <td>$product_name</td>
                            <td>$quantity</td>
                            <td>$amount </td>
                            <td>$date</td>
                            <td> <a href='./editOrders.php?id=$order_id&product_id=$product_id'><img src='./edit.png'></a></td>
                        </tr>";
                }
            }else{
                $order_query = "select * from orders";
                $run_order_query = mysqli_query($con, $order_query);

                while ($order = mysqli_fetch_array($run_order_query)) {
                    $order_id = $order['order_id'];
                    $product_id = $order['product_id'];
                    $customer_id = $order['customer_id'];
                    $quantity = $order['quantity'];
                    $amount = $order['total_amount'];
                    $date = $order['date_time'];
                    //for product name
                    $product_query_1 = "select * from products where product_id = $product_id";
                    $run_prod1_query = mysqli_query($con, $product_query_1);

                    while ($prod = mysqli_fetch_array($run_prod1_query)) {
                        $product_name = $prod['product_name'];
                    }

                    //for customer name
                    $customer_query_1 = "select * from customer where id = $customer_id";
                    $run_cust_query = mysqli_query($con, $customer_query_1);

                    while ($cust = mysqli_fetch_array($run_cust_query)) {
                        $customer_name = $cust['customer_name'];
                    }

                    echo "
                        <tr>
                            <th scope='row'>$order_id </th>
                            <td><a href='customerDetails.php?id=$customer_id'>$customer_id<a></td>
                            <td><a href='customerDetails.php?id=$customer_id'>$customer_name</a></td>
                            <td>$product_id</td>
                            <td>$product_name</td>
                            <td>$quantity</td>
                            <td>$amount </td>
                            <td>$date</td>
                            <td> <a href='./editOrders.php?id=$order_id&product_id=$product_id'><img src='./edit.png'></a></td>
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