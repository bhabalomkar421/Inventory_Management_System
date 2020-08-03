<?php 
    include('nav.php');
    ?>

<div class="container" style="margin-top:25px">
    <div class="row">
        <div class="col">
            <h1>Add Order</h1>
        </div>
        <div class="col" style="margin-top:5px">
            <form action = 'newOrders.php' method = POST>
                Number of orders
                <input type="text" name = "columns" defaultValue="1" required>
                <button type="submit" name = "submit_number" class="btn btn-primary btn-sm">Add</button>
            </form>
        </div>
        </span>
    </div>
    <?php
        if(isset($_POST['submit_number'])){ 
            $number = $_POST['columns'];
            for ($i=0; $i < $number; $i++) { 
                echo "
                <form action='newOrders.php' method=POST>
                    <div class = 'row' style='margin-top:25px'>
                        <div class='form-group col col-lg-3 col col-md-3 col-sm-12  col-xs-12'>
                            <label for='exampleInputName1'>Customer Id</label>
                            <input type='text' class='form-control' name='cust_id$i' id='exampleInputName1' aria-describedby='name' required>
                        </div>
                        <div class='form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12'>
                            <label for='exampleInputEmail1'>Product Id</label>
                            <input type='text' class='form-control' name='prod_id$i' id='exampleInput1' aria-describedby='emailHelp' required>
                        </div>
                        <div class='form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12'>
                            <label for='exampleInputPhone1'>Quantity</label>
                            <input type='number' class='form-control' name='quantity$i' id='exampleInputPhone1' aria-describedby='quantity' required>
                        </div>
                        <div class='form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12'>
                            <button class='btn btn-primary' style='margin-top:32px;margin-left:35px' type='submit' name='submit$i'>Add</button>
                        </div>
                    </div>
                </form>";
            }
        ?>

    <?php  }else{  ?>
            <form action="newOrders.php" method=POST>
                <div class = "row" style="margin-top:25px">
                    <div class="form-group col col-lg-3 col col-md-3 col-sm-12  col-xs-12">
                        <label for="exampleInputName1">Customer Id</label>
                        <input type="text" class="form-control" name="cust_id" id="exampleInputName1" aria-describedby='name' required>
                    </div>
                    <div class="form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="exampleInputEmail1">Product Id</label>
                        <input type="text" class="form-control" name="prod_id" id="exampleInput1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="exampleInputPhone1">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="exampleInputPhone1" aria-describedby="quantity" required>
                    </div>
                    <div class="form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <button class="btn btn-primary" style="margin-top:32px;margin-left:35px" type="submit" name="submit">Add</button>
                    </div>
                </div>
            </form>
    <?php  }  ?>    
    
</div>

<?php
    global $con;
    if(isset($_POST['submit'])){
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
        if($quantity > 0 && $product_quantity > 0){
            
            $total_amount = $product_price * $quantity;
            // insert to orders(customer_id, product_id, quantity, total_amount, dateTime)  
            $query = "insert into orders(customer_id, product_id, quantity, total_amount, date_time) values ('$customer_id', '$product_id', '$quantity','$total_amount',NOW())";
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
            // $find_current_expenditure = "select total_expenditure from customer where id = $customer_id";
            // $run_customer_query = mysqli_query($con, $find_current_expenditure);
            // while ($cust = mysqli_fetch_array($run_customer_query)) {
            //     $current_expenditure = $cust['total_expenditure'];
            // }
            // $expenditure = $current_expenditure + $total_amount;

            $sum_query = "SELECT sum(total_amount) as sum_total_amount FROM orders where customer_id = $customer_id";
            $run_sum_query = mysqli_query($con, $sum_query);
            while($rows = mysqli_fetch_array($run_sum_query)){
                $sum_final = $rows['sum_total_amount'];
            }

            $query_increase_expen = "UPDATE customer SET total_expenditure = '$sum_final' WHERE id = '$customer_id'";
            if(mysqli_query($con, $query_increase_expen)){
                echo "<script>window.open('viewOrders.php','_self')</script>";
            } else {
            echo "Error updating record: " . mysqli_error($con);
            }

        }else{
            echo "Quantity should be greater than 0";
        }
    }
    ?>

<?php 
    include('footer.php');
    ?>
    