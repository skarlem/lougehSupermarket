<?php

class Products{
    public $productsDetails;
    private $connnection;

    public function __construct($conn){
        
        $this->connnection = $conn;
        
    }
    public function getProducts(){
        $sql = "SELECT * FROM supply order by id desc";
        $result = $this->connnection->query($sql);

        $supplies =array();
        if (!$result) { 
            echo "An error occurred.\n".mysqli_error($this->connnection);
            exit;
        }
        else{
            while($row = mysqli_fetch_array($result)){
                $supplies[] = $row;
            }
        }
    //   /  mysqli_close($this->connnection);       
        return $supplies;
    }


    function addProduct($product_details){
        
        
        $stmt = $this->connnection->prepare('INSERT INTO supply( barcode, product_desc, quantity, cost_per_unit, supplier_id_code, unit_price) 
        VALUES ( ?, ?, ?, ?, ?, ?)');


        $stmt->bind_param("isiisi", $product_details[0], $product_details[1], $product_details[2], $product_details[3], $product_details[4],$product_details[5]);
           
        if($stmt->execute()){
          
            return true;
        }else{
            return false;
        }

                //         $sql = "INSERT INTO `supply`( `barcode`, `product_desc`, `quantity`, `cost_per_unit`, `supplier_id_code`) 
                //         VALUES ($product_details[0], '$product_details[1]', $product_details[2], $product_details[3], '$product_details[4]')";

                // if ($this->connnection->query($sql) === TRUE) {
                // echo "New record created successfully";
                // } else {
                // echo "Error: " . $sql . "<br>" . $this->connnection->error;
                // }
    }

    function update_product($array){

        $stmt = $this->connnection->prepare("UPDATE supply SET  barcode=?, product_desc=?, quantity=?, cost_per_unit=?,  unit_price=? where id = ?");

        $stmt->bind_param('isiiii',  $array[0],$array[1],$array[2],$array[3],$array[4],$array[5]);


        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    function update_quantity($array){

        $stmt = $this->connnection->prepare("UPDATE supply SET quantity= quantity - ? where id = ?");

        $stmt->bind_param('ii',  $array[0],$array[1]);


        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }



}


// $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
// $stmt->bind_param("sss", $firstname, $lastname, $email);


?>