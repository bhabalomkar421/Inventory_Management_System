<?php
include('nav.php');
if(isset($_GET['id'])){
    $customer_id = $_GET['id'];
    $query_find_order = "select * from customer where id = $customer_id";
    $run_query_for_customer = mysqli_query($con, $query_find_customer);
    while ($customer = mysqli_fetch_array($run_query_for_customer)) {
        $customer_name = $customer['customer_name'];
        $customer_email = $customer['customer_email'];
        $customer_phone = $customer['customer_phone'];
        $customer_gender = $customer['customer_gender'];
        $total_expenditure = $customer['total_expenditure'];
    }

    echo "
        <div class='container'>
            <form action='editOrders.php' method=POST>
                <div class ='row' style='margin-top:25px'>
                    <label for='customer_id'>customer Id</label>
                    <input type='text' class='form-control' name='customer_id' id='customer_id' aria-describedby='name' value='$customer_name' readonly required>
                </div>
                <div class ='row' style='margin-top:25px'>
                    <label for='customer_name'>customer Name</label>
                    <input type='text' class='form-control' name='customer_name' id='customer_name' aria-describedby='name' value='$customer_name'  required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='customer_email'>customer_email</label>
                    <input type='email' class='form-control' name='customer_email' id='customer_email' aria-describedby='emailHelp'value='$customer_email' required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='customer_email'>customer_email</label>
                    <input type='email' class='form-control' name='customer_email' id='customer_email' aria-describedby='emailHelp'value='$customer_email' required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='exampleInputPhone1'>Quantity</label>
                    <input type='number' class='form-control' name='quantity' id='exampleInputPhone1' aria-describedby='quantity' value='$quantity' required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <button class='btn btn-primary btn-lg' type='submit' name='update'>Update  </button>
                </div>
            </form>     
        </div>
        <div style='margin-left:115px;margin-top:50px'>
            <a href='./deleteOrder.php?id=$order_id&product_id=$product_id' ><button class='btn btn-primary btn-lg' >Delete  </button></a>
        </div>
        ";
    }
global $con;
if(isset($_POST['update'])){
    $order_id =  $_POST['order_id'];
    $customer_id = $_POST['cust_id'];
    $product_id = $_POST['prod_id'];
    $quantity = $_POST['quantity'];
    $prev_quantity = $_POST['prev_quantity'];

    //product query
    $product_query = "select * from products where product_id = $product_id";
    $run_product_query = mysqli_query($con, $product_query);
    while ($product = mysqli_fetch_array($run_product_query)) {
        $product_quantity = $product['product_quantity'];
        $product_price = $product['product_price'];
    }

    if($quantity > 0 && $product_quantity > 0) {    
        $total_amount = $product_price * $quantity;
        // update orders  
        $query = "update orders SET quantity = '$quantity', total_amount = '$total_amount' WHERE order_id = '$order_id' and product_id = '$product_id'";
        $run_insert_query = mysqli_query($con, $query);

        //descrease quantity
        $descrease_quantity = $product_quantity - $quantity + $prev_quantity;
        $query_descrease_quan = "UPDATE products SET product_quantity = '$descrease_quantity' WHERE product_id = '$product_id'";
        if(mysqli_query($con, $query_descrease_quan)){
            echo ".";
        } else {
        echo "Error updating record: " . mysqli_error($con);
        }

        //increase customer expenditure
        $sum_query = "SELECT sum(total_amount) as sum_total_amount FROM orders where customer_id = $customer_id";
        $run_sum_query = mysqli_query($con, $sum_query);
        while($rows = mysqli_fetch_array($run_sum_query)){
            $sum_final = $rows['sum_total_amount'];
        }

        $query_increase_expen = "UPDATE customer SET total_expenditure = '$sum_final' WHERE id = '$customer_id'";
        if(mysqli_query($con, $query_increase_expen)){
            echo "<script>window.open('viewOrders.php','_self')</script>";
            echo "";
        }else{
        echo "Error updating record: " . mysqli_error($con);
        }

        }else{
            echo "Quantity should be greater than 0";
        }
    }
include('footer.php');
?>