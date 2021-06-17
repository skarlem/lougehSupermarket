<?php
$page_name = "Products";


include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

include('controller/manage_products.php'); 


?>


<div class="container-fluid">
<div class="card">
  <div class="card-body">

  <div class="row">
    <div class="col">
    <h5 class="card-title">Products</h5>
    </div>
    <div class="col">
    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#add_product">
  Add Product
</button>
    </div>
</div>


  
  <div class="row" style="height: 90%">
        <div class="col-xl-12">

        
        <div class="table-responsive">
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Barcode</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Cost Per Unit</th>
                <th>Price Per Unit</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
              <?php
                foreach( $product->getProducts() as $row ){
                  $id = $row['id'];
                  $barcode = $row['barcode'];
                  $product_desc = $row['product_desc'];
                  $quantity = $row['quantity'];
                  $cost_per_unit = $row['cost_per_unit'];
                 
                  $unit_price = $row['unit_price'];
                  echo'
                    <tr>
                      <td>'.$barcode.'</td>
                      <td>'.$product_desc.'</td>
                      <td>'.$quantity.'</td>
                      <td>'.$cost_per_unit.'</td>
                      <td>'.$unit_price.'</td>
                      <td>

                      <button class="btn btn-sm btn-icon btn-3 btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#edit_modal'.$id.'">
                      <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        <span class="btn-inner--text">Edit</span>
                    </button>


                    </td>
                    </tr>








                    <div class="modal fade" id="edit_modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>

                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST">
          
          
          
                      
                        <div class="container-fluid">
                        
                        <input type="text" class="form-control" name="id" id="id" placeholder="Product Name" value="'.$id.'" hidden>
                        
                        
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Barcode Number</label>
                              <input type="text" class="form-control"  name="barcode"  maxlength="11" id="exampleFormControlInput1" placeholder="Enter Barcode Number"  value="'.$barcode.'" required    >

                         </div>

                     
    
                         <div class="mb-3">
                         <label for="exampleFormControlInput1" class="form-label">Description</label>
                             <input type="text" class="form-control" id="exampleFormControlInput1"name="product_desc"  id="product_desc"  placeholder="Enter Description of Product"  value="'.$product_desc.'" required>

                        </div>


                         <div class="mb-3">
                         <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                             <input type="number" class="form-control" id="exampleFormControlInput1" name="quantity" id="quantity" placeholder="Quantity" value="'.$quantity.'" required>
                             
                        </div>
         
                   
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cost Per Unit</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="cost_per_unit" id="cost_per_unit" placeholder="Cost" value="'.$cost_per_unit.'" required>
                            
                       </div>
        
                       <div class="mb-3">
                       <label for="exampleFormControlInput1" class="form-label">Cost Per Unit</label>
                           <input type="number" class="form-control" id="exampleFormControlInput1" name="unit_price" id="unit_price" placeholder="Unit Price" value="'.$unit_price.'" required>
                           
                      </div>
                              
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="edit_submit"class="btn btn-primary">Submit</button>
                   </div>
                  </div>
                </form>
              </div>
            </div>  




                  ';

                }


                ?>

           
        </tbody>
  
    </table>
    </div>
</div>



  <!-- Modal -->
  <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" >

                                      

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Barcode Number</label>
                                                <input  type="number" class="form-control"  
                                                oninput=" javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); getBarcode();" id="barcodes" name="barcodes" id="exampleFormControlInput1" 
                                                maxlength = "11 "
                                                  placeholder="Enter Barcode Number" required>
                                        </div>
                                        
                                        <div class="alert alert-warning" id="txtHint"role="alert" hidden>
                                           Barcode already exists!
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Product Description</label>
                                                <input type="text" class="form-control"  name="product_desc" id="exampleFormControlInput1" placeholder="Enter Product Description" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Cost Per Unit</label>
                                                <input type="number" class="form-control"  name="cost_per_unit"id="exampleFormControlInput1" placeholder="How much is the cost per unit?" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Price Per Unit</label>
                                                <input type="number" class="form-control"  name="unit_price" id="exampleFormControlInput1" placeholder="Enter Price of units" required>
                                        </div>


                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                                                <input type="number" class="form-control"  name="quantity" id="exampleFormControlInput1" placeholder="Enter quantity of units" required >
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Select Supplier</label>
                                                <select class="form-select" name="supplier_id_code" aria-label="Default select example" required>
                                                    <option selected disabled hidden>Choose Here</option>

                                                    <?php
                                           

                                                        foreach($supplier->get_suppliers() as $supply){
                                                           $name = $supply['supplier_name'];
                                                            $id  = $supply['id'];
                                                            ?>
                                                            <option value="<?php echo $id ?>"><?php echo $name ?></option>

                                                            <td>
                                              
                                                    <?php
                                                        }

                                                    ?>
                                                   
                                    
                                                </select>
                                        </div>
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="submit-btn" name="add_product"class="btn btn-primary" id="submit-btn" name="submit">Submit</button>
                                    </div>
                                    </form>
                                  </div>
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




  
<script>




function getBarcode(){


  
let barcode = document.getElementById('barcodes').value;
  console.log(barcode);
 setTimeout(function(){ 
   
  checkBarcode(barcode); 
   
   }, 2000);
}



function checkBarcode(data){
  var xhr;
  if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

    xhr.open("POST", "response.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send("barcode_data="+JSON.stringify(data));
    xhr.onreadystatechange = display_data;
    function display_data() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
      console.log('qweqwe'+xhr.responseText);
         
          if(xhr.responseText!=""){
            $("#txtHint").attr("hidden", false);
            document.getElementById("submit-btn").disabled = true;
           // document.getElementById("txtHint"+id).innerHTML = xhr.responseText;
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
