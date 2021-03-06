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
                    <option value="date_time">Date</option>
                    <option value="total_amount">Total Price</option>
                </select>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
         </div>
    </div>
    
        <?php
            if(isset($_POST['submit']) && isset($_POST['sort_by_submit'])){
                $sort = $_POST['sort_by_submit'];
                if($sort == "date_time"){
                    $order_query = "select * from orders order by $sort";
                    $run_order_query = mysqli_query($con, $order_query);

                    while ($order = mysqli_fetch_array($run_order_query)) {
                        $order_id = $order['order_id'];
                    $product_id = $order['product_id'];
                    $customer_id = $order['customer_id'];
                    $quantity = $order['quantity'];
                    $product_name = $order['product_name'];
                    $amount = $order['total_amount'];
                    $date = $order['date_time'];
                    

                    //for customer name
                    $customer_query_1 = "select * from customer where id = $customer_id";
                    $run_cust_query = mysqli_query($con, $customer_query_1);

                    while ($cust = mysqli_fetch_array($run_cust_query)) {
                        $customer_name = $cust['customer_name'];
                    }
                    $order_id_top = 2;
    
                    $customer_top_orderid = "SELECT order_id FROM orders ORDER BY order_id LIMIT 1";
                    $run_first_order_query = mysqli_query($con, $customer_top_orderid);

                    while ($ord = mysqli_fetch_array($run_first_order_query)) {
                        $order_id_top = $ord['order_id'];
                    }

                    if($order_id == $order_id_top || $order_id != $temp ){
                            echo "
                            <table class='table table-bordered'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Order Id</th>
                                        <th scope='col'>Customer Id</th>
                                        <th scope='col'>Customer Name</th>
                                        <th scope='col'>Product Id</th>
                                        <th scope='col'>Product Name</th>
                                        <th scope='col'>Quantity</th>
                                        <th scope='col'>Total Price(₹)</th>
                                        <th scope='col'>Date</th>
                                        <th scope='col'>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                    </tr>
                                ";
                        }else{
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
                            </tr>
                            </tbody>
                        </table>";
                        }
                        
                        $temp = $order_id;
                        
                    }
                }else{
                    $order_query = "select * from orders order by $sort DESC";
                    $run_order_query = mysqli_query($con, $order_query);
                    echo "<table class='table table-bordered'>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>Order Id</th>
                            <th scope='col'>Customer Id</th>
                            <th scope='col'>Customer Name</th>
                            <th scope='col'>Product Id</th>
                            <th scope='col'>Product Name</th>
                            <th scope='col'>Quantity</th>
                            <th scope='col'>Total Price(₹)</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Edit</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($order = mysqli_fetch_array($run_order_query)) {
                        $order_id = $order['order_id'];
                        $product_id = $order['product_id'];
                        $customer_id = $order['customer_id'];
                        $quantity = $order['quantity'];
                        $product_name = $order['product_name'];
                        $amount = $order['total_amount'];
                        $date = $order['date_time'];

                        //for customer name
                        $customer_query_1 = "select * from customer where id = $customer_id";
                        $run_cust_query = mysqli_query($con, $customer_query_1);

                        while ($cust = mysqli_fetch_array($run_cust_query)) {
                            $customer_name = $cust['customer_name'];
                        }


                        $query_temp = "select order_id from orders where ";
                        if($order_id == 7 || $order_id != $temp){
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
                                    </tr>
                                ";
                        }else{
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
                            </tr>
                            ";
                        }
                        
                        $temp = $order_id;
                        
                    }
                    echo "</tbody>
                    </table>";
                }
                
            }else{
            
                $order_query = "select * from orders";
                $run_order_query = mysqli_query($con, $order_query);

                while ($order = mysqli_fetch_array($run_order_query)) {
                    $order_id = $order['order_id'];
                    $product_id = $order['product_id'];
                    $customer_id = $order['customer_id'];
                    $quantity = $order['quantity'];
                    $product_name = $order['product_name'];
                    $amount = $order['total_amount'];
                    $date = $order['date_time'];
                    

                    //for customer name
                    $customer_query_1 = "select * from customer where id = $customer_id";
                    $run_cust_query = mysqli_query($con, $customer_query_1);

                    while ($cust = mysqli_fetch_array($run_cust_query)) {
                        $customer_name = $cust['customer_name'];
                    }
                    $order_id_top = 2;
                    //for top order id
                    // $customer_top_orderid = "select top 1 * from products.series where state = 'xxx' order by id";
                    $customer_top_orderid = "SELECT order_id FROM orders ORDER BY order_id LIMIT 1";
                    $run_first_order_query = mysqli_query($con, $customer_top_orderid);

                    while ($ord = mysqli_fetch_array($run_first_order_query)) {
                        $order_id_top = $ord['order_id'];
                    }

                    if($order_id == $order_id_top || $order_id != $temp ){
                        echo "<br>
                        <table class='table table-bordered'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>Order Id</th>
                                    <th scope='col'>Customer Id</th>
                                    <th scope='col'>Customer Name</th>
                                    <th scope='col'>Product Id</th>
                                    <th scope='col'>Product Name</th>
                                    <th scope='col'>Quantity</th>
                                    <th scope='col'>Total Price(₹)</th>
                                    <th scope='col'>Date</th>
                                    <th scope='col'>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                </tr>
                            ";
                    }else{
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
                        </tr>
                        </tbody>
                    </table><br>";
                    }
                $temp = $order_id;
                }
            }
            
        ?>
            
            
        </tbody>
    </table>
</div>

<?php 
    include('footer.php');
    ?>