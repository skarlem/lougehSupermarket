<?php
 include('models/products_model.php');

 include('models/sales_model.php');


 $product = new Products($conn);


 $sales = new Sales($conn);

 if(isset($_POST['add_product'])){

      
    $unit_price =  $conn->real_escape_string($_POST['unit_price']);
    $product_name =  $conn->real_escape_string($_POST['product_name']);
    $quantity =  $conn->real_escape_string($_POST['quantity']);
    $total_price =  $conn->real_escape_string($_POST['total_price']);
    $customer_name =  $conn->real_escape_string($_POST['customer_name']);
    $customer_contact =  $conn->real_escape_string($_POST['customer_contact']);
    $customer_address =  $conn->real_escape_string($_POST['customer_address']);


    $array = array(
        $product_name,
        $quantity,
        $unit_price,
        $customer_name,
        $customer_address,
        $customer_contact,
        $total_price,  
    );



    print_r($array);


    if($sales->record_sales($array)){
        $_POST = array();
     
         echo 'asdasdasdasdasdasd';
         echo "<script>location.href='pos.php';</script>";  
       }else{
         echo 'asdasd';
       }
 }


?>