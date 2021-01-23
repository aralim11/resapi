<?php 

class Order
{
    private $conn;
    private $table = 'agami_order';

    public $id;
    public $order_id;
    public $order_description;
    public $created_at;


    // Constructor with DB Connection
    public function __construct($db)
    {
        return $this->conn = $db;
    }

    // Fetch Data From Database
    public function fetch_data()
    {
        $sql = "SELECT * FROM `agami_order`";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result;
    }

    // Fetch single order from database by id
    public function singleOrder()
    {
        $sql = "SELECT * FROM `agami_order` WHERE `id`= ? ";
        $result = $this->conn->prepare($sql);
        $result->bindParam(1, $this->id);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->order_id = $row['order_id'];
        $this->order_description = $row['order_description'];
        $this->created_at = $row['created_at'];
        
    }

    // Create Order Into Database
    public function create()
    {
        $sql = 'INSERT INTO ' . $this->table . ' SET order_id = :order_id, order_description = :order_description, created_at = :created_at';

        // Prepare statement
        $result = $this->conn->prepare($sql);

        // Clean data
        $this->order_id = htmlspecialchars(strip_tags($this->order_id));
        $this->order_description = htmlspecialchars(strip_tags($this->order_description));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        // Bind data
        $result->bindParam(':order_id', $this->order_id);
        $result->bindParam(':order_description', $this->order_description);
        $result->bindParam(':created_at', $this->created_at);

        if ($result->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $result->error);

        return false;
    }

    // Update Data
    public function update()
    {
        $sql = 'UPDATE ' . $this->table . ' SET order_id = :order_id, order_description = :order_description WHERE id = :id';

        // Prepare statement
        $result = $this->conn->prepare($sql);

        // Clean data
        $this->order_id = htmlspecialchars(strip_tags($this->order_id));
        $this->order_description = htmlspecialchars(strip_tags($this->order_description));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $result->bindParam(':order_id', $this->order_id);
        $result->bindParam(':order_description', $this->order_description);
        $result->bindParam(':id', $this->id);

        if ($result->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $result->error);

        return false;
    }

    // Delete Order
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }


}




?>