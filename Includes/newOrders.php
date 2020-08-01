<?php 
    include('nav.php');
    ?>

<div class="container">
    <div class="row">
        <h1>Add Order</h1>
        </span>
    </div>
    <form action="newOrders.php" method=POST>
        <div class="form-group">
            <label for="exampleInputName1">Customer Id</label>
            <input type="text" class="form-control" name="cust_id" id="exampleInputName1" aria-describedby="name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Id</label>
            <input type="email" class="form-control" name="prod_id" id="exampleInput1" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPhone1">Quantity</label>
            <input type="text" class="form-control" name="quantity" id="exampleInputPhone1" aria-describedby="quantity" required>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php 
    include('footer.php');
    ?>