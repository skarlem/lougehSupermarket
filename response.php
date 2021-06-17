<?php
include 'config.php';






if(isset($_POST['barcode_data'])){
    $barcode= $_POST['barcode_data'];
    

    // $sql = "SELECT barcode FROM supplies WHERE barcode=?"; // SQL with parameters
    // $stmt = $conn->prepare($sql); 
    // $stmt->bind_param("s", $barcode);
    // $stmt->execute();
    // $result = $stmt->get_result(); // get the mysqli result
    // $barcodes = $result->fetch_assoc();



    $sql = "SELECT barcode FROM supply WHERE barcode=$barcode";
        $result = $conn->query($sql);

        $barcodes =array();
        if (!$result) { 
            echo "An error occurred.\n".mysqli_error($conn);
            exit;
        }
        else{
            while($row = mysqli_fetch_array($result)){
                $barcodes[] = $row;
            }
        }
    //   /  mysqli_close($this->connnection);       
        

   
    if(!empty($barcodes)){
        echo 'asdasd';
    }else{
       
    }


     // print_r($result);
  }



  
if(isset($_POST['price_data'])){
    $id= $_POST['price_data'];
    

    // $sql = "SELECT barcode FROM supplies WHERE barcode=?"; // SQL with parameters
    // $stmt = $conn->prepare($sql); 
    // $stmt->bind_param("s", $barcode);
    // $stmt->execute();
    // $result = $stmt->get_result(); // get the mysqli result
    // $barcodes = $result->fetch_assoc();



    $sql = "SELECT unit_price FROM supply WHERE id=$id";
        $result = $conn->query($sql);

        $id_data =array();
        if (!$result) { 
            echo "An error occurred.\n".mysqli_error($conn);
            exit;
        }
        else{
            while($row = mysqli_fetch_array($result)){
                $id_data[] = $row;
            }
        }
    //   /  mysqli_close($this->connnection);       
        

   
    if(!empty($id_data)){
        print_r( $id_data[0][0]);
    }else{
       
    }


     // print_r($result);
  }




  if(isset($_POST['quantity_data'])){
    $id= $_POST['quantity_data'];
    

    // $sql = "SELECT barcode FROM supplies WHERE barcode=?"; // SQL with parameters
    // $stmt = $conn->prepare($sql); 
    // $stmt->bind_param("s", $barcode);
    // $stmt->execute();
    // $result = $stmt->get_result(); // get the mysqli result
    // $barcodes = $result->fetch_assoc();



    $sql = "SELECT quantity FROM supply WHERE id=$id";
        $result = $conn->query($sql);

        $id_data =array();
        if (!$result) { 
            echo "An error occurred.\n".mysqli_error($conn);
            exit;
        }
        else{
            while($row = mysqli_fetch_array($result)){
                $id_data[] = $row;
            }
        }
    //   /  mysqli_close($this->connnection);       
        

   
    if(!empty($id_data)){
        print_r( $id_data[0][0]);
    }else{
       
    }


     // print_r($result);
  }


?>