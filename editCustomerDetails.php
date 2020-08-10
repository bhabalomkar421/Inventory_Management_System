<?php
include('nav.php');
if(isset($_GET['id'])){
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

    echo "
        <div class='container'>
            <form action='editCustomerDetails.php' method=POST>
                <div class ='row' style='margin-top:25px'>
                    <label for='customer_id'>customer Id</label>
                    <input type='text' class='form-control' name='customer_id' id='customer_id' aria-describedby='name' value='$customer_id' readonly required>
                </div>
                <div class ='row' style='margin-top:25px'>
                    <label for='customer_name'>customer Name</label>
                    <input type='text' class='form-control' name='customer_name' id='customer_name' aria-describedby='name' value='$customer_name'  required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='customer_email'>customer Email</label>
                    <input type='email' class='form-control' name='customer_email' id='customer_email' aria-describedby='emailHelp'value='$customer_email' required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='customer_phone'>customer phone</label>
                    <input type='text' class='form-control' name='customer_phone' id='customer_phone' aria-describedby='emailHelp'value='$customer_phone' required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='customer_gender'>customer gender</label>
                    <input type='text' class='form-control' name='customer_gender' id='customer_gender' aria-describedby='emailHelp'value='$customer_gender' readonly required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <label for='total_expenditure'>customer total expenditure</label>
                    <input type='text' class='form-control' name='total_expenditure' id='total_expenditure' aria-describedby='emailHelp'value='$total_expenditure' readonly required>
                </div>
                <div class = 'row' style='margin-top:25px'>
                    <button class='btn btn-primary btn-lg' type='submit' name='update'>Update  </button>
                </div>
            </form>     
        </div>
        <div style='margin-left:115px;margin-top:50px'>
            <a href='./deleteCustomer.php?id=$customer_id' ><button class='btn btn-primary btn-lg' >Delete Account </button></a>
        </div>
        ";
    }
global $con;
if(isset($_POST['update'])){
    $customer_id = $_POST['customer_id'];
    $customer_name =  $_POST['customer_name'];
    $customer_phone =  $_POST['customer_phone'];
    $customer_email =  $_POST['customer_email'];

    //customer update query
    
    $customer_update_query = "UPDATE customer SET customer_name = '$customer_name', customer_phone = '$customer_phone', customer_email = '$customer_email' WHERE id = '$customer_id'";
    if(mysqli_query($con, $customer_update_query)){
        echo "<script>window.open('customerDetails.php?id=$customer_id','_self')</script>";
        echo "";
    }else{
    echo "Error updating record: " . mysqli_error($con);
    }
}
include('footer.php');
?>