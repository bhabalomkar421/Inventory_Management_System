<?php 
    include('nav.php');
    ?>

<div class="container">
    <div class="row">
        <h1>Our customers</h1>
        <span style="float:left;">
        <a href="customerRegistration.php">
            <button class="btn btn-primary btn-lg">Add Customer</button>
        </a>
        </span>
    </div>
    <div class="row">
        <div class="form-group">
            <form action = 'viewcustomers.php' method = POST>
                <label for="sortBy">sortBy</label>
                <select class="select" id="inputState" class="form-control" name="sort_by_expenditure">
                    <option value="total_expenditure">Expenditure</option>
                </select>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
         </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Total Expenditures</th>
                <th scope="col">€.orders</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_POST['submit']) && isset($_POST['sort_by_expenditure'])){
                $sort = $_POST['sort_by_expenditure'];
                $product_query = "select * from customer order by $sort";
                $run_query = mysqli_query($con, $product_query);
                
                while ($rows = mysqli_fetch_array($run_query)) {
                    $customer_id = $rows['id'];
                    $customer_name = $rows['customer_name'];
                    $customer_email = $rows['customer_email'];
                    $customer_phone = $rows['customer_phone'];
                    $customer_gender = $rows['customer_gender'];
                    $total_expenditure = $rows['total_expenditure'];
                    echo "<tr>
                            <th scope='row'>$customer_id </th>
                            <td>$customer_name</td>
                            <td>$customer_email</td>
                            <td>$customer_phone </td>
                            <td>$customer_gender</td>
                            <td>$total_expenditure</td>
                            <td> <a href='./viewCustomerOrders.php?id=$customer_id'><button class='btn btn-primary'>View</button></a></td>
                    </tr>";
                }
            }else{
                $customers_query = "select * from customer";
                $run_query = mysqli_query($con, $customers_query);

                while ($rows = mysqli_fetch_array($run_query)) {
                    $customer_id = $rows['id'];
                    $customer_name = $rows['customer_name'];
                    $customer_email = $rows['customer_email'];
                    $customer_phone = $rows['customer_phone'];
                    $customer_gender = $rows['customer_gender'];
                    $total_expenditure = $rows['total_expenditure'];
                    echo "<tr>
                            <th scope='row'>$customer_id </th>
                            <td>$customer_name</td>
                            <td>$customer_email</td>
                            <td>$customer_phone </td>
                            <td>$customer_gender</td>
                            <td>$total_expenditure</td>
                            <td> <a href='./viewCustomerOrders.php?id=$customer_id'><button class='btn btn-primary'>View</button></a></td>
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