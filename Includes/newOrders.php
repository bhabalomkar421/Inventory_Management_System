<?php 
    include('nav.php');
    ?>

<div class="container">
    <div class="row">
        <h1>Add Order</h1>
        </span>
    </div>
    <form action="newOrders.php" method=POST>
        <div class = "row">
            <div class="form-group col col-lg-3 col col-md-3 col-sm-12  col-xs-12">
                <label for="exampleInputName1">Customer Id</label>
                <input type="text" class="form-control" name="cust_id" id="exampleInputName1" aria-describedby="name" required>
            </div>
            <div class="form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="exampleInputEmail1">Product Id</label>
                <input type="email" class="form-control" name="prod_id" id="exampleInput1" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="exampleInputPhone1">Quantity</label>
                <input type="text" class="form-control" name="quantity" id="exampleInputPhone1" aria-describedby="quantity" required>
            </div>
            <div class="form-group col col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <button class="btn btn-primary" style="margin-top:32px;margin-left:35px" type="submit" name="submit">Submit</button>
            </div>
        </div>
    </form>

</div>

<?php 
    include('footer.php');
    ?>