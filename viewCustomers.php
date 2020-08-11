<?php 
    include('nav.php');
    ?>

<div class="container">
    <div class="row"  style="margin-top:25px">
        <h1>Our customers</h1>
        <span style="float:left;">
        <a href="customerRegistration.php">
            <button class="btn btn-primary btn-lg">Add Customer</button>
        </a>
        </span>
    </div>
    <div class="row" style="margin-top:25px">
        <div class="col col-lg-6">
            <div class="form-group input-group mb-3">
                <form action = 'viewCustomers.php' method = POST>
                    <input type="text" class="form-control" name="search_customer" placeholder="Customer name....." required>
                    <div class="input-group-append">
                        <span class="input-group-text"><button type="submit" name="search" class="btn btn-primary btn-sm">Search</button></span>
                    </div>     
                </form>
            </div>
        </div>
        <div class="col col-lg-6">
            <div class="form-group input-group mb-3">
                <form action = 'viewCustomers.php' method = POST>
                    <label for="sortBy">sortBy</label>
                    <select class="select" id="inputState" name="sort_by_expenditure">
                        <option value="total_expenditure">Expenditure</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
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
                <th scope="col">Total Expenditures(₹)</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_POST['search']) && isset($_POST['search_customer'])){
                $customer_name = $_POST['search_customer'];
                $get_pro = "select * from customer where customer_name like '%$customer_name%'";
                $run_pro = mysqli_query($con, $get_pro);
                $count = mysqli_num_rows($run_pro);
                if ($count > 0) {
                    while ($results = mysqli_fetch_array($run_pro)) {
                        $customer_id = $results['id'];
                        $customer_name = $results['customer_name'];
                        $customer_email = $results['customer_email'];
                        $customer_phone = $results['customer_phone'];
                        $customer_gender = $results['customer_gender'];
                        $total_expenditure = $results['total_expenditure'];
                        echo "<tr>
                                <th scope='row'>$customer_id </th>
                                <td><a href = './customerDetails.php?id=$customer_id'>$customer_name</a></td>
                                <td>$customer_email</td>
                                <td>$customer_phone </td>
                                <td>$customer_gender</td>
                                <td>$total_expenditure</td>
                        </tr>";
                    }
                }else{
                    echo "No customer found ";
                }
            }
            else if(isset($_POST['submit']) && isset($_POST['sort_by_expenditure'])){
                $sort = $_POST['sort_by_expenditure'];
                $product_query = "select * from customer order by $sort DESC";
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
                            <td><a href = './customerDetails.php?id=$customer_id'>$customer_name</a></td>
                            <td>$customer_email</td>
                            <td>$customer_phone </td>
                            <td>$customer_gender</td>
                            <td>$total_expenditure</td>
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
                            <td><a href = './customerDetails.php?id=$customer_id'>$customer_name</a></td>
                            <td>$customer_email</td>
                            <td>$customer_phone </td>
                            <td>$customer_gender</td>
                            <td>$total_expenditure</td>
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