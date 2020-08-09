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
                <th>Product quantity</td>
                <th>Delete</td>
            </tr>
        ';
        while($row = mysqli_fetch_assoc($res)){
            $op .= "<tr><td>{$row['customer_id']}</td><td>{$row['product_id']}</td><td>{$row['quantity']}</td><td><a href='./deleteFromCart.php?id={$row['id']}'>Delete</a></td></tr>";
        }
        $op .= "</table>
                <div style='float:right;'>
                    <a href='./proceed.php?id={$row['customer_id']}' class='btn btn-primary'>Proceed</a>
                </div>
            ";

        mysqli_close($con);

        echo $op;
    }else{
        echo "<h3>No record found</h3>";
    }
?>