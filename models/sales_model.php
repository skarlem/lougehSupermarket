<?php

class Sales{
    private $connnection;


    public function __construct($conn){
        
        $this->connnection = $conn;
        
    }


    public function getSales(){
        $sql = "SELECT * FROM sales_record order by id desc";
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


    function record_sales($sales_detail){
     
        $stmt = $this->connnection->prepare('INSERT INTO sales_record( product_name, quantity, price_per_unit, customer_name, customer_address, customer_contact, total_price) 
        VALUES ( ?, ?, ?, ?, ?, ?, ? )');


        $stmt->bind_param("siisssi", $sales_detail[0], $sales_detail[1], $sales_detail[2], $sales_detail[3], $sales_detail[4],$sales_detail[5],$sales_detail[6]);
           
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