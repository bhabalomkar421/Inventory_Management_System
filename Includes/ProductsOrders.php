<?php
    include('nav.php');
    $product_id = $_GET['id'];
    $query_find_product = "select * from products where product_id = $product_id";
    $run_query_for_product = mysqli_query($con, $query_find_product);
    while ($product = mysqli_fetch_array($run_query_for_product)) {
        $product_name = $product['product_name'];
    }
?>
<div class="container" style="margin-top:25px;"> 
    <div class="row" style="float:left">
        <div class="col col-lg-12">
            <h1><?php echo "$product_name Orders" ?></h1>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Customer Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Date<th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $order_query = "select * from orders where product_id = $product_id";
            $run_order_query = mysqli_query($con, $order_query);

            while ($orders = mysqli_fetch_array($run_order_query)) {
                $customer_id = $orders['customer_id'];
                $date = $orders['date_time'];

                $customer_query = "select * from customer where id = $customer_id";
                $run_cust_query = mysqli_query($con, $customer_query);

                while ($customers = mysqli_fetch_array($run_cust_query)) {
                    $customer_name = $customers['customer_name'];
                    $customer_email = $customers['customer_email'];
                    $customer_phone = $customers['customer_phone'];
                    $customer_gender = $customers['customer_gender'];
                }
                
                echo "
                    <tr>
                        <th scope='row'>$customer_id </th>
                        <td>$customer_name</td>
                        <td>$customer_email</td>
                        <td>$customer_phone </td>
                        <td>$customer_gender</td>
                        <td>$date</td>
                    </tr>";
            }
        ?>     
        </tbody>
    </table>
</div>


<?php 
    include('footer.php');
    ?>