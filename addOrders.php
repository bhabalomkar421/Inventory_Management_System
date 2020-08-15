<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<?php
    include('nav.php');
    include('db.php');
    $select_customers = "select * from customer";
    $run_cust_query = mysqli_query($con, $select_customers);
     
?>

<div class="container my-4">
<div id="error-message" class="alert alert-warning" style="display:none;"></div>
<div id="success-message" class="alert alert-success" style="display:none;"></div>
<form id="addForm">
    <label for='customer_id'>Customer </label>
    <select id="customer_id" name='customer_id' class="form-control">
    <?php
        // $i = 0;
        while($customer = mysqli_fetch_array($run_cust_query)) {
            $customer_name = $customer['customer_name'];
            $customer_id = $customer['id'];
            echo "<option id='$customer_id' value='$customer_id'>$customer_name</option>";
            // $i++;
        }
    ?>
    </select>
    <label for='product_id'>Product Id</label>
    <input type="text" class="form-control" name="product_id" id = "product_id" required>
    <label for='quantity'>quantity </label>
    <input type="text" class="form-control" name="quantity" id = "quantity" required>
    <br>
    <input type="submit" id="save-button" name="submit" value="save" class="btn btn-primary">
</form>
</div>

<div class="container my-4" id="table-data">

</div>

<script>
$(document).ready(function(){
    function loadTable(){
        $.ajax({
            url : 'ajax-load.php',
            type : "POST",
            success : function(data){
                $("#table-data").html(data);
            }
        })
    }
    loadTable();

   
    $("#save-button").on("click",function(e){
        e.preventDefault();

        var cust_id = $( "#customer_id" ).val();
        var prod_id = $( "#product_id" ).val();
        var quan = $("#quantity").val();
        if(cust_id == "" || prod_id == "" || quan == ""){
            $("#error-message").html("All fields are required").slideDown();
            $("#success-message").slideUp();
        }else{
            $.ajax({
                url : "ajax-insert.php",
                type : "POST",
                data : {customer_id:cust_id,product_id:prod_id,quantity:quan},
                success : function(data){
                    if(data.startsWith("No stocks left for")){
                        alert(data);
                    }else if(data.startsWith("Only ")){
                        alert(data);
                    }else if(data){
                        console.log(data);
                        loadTable();
                        $("#addForm").trigger("reset");
                        $("#success-message").html("data inserted succesfully").slideDown();
                        $("#error-message").slideUp();
                    }else{
                        $("#error-message").html("can't save record").slideDown();
                        $("#success-message").slideUp();
                    }
                }
            });
        }
    });
});

</script>

<?php
    include('footer.php');
    ?>