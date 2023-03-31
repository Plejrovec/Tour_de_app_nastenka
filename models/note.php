<?php
class Note
{

    private $conn;
    private $table = "notes";

    public $id;
    public $text;
    public $signature;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Posts
    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table;
        // prepared statement
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // get single post
    public function read_single()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        // prepared statement
        $stmt = $this->conn->prepare($query);

        //Bind id
        $stmt->bindParam(':id',$this->id);
 
        // Execute query
        $stmt->execute();

        return $stmt;

    }

    //create Record
    public function create() {
        //Create query 
        $query = 'INSERT INTO ' . 
        $this->table. '
        SET 
        text =:text,
        signature=:signature
        ';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->text = htmlspecialchars($this->text);
        $this->signature = htmlspecialchars($this->signature);
        

        // Bind data

        $stmt->bindParam(':text',$this->text);
        $stmt->bindParam(':signature',$this->signature);

        //Execute query
        if($stmt->execute()) {
            return true;
        }else {
            //Print error
            printf("Error: %s.\n, $stmt->error");

            return false;
        }
    }
    //update Record
    public function update() {
        //Create query 
        $query = 'UPDATE ' . 
        $this->table. '
        SET 
        text =:text,
        signature=:signature';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->text = htmlspecialchars($this->text);
        $this->signature = htmlspecialchars($this->signature);
        

        // Bind data

        $stmt->bindParam(':text',$this->text);
        $stmt->bindParam(':signature',$this->signature);

        //Execute query
        if($stmt->execute()) {
            return true;
        }else {
            //Print error
            printf("Error: %s.\n, $stmt->error");

            return false;
        }
    }
    //Delete Record
    public function delete() {
        //Creater query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);
        
        // Clean data
        $this->id = htmlspecialchars($this->id);

        // Bind data
        $stmt->bindParam(':id',$this->id);

        //Execute query
        if($stmt->execute()) {
            return true;
        }else {
            //Print error
            printf("Error: %s.\n, $stmt->error");

            return false;
        }
    }
}
