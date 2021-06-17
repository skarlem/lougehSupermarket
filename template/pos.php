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
                            $id  = $supply['id'];
                    ?>
                    <option value="<?php echo $id ?>"><?php echo $name ?></option>

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
                            <input type="number" oninput="getQuantity()" id="quantity"name="quantity" class="form-control" min="0" id="exampleFormControlInput1" placeholder="Number of Items" required>
                        </div>

                        <div class="alert alert-warning" role="alert"id="txtHint" hidden>
                           Sorry the quantity selected exceeded the amount of items in the inventory :(
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
    let unit_price=$('#unit_price').val();

    let quantity = $('#quantity').val();
  
    $('#total_price').val(unit_price*quantity);
    $('#total_price2').val(unit_price*quantity);

});

$('select[name="product"]').on('change',function(){

   // alert($('select option:selected').text());
    let unit_price=$('select option:selected').val();

    let product_name=$('select option:selected').text();
    product_name = product_name.split(" ").join("")
   
    getPrice();
    $('#product_name').val(product_name);
    

});





function getPrice(){


  
let product = document.getElementById('product').value;
  console.log(product);
 setTimeout(function(){ 
   
    checkPrice(product); 
   
   }, 500);
}



function checkPrice(data){
  var xhr;
  if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

    xhr.open("POST", "response.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send("price_data="+JSON.stringify(data));
    xhr.onreadystatechange = display_data;
    function display_data() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            let response = xhr.responseText;
      console.log('price is '+response);
         
          if(response!=""){
        //     $("#txtHint").attr("hidden", false);
        //     document.getElementById("submit-btn").disabled = true;
        //    // document.getElementById("txtHint"+id).innerHTML = xhr.responseText;
            $('#unit_price').val(response);
           }else{
            $("#txtHint").attr("hidden", true);
            document.getElementById("submit-btn").disabled = false;
           }
         
       
       
        } else {
          alert('There was a problem with the request.');
        }
      }
  }
}







function getQuantity(){


  
let product = document.getElementById('product').value;
let quantity = document.getElementById('quantity').value;
  console.log(quantity);
 setTimeout(function(){ 
   
    checkQuantity(product,quantity); 
   
   }, 500);
}



function checkQuantity(data,input){
  var xhr;
  if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

    xhr.open("POST", "response.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send("quantity_data="+JSON.stringify(data));
    xhr.onreadystatechange = display_data;
    function display_data() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            let response = xhr.responseText;
      console.log('input is '+input);
      console.log('response is '+response);
          if(parseInt(input)>parseInt(response)){
               console.log(response);
             $("#txtHint").attr("hidden", false);
             document.getElementById("submit-btn").disabled = true;
          
           }else{
             $("#txtHint").attr("hidden", true);
             document.getElementById("submit-btn").disabled = false;
           }
         
       
       
        } else {
          alert('There was a problem with the request.');
        }
      }
  }
}

</script>
    
    
    </div>
</div>
</div>

