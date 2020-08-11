<?php
    include('nav.php');
    include('db.php');
    // $delete_query = "delete from cart";
    // if(mysqli_query($con, $delete_query)){
    //     echo "";
    // }else{
    //     echo "";
    // }
?>

<div class="container my-4">
<div id="error-message" class="alert alert-warning" style="display:none;"></div>
<div id="success-message" class="alert alert-success" style="display:none;"></div>
<form id="addForm">
    <label for='customer_id'>customer Id</label>
    <input type="fixed" class="form-control" name="customer_id" id = "customer_id" required>
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
        var cust_id = $("#customer_id").val();
        var prod_id = $("#product_id").val();
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
                    if(data){
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