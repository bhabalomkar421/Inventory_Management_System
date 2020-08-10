<?php 
    include('nav.php');
    ?>
<style>
    body {
        background-color : #e0ebeb
    }
</style>
<div class="container">
    
    <div class="row"  style="margin-top:1rem">
        <div class="col col-lg-4 col-md-4  col-xs-12 col-sm-4">
            <div class="card" style="width: 19rem;">
                <img src="customers.jpg" class="card-img-top" alt="..." style="padding:1rem">
                <div class="card-body">
                    <h4 class="card-title">Customers</h4>
                    <p class="card-text"><a href="customerRegistration.php" class="btn btn-primary">Add Customers</a></p>
                    <p class="card-text"><a href="viewCustomers.php" class="btn btn-primary">Show Customers</a></p>
                </div>
            </div>
        </div>
        <div class="col col-lg-4 col-md-4 col-xs-12 col-sm-4">
            <div class="card" style="width: 19rem;height:90%">
                <img src="products.jpg" class="card-img-top" alt="..." style="padding:1rem;">
                <div class="card-body">
                    <h4 class="card-title center">Products</h4>
                    <p class="card-text"><a href="viewAllProducts.php"  class="btn btn-primary">View All products</a></p>
                    <p class="card-text"><a href="newproduct.php"  class="btn btn-primary">Add new products</a></p>
                    <p class="card-text"><a href="lesserQuantityProducts.php" >Show Products of lesser quantity</a></p>
                </div>
            </div>
        </div>
        <div class="col col-lg-4 col-md-4 col-xs-12 col-sm-4">
            <div class="card" style="width: 19rem;">
                <img src="orders.jpg" class="card-img-top" alt="..." style="padding:1rem">
                <div class="card-body" style="padding:1rem">
                    <h4 class="card-title">Orders</h4>
                    <p class="card-text"><a href="addOrders.php"  class="btn btn-primary">Add Orders</a></p>
                    <p class="card-text"><a href="viewOrders.php"  class="btn btn-primary">View Orders</a></p>
                </div>
            </div>
        </div>
    </div>
<div>