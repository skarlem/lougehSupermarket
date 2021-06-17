<?php
$page_name = "Point of Sale";


include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');


include('controller/sales_transactions.php');  




?>


<div class="container mt-5">
    <div class="card">
        <div class="card-body">

       <form method="POST" id="sale_form">
       
       
       
       
   


            <div class="row">   
                <div class="col">
                


                <input type="hidden" name="product_name" id="product_name" class="form-control" min="0" id="exampleFormControlInput1" placeholder="">


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Select Product</label>
                        <select class="form-select" name="product" id="product" aria-label="Default select example" required>
                            <option selected disabled hidden value="">Choose Here</option>

                    <?php
                                           

                        foreach($product->getProducts() as $supply){
                            $name = $supply['product_desc'];
                            $barcode  = $supply['barcode'];
                            $unit_price  = $supply['unit_price'];
                    ?>
                    <option value="<?php echo $unit_price ?>"><?php echo $name ?></option>

                        <td>
                                              
                    <?php
                     }

                    ?>
                                                   
                                    
                                                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Unit Price</label>
                    <input type="number" id="unit_price" name="unit_price"class="form-control" min="0" id="exampleFormControlInput1" placeholder="Price" required>
                </div>
              
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                    <input type="number" id="quantity"name="quantity" class="form-control" min="0" id="exampleFormControlInput1" placeholder="Number of Items" required>
                </div>
                <input type="hidden" name="total_price" id="total_price2"class="form-control" min="0" id="exampleFormControlInput1" placeholder="Price"  required>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Total Price</label>
                    <input type="number"disabled  id="total_price" name="unit_price"class="form-control" min="0" id="exampleFormControlInput1" placeholder="Price" required>
                </div>

              

                </div>

                <div class="col">
                
                  <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" id="exampleFormControlInput1" placeholder="Name of Customer" required>
                </div>

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Customer Contact Number</label>
                    <input type="text" name="customer_contact" class="form-control" id="exampleFormControlInput1" placeholder="Contact Number of Customer" required>
                </div>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Customer Address</label>
                    <input type="text" name="customer_address" class="form-control" id="exampleFormControlInput1" placeholder="Address of Customer" required>
                </div>
               
                </div>
                
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <button type="submit" name="add_product"class="btn btn-primary" id="submit-btn" name="submit">Submit Payment</button>
                        <button type="submit"  onclick="resetForm()"class="btn btn-warning" id="submit-btn" name="submit">Reset Fields</button>
                    </div>
                   
            </div>
            </form>

<script>
function resetForm() {
  document.getElementById("sale_form").reset();
}

$('#quantity').on('change',function(){
   // alert($('select option:selected').text());
    let unit_price=$('select option:selected').val();

    let quantity = $('#quantity').val();
  
    $('#total_price').val(unit_price*quantity);
    $('#total_price2').val(unit_price*quantity);

});

$('select[name="product"]').on('change',function(){
   // alert($('select option:selected').text());
    let unit_price=$('select option:selected').val();

    let product_name=$('select option:selected').text();
    product_name = product_name.split(" ").join("")
    $('#unit_price').val(unit_price);
    $('#product_name').val(product_name);
    

});


</script>
    
    
    </div>
</div>
</div>

