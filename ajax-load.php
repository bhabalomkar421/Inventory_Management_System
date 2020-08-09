<?php
    include('db.php');

    $query = "select * from cart";
    $res = mysqli_query($con, $query);

    $op = '';

    if(mysqli_num_rows($res) > 0){
        $op = '<table class="table table-bordered" border="1" width ="100% cellspacing="0" cellpadding="10px" >
            <tr>
                <th>Customer ID</td>
                <th>Product ID</td>
                <th>Product Name</td>
                <th>Product quantity</td>
                <th>Delete</td>
            </tr>
        ';
        while($row = mysqli_fetch_assoc($res)){
            $customer_id = $row['customer_id'];
            $product_id = $row['product_id'];
            $queryProd = "select * from products where product_id = $product_id";
            $res1 = mysqli_query($con, $queryProd);
            if(mysqli_num_rows($res1) > 0){
                while($row1 = mysqli_fetch_assoc($res1)){
                    $product_name = $row1['product_name'];
                }
            }

            $op .= "<tr><td>{$row['customer_id']}</td><td>{$row['product_id']}</td><td>{$product_name}</td><td>{$row['quantity']}</td><td><a href='./deleteFromCart.php?id={$row['id']}&customer_id={$row['customer_id']}'>Delete</a></td></tr>";
        }
        $op .= "</table>
                <div>
                    <a href='./proceed.php?id=$customer_id' class='btn btn-primary' style='float:right;'>Proceed</a>
                </div>
            ";

        mysqli_close($con);

        echo $op;
    }else{
        echo "<h3>No record found</h3>";
    }
?>