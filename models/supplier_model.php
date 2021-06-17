<?php

class Supplier{
    private $connnection;
    
    


    public function __construct($conn){
        
        $this->connnection = $conn;
        
    }
        
       
    function get_suppliers(){
        $sql = "SELECT * FROM supplier order by id desc";
        $result = $this->connnection->query($sql);


        $suppliers =array();
        if (!$result) {
            echo "An error occurred.\n".mysqli_error($this->connnection);
            exit;
        }
        else{
            while($row = mysqli_fetch_array($result)){
                $suppliers[] = $row;
            }
        }
    //   /  mysqli_close($this->connnection);       
        return $suppliers;


    }

    function add_supplier($supplier_info){
       
        $stmt = $this->connnection->prepare('INSERT INTO `supplier`(`supplier_name`, `contact_no`, `address`) 
        VALUES ( ?, ?, ?)');


        $stmt->bind_param("sss",  $supplier_info[0], $supplier_info[1], $supplier_info[2]);
           
        if($stmt->execute()){
          
            return true;
        }else{
            return false;
        }
    }
    function modify_supplier($array){
        $stmt = $this->connnection->prepare("UPDATE supplier SET  `supplier_name`=?, `contact_no`=?, `address`=? where id = ?");

        $stmt->bind_param('sssi',  $array[0],$array[1],$array[2],$array[3]);


        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }




    function remove_supplier($input){
        $stmt = $this->connnection->prepare("DELETE FROM `supplier` WHERE id = ?");

        $stmt->bind_param('i',  $input);
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