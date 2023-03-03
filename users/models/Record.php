<?php
class Record
{
    //DB stuff
    private $conn;
    private $table = 'record';

    //Post Properties
    public $id;
    public $date;
    public $time_spent;
    public $programming_language;
    public $rating;
    public $description;
    public $user_id;

    //constructor with DB

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Posts
    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id ORDER BY id DESC';
        // prepared statement
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id',$this->user_id);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // get single post
    public function read_single()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id and user_id = :user_id';
        // prepared statement
        $stmt = $this->conn->prepare($query);

        //Bind id
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':user_id',$this->user_id);
 
        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // set propertiers
        $this->date = $row['date'];
        $this->time_spent = $row['time_spent'];
        $this->programming_language = $row['programming_language'];
        $this->rating = $row['rating'];
        $this->description = $row['description'];

    }

    //create Record
    public function create() {
        //Create query 
        $query = 'INSERT INTO ' . 
        $this->table. '
        SET 
        date = :date, 
        time_spent = :time_spent, 
        language = :programming_language, 
        rating = :rating, 
        description = :description, 
        user_id = :user_id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->date = htmlspecialchars($this->date);
        $this->time_spent = htmlspecialchars($this->time_spent);
        $this->programming_language = htmlspecialchars($this->programming_language);
        $this->rating = htmlspecialchars($this->rating);
        $this->description = htmlspecialchars($this->description);
        $this->user_id = htmlspecialchars($this->user_id);

        // Bind data

        $stmt->bindParam(':date',$this->date);
        $stmt->bindParam(':time_spent',$this->time_spent);
        $stmt->bindParam(':programming_language',$this->programming_language);
        $stmt->bindParam(':rating',$this->rating);
        $stmt->bindParam(':description',$this->description);
        $stmt->bindParam(':user_id',$this->user_id);

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
        date = :date, 
        time_spent = :time_spent, 
        language = :programming_language, 
        rating = :rating, 
        description = :description
         WHERE id = :id and user_id = :user_id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->date = htmlspecialchars($this->date);
        $this->time_spent = htmlspecialchars($this->time_spent);
        $this->programming_language = htmlspecialchars($this->programming_language);
        $this->rating = htmlspecialchars($this->rating);
        $this->description = htmlspecialchars($this->description);
        $this->user_id = htmlspecialchars($this->user_id);
        $this->id = htmlspecialchars($this->id);

        // Bind data

        $stmt->bindParam(':date',$this->date);
        $stmt->bindParam(':time_spent',$this->time_spent);
        $stmt->bindParam(':programming_language',$this->programming_language);
        $stmt->bindParam(':rating',$this->rating);
        $stmt->bindParam(':description',$this->description);
        $stmt->bindParam(':user_id',$this->user_id);
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
    //Delete Record
    public function delete() {
        //Creater query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id and user_id = :user_id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);
        
        // Clean data
        $this->id = htmlspecialchars($this->id);
        $this->user_id = htmlspecialchars($this->user_id);

        // Bind data
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':user_id',$this->user_id);

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
