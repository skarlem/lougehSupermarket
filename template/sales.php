<?php
$page_name = "Sales";

include('controller/sales_transactions.php');  
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');




?>


<div class="container-fluid">
<div class="card">
  <div class="card-body">

  <div class="row">
    <div class="col">
    <h5 class="card-title">Sales Record History</h5>
    </div>
    <div class="col">
  
    </div>
</div>


  
  <div class="row" style="height: 90%">
        <div class="col-xl-12">

        
        <div class="table-responsive">
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
               <th>Contact Number</th>
            </tr>
        </thead>
        <tbody>
           
              <?php
                 foreach($sales->getSales() as $sales){
                    $product_name = $sales['product_name'];
                    $quantity = $sales['quantity'];
                    $price_per_unit = $sales['price_per_unit'];
                    $customer_name  = $sales['customer_name'];
                    $customer_address  = $sales['customer_address'];
                    $customer_contact  = $sales['customer_contact'];
                    $total_price  = $sales['total_price'];
                  echo'
                    <tr>
                      <td>'.$product_name.'</td>
                      <td>'.$quantity.'</td>
                      <td>'.$price_per_unit.'</td>
                      <td>'.$total_price.'</td>
                      <td>'.$customer_name.'</td>
                      <td>'.$customer_address.'</td>
                      <td>'.$customer_contact.'</td>
                  

                    


                    </td>
                    </tr>












                  ';

                }


                ?>

           
        </tbody>
  
    </table>
    </div>
</div>






  </div>
</div>
</div>


</div>


<script>

$(document).ready(function() {
    $('#example').DataTable({

      "order": [],
    });
} );
    
</script>

