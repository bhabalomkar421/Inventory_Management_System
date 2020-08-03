<?php
include('nav.php');
$customer_id = $_GET['id'];
$query_find_customer = "select * from customer where id = $customer_id";
$run_query_for_customer = mysqli_query($con, $query_find_customer);
while ($customer = mysqli_fetch_array($run_query_for_customer)) {
    $customer_name = $customer['customer_name'];
    $customer_email = $customer['customer_email'];
    $customer_phone = $customer['customer_phone'];
    $customer_gender = $customer['customer_gender'];
    $total_expenditure = $customer['total_expenditure'];

    }
?>
<div class="container" style="margin-top:25px;">
    <div class="row">
        <h1>Customers Details</h1>
    </div>
    <div style="margin-left:50px;">
        <div class="row">
            <h3>Customer Name : <?php echo "  $customer_name " ?></h3>
        </div>
        <div class="row">
            <h3>Customer Email  : <?php echo "  $customer_email " ?></h3>
        </div>  
        <div class="row">
            <h3>Customer Phone  : <?php echo "  $customer_phone " ?></h3>
        </div>  
        <div class="row">
            <h3>Customer Gender  : <?php echo "  $customer_gender " ?></h3>
        </div>  
        <div class="row">
            <h3>Customers Total Expenditure  : <?php echo " ₹ $total_expenditure " ?></h3>
        </div> 
    </div>  

    <div class="row" style="margin-top:25px;">
        <h3><?php echo "$customer_name Orders" ?></h3>
        <span style="float:left;">
        </span>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount(₹)</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $order_query = "select * from orders where customer_id = $customer_id";
            $run_order_query = mysqli_query($con, $order_query);

            while ($rows = mysqli_fetch_array($run_order_query)) {
                $order_id = $rows['order_id'];
                $product_id = $rows['product_id'];
                $quantity = $rows['quantity']; 
                $total_amount = $rows['total_amount'];    
                $date = $rows['date_time'];    
                $product_query = "select * from products where product_id = $product_id";
                $run_prod_query = mysqli_query($con, $product_query);

                while ($products = mysqli_fetch_array($run_prod_query)) {
                    $product_name = $products['product_name'];
                }
                echo "<tr>
                        <th scope='row'>$order_id </th>
                        <td>$product_name</td>
                        <td>$quantity</td>
                        <td>$total_amount </td>
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