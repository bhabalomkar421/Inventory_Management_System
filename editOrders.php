<?php
include('nav.php');
$order_id = $_GET['id'];
$query_find_order = "select * from orders where order_id = $order_id";
$run_query_for_order = mysqli_query($con, $query_find_order);
while ($order = mysqli_fetch_array($run_query_for_order)) {
        $product_id = $order['product_id'];
        $customer_id = $order['customer_id'];
        $quantity = $order['quantity'];
    }
echo "
    <div class='container'>
        <form action='editOrders.php' method=POST>
            <div class ='row' style='margin-top:25px'>
                <label for='exampleInputName1'>Customer Id</label>
                <input type='text' class='form-control' name='cust_id' id='exampleInputName1' aria-describedby='name' value=$customer_id required>
            </div>
            <div class = 'row' style='margin-top:25px'>
                <label for='exampleInputEmail1'>Product Id</label>
                <input type='text' class='form-control' name='prod_id' id='exampleInput1' aria-describedby='emailHelp'value=$product_id required>
            </div>
            <div class = 'row' style='margin-top:25px'>
                <label for='exampleInputPhone1'>Quantity</label>
                <input type='number' class='form-control' name='quantity' id='exampleInputPhone1' aria-describedby='quantity' value=$quantity required>
            </div>
            <div class = 'row' style='margin-top:25px'>
                <button class='btn btn-primary btn-lg' type='submit' name='update'>Update  </button>
            </div>
        </form>     
    </div>
    <div style='margin-left:115px;margin-top:50px'>
        <a href='./deleteOrder.php?id=$order_id' ><button class='btn btn-primary btn-lg' >Delete  </button></a>
    </div>
    ";

global $con;
if(isset($_POST['update'])){
    $customer_id = $_POST['cust_id'];
    $product_id = $_POST['prod_id'];
    $quantity = $_POST['quantity'];

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
        $query = "update orders SET quantity = '$quantity', total_amount = '$total_amount' WHERE order_id = '$order_id'";
        $run_insert_query = mysqli_query($con, $query);

        //descrease quantity
        $descrease_quantity = $product_quantity - $quantity;
        $query_descrease_quan = "UPDATE products SET product_quantity = '$descrease_quantity' WHERE product_id = '$product_id'";
        if(mysqli_query($con, $query_descrease_quan)){
            echo ".";
        } else {
        echo "Error updating record: " . mysqli_error($con);
        }

        //increase customer expenditure

        //find current expenditure
        $find_current_expenditure = "select total_expenditure from customer where id = $customer_id";
        $run_customer_query = mysqli_query($con, $find_current_expenditure);
        while ($cust = mysqli_fetch_array($run_customer_query)) {
            $current_expenditure = $cust['total_expenditure'];
        }
        
        $expenditure = $current_expenditure + $total_amount;
        $query_increase_expen = "UPDATE customer SET total_expenditure = '$expenditure' WHERE id = '$customer_id'";
        if(mysqli_query($con, $query_increase_expen)){
            echo "<script>window.open('viewOrders.php','_self')</script>";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }

        }else{
            echo "Quantity should be greater than 0";
        }
    }
include('footer.php');
?>