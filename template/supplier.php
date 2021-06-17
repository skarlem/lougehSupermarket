<?php
$page_name = "Supplier";

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

include('controller/manage_supplier.php');  

?>


<div class="container-fluid">
<div class="card">
  <div class="card-body">

  <div class="row">
    <div class="col">
    <h5 class="card-title">Supplier</h5>
    </div>
    <div class="col">
    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#add_supplier">
  New Supplier
</button>
    </div>
</div>


  
  <div class="row" style="height: 90%">
        <div class="col-xl-12">

        
        <div class="table-responsive">
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>IDCODE</th>
                <th>Supplier Name</th>
                <th>Contact No.</th>
                <th>Address</th>
                <th>Status</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
              <?php
                foreach( $supplier->get_suppliers() as $row ){
                  $id = $row['id'];
                 
                  $supplier_name = $row['supplier_name'];
                  $contact_no = $row['contact_no'];
                  $address = $row['address'];
                  $statusBool = $row['status'];
                  if($statusBool){
                    $status = "Active";
                  }else{
                    $status = "Inactive";
                  }
                  echo'
                    <tr>
                      <td>'.$id.'</td>
                      <td>'.$supplier_name.'</td>
                      <td>'.$contact_no.'</td>
                      <td>'.$address.'</td>
                     
                      <td>'.$status.'</td>
                      <td>
                      <form class="form"method="POST">
                      <button class="btn btn-sm btn-icon btn-3 btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#edit_modal'.$id.'">
                      <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        <span class="btn-inner--text">Edit</span>
                    </button>

                 
                    <input type="hidden"   class="form-control" name="status"  maxlength="11" id="exampleFormControlInput1" placeholder=""  value="'.$statusBool.'">
                    <input type="hidden"   class="form-control" name="id"  maxlength="11" id="exampleFormControlInput1" placeholder=""  value="'.$id.'">
                          <button class="btn btn-sm btn-icon btn-3 btn-info" type="submit" name="delete_submit">
                          <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                            <span class="btn-inner--text">Change Status</span>
                        </button>


                      </form>

                  
                   
                    


                    </td>
                    </tr>








      






            


            <div class="modal fade" id="edit_modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel'.$id.'" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel'.$id.'">Edit Supplier Information</h5>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST">
  
  
  
              
                <div class="container-fluid">
                
                <input type="hidden"   class="form-control" name="id"  maxlength="11" id="exampleFormControlInput1" placeholder=""  value="'.$id.'">
                
                
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">ID CODE</label>
                      <input type="text"  disabled class="form-control" name="id"  maxlength="11" id="exampleFormControlInput1" placeholder=""  value="'.$id.'">

                 </div>

             

                 <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                     <input type="text" class="form-control" id="exampleFormControlInput1"name="supplier_name"  id="product_desc"  placeholder="Enter Name of Supplier"  value="'.$supplier_name.'" required>

                </div>


                 <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                     <input type="number" class="form-control" id="exampleFormControlInput1" name="contact_no" id="contact" placeholder="Contact Number" value="'.$contact_no.'" required>
                     
                </div>
 
           
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="address" id="address" placeholder="Address" value="'.$address.'" required>
                    
               </div>



             


                      
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit_submit"class="btn btn-primary">Submit</button>
           </div>
          </div>
        </form>
      </div>
    </div>  




    

    <div class="modal fade" id="delete_modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel'.$id.'" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel'.$id.'">Supplier Status</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST">



      
        <div class="container-fluid">
      
        <input type="hidden"   class="form-control" name="status"  maxlength="11" id="exampleFormControlInput1" placeholder=""  value="'.$statusBool.'">
        <input type="hidden"   class="form-control" name="id"  maxlength="11" id="exampleFormControlInput1" placeholder=""  value="'.$id.'">
        
       
     <div class="alert alert-warning" role="alert">
    Are you sure you want to change supplier status?
    </div>

        



              
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" name="delete_submit"class="btn btn-primary">Submit</button>
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
  <div class="modal fade" id="add_supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">New Supplier Information</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST">

                                      

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Supplier Name</label>
                                                <input type="text" class="form-control"  name="supplier_name" id="exampleFormControlInput1" placeholder="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Contact Number </label>
                                                <input type="number" class="form-control"  name="contact_no" id="exampleFormControlInput1" placeholder="" required >
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                                                <input type="text" class="form-control"  name="address" id="exampleFormControlInput1" placeholder=""required >
                                        </div>

                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="add_supplier" class="btn btn-primary" id="submit-btn" name="submit">Submit</button>
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
