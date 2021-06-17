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
  
  print_r($array);
  
     if($supplier->add_supplier($array)){
      echo "<script>location.href='supplier.php';</script>";  
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
      // echo "<script>location.href='supplier.php';</script>";  
     }else{
       echo 'asdasd';
     }
  
  }
?>