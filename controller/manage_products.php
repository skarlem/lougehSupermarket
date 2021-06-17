<?php
 include('models/supplier_model.php');
 include('models/products_model.php');
 $supplierInstance = new Supplier($conn);
 $supplier = $supplierInstance;

 $product = new Products($conn);

 if(isset($_POST['add_product'])){
 

    $barcode = $_POST['barcodes'];
    $product_desc =  $_POST['product_desc'];
    $cost_per_unit =  $_POST['cost_per_unit'];
    $unit_price =  $_POST['unit_price'];
    $supplier =  $_POST['supplier_id_code'];
    $quantity =  $_POST['quantity'];

  

    $array = array(
      $barcode,
      $product_desc,
      $quantity,  
      $cost_per_unit,
      $supplier,
      $unit_price
  );
  
    if($product->addProduct($array)){
      $_POST = array();
   
       echo 'asdasdasdasdasdasd';
      echo "<script>location.href='products.php';</script>";  
     }else{
       echo 'asdasd';
     }
  
  }


  if(isset($_POST['edit_submit'])){


    $barcode =  $conn->real_escape_string($_POST['barcode']);
    
    $product_desc =  $conn->real_escape_string($_POST['product_desc']);
    $cost_per_unit =  $conn->real_escape_string($_POST['cost_per_unit']);
    $quantity =  $conn->real_escape_string($_POST['quantity']);
    $id =  $conn->real_escape_string($_POST['id']);
    $unit_price =  $_POST['unit_price'];
    $array = array(
      $barcode,
      $product_desc,
      $quantity,  
      $cost_per_unit,
      $unit_price,
      $id
  );
  
  print_r($array);
  
     if($product->update_product($array)){
      echo "<script>location.href='products.php';</script>";  
     }else{
       echo 'asdasd';
     }
  
  }

?>