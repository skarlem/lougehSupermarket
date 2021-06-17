<?php 
 include('models/supplier_model.php');

 $supplier = new Supplier($conn);


 if(isset($_POST['add_supplier'])){


    
    
    $supplier_name =  $conn->real_escape_string($_POST['supplier_name']);
    $contact_no =  $conn->real_escape_string($_POST['contact_no']);
    $address =  $conn->real_escape_string($_POST['address']);

    
  
    $array = array(
      $supplier_name,
      $contact_no,  
      $address
      
  );
  
  // print_r($array);
  
     if($supplier->add_supplier($array)){
      echo '
        <script>
        Swal.fire({
          title: "",
          text: "New Supplier Added",
          type: "success",
        
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Ok"
        }).then((result) => {
          if (result.value) {
            window.location.href="supplier.php";
          }
        })
    </script>
    ';  
     }else{
       echo 'asdasd';
     }
  
  }


  

  if(isset($_POST['edit_submit'])){


    $supplier_name =  $conn->real_escape_string($_POST['supplier_name']);
    $contact_no =  $conn->real_escape_string($_POST['contact_no']);
    $address =  $conn->real_escape_string($_POST['address']);
    $id =  $conn->real_escape_string($_POST['id']);
    $array = array(
      $supplier_name,
      $contact_no,  
      $address,
      $id
      
  );
  

  
     if($supplier->modify_supplier($array)){
        echo '
        <script>
        Swal.fire({
          title: "Good Job!",
          text: "Supplier Information Modified",
          type: "success",
        
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Ok"
        }).then((result) => {
          if (result.value) {
            window.location.href="supplier.php";
          }
        })
    </script>
    '; 
     }else{
       echo 'asdasd';
     }
  
  }

  if(isset($_POST['delete_submit'])){


  
    $id =  $conn->real_escape_string($_POST['id']);
    
  
    $statusPost =  $conn->real_escape_string($_POST['status']);


    if($statusPost){
      $status = false;
    }else{
      $status = true;
    }
   

      $array = array(
      $status,
      $id
      
  );
  echo $statusPost;
  print_r($array);
  
     if($supplier->remove_supplier($array)){
        echo '
        <script>
        Swal.fire({
          title: "Good Job!",
          text: "Supplier Status Changed",
          type: "success",
        
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Ok"
        }).then((result) => {
          if (result.value) {
             window.location.href="supplier.php";
          }
        })
    </script>
    '; 
     }else{
       echo 'asdasd';
     }
    
  }

  
?>