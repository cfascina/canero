<?php

  class Building
  {
    // Connection and Table
    private $conn;
    private $table = "buildings";

    // Columns
    public $id;
    public $name;
    public $zipCode;
    public $address;
    public $number;
    public $complement;
    public $neighborhood;
    public $city;
    public $state;
    public $status;
    public $default;
    public $createdAt;
    public $updatedAt;

    // Database Connection
    public function __construct($conn)
    {
      $this->conn = $conn;
    }

    // TO DO
    public function getBuilding()
    {
      $sqlQuery = "SELECT
                          id, 
                          name, 
                          email, 
                          age, 
                          designation, 
                          created
                        FROM
                          " . $this->table . "
                      WHERE 
                        id = ?
                      LIMIT 0,1";

      $stmt = $this->conn->prepare($sqlQuery);

      $stmt->bindParam(1, $this->id);

      $stmt->execute();

      $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->name = $dataRow['name'];
      $this->email = $dataRow['email'];
      $this->age = $dataRow['age'];
      $this->designation = $dataRow['designation'];
      $this->created = $dataRow['created'];
    }

    public function getBuildings()
    {
      $sqlQuery = "
        SELECT  *
        FROM " . $this->table . "
        ORDER BY created_at DESC";

      $result = $this->conn->prepare($sqlQuery);
      $result->execute();
      return $result;
    }

    public function addBuilding()
    {
      $sqlQuery = "
        INSERT INTO " . $this->table . " VALUES (
          NULL,
          :name,
          :zipCode,
          :address,
          :number,
          :complement,
          :neighborhood,
          :city,
          :state,
          :status,
          :default,
          NOW(),
          NULL)";

      $result = $this->conn->prepare($sqlQuery);

      // Sanitize
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->zipCode = htmlspecialchars(strip_tags($this->zipCode));
      $this->address = htmlspecialchars(strip_tags($this->address));
      $this->number = htmlspecialchars(strip_tags($this->number));
      $this->complement = htmlspecialchars(strip_tags($this->complement));
      $this->neighborhood = htmlspecialchars(strip_tags($this->neighborhood));
      $this->city = htmlspecialchars(strip_tags($this->city));
      $this->state = htmlspecialchars(strip_tags($this->state));

      // Bind Data
      $result->bindParam(":name", $this->name);
      $result->bindParam(":zipCode", $this->zipCode);
      $result->bindParam(":address", $this->address);
      $result->bindParam(":number", $this->number);
      $result->bindParam(":complement", $this->complement);
      $result->bindParam(":neighborhood", $this->neighborhood);
      $result->bindParam(":city", $this->city);
      $result->bindParam(":state", $this->state);
      $result->bindParam(":status", $this->status);
      $result->bindParam(":default", $this->default);

      return $result->execute() ? true : false;
    }
    
    public function updateBuilding()
    {
      $sqlQuery = "
        UPDATE " . $this->table . " AS B SET
          B.name = :name,
          B.zip_code = :zipCode,
          B.address = :address,
          B.number = :number,
          B.complement = :complement,
          B.neighborhood = :neighborhood,
          B.city = :city,
          B.state = :state,
          B.status = :status,
          B.default = :default,
          B.updated_at = NOW()
        WHERE B.id = :id";
          
      $result = $this->conn->prepare($sqlQuery);

      // Sanitize
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->zipCode = htmlspecialchars(strip_tags($this->zipCode));
      $this->address = htmlspecialchars(strip_tags($this->address));
      $this->number = htmlspecialchars(strip_tags($this->number));
      $this->complement = htmlspecialchars(strip_tags($this->complement));
      $this->neighborhood = htmlspecialchars(strip_tags($this->neighborhood));
      $this->city = htmlspecialchars(strip_tags($this->city));
      $this->state = htmlspecialchars(strip_tags($this->state));

      // Bind Data
      $result->bindParam(":id", $this->id);
      $result->bindParam(":name", $this->name);
      $result->bindParam(":zipCode", $this->zipCode);
      $result->bindParam(":address", $this->address);
      $result->bindParam(":number", $this->number);
      $result->bindParam(":complement", $this->complement);
      $result->bindParam(":neighborhood", $this->neighborhood);
      $result->bindParam(":city", $this->city);
      $result->bindParam(":state", $this->state);
      $result->bindParam(":status", $this->status);
      $result->bindParam(":default", $this->status);

      return $result->execute() ? true : false;
    }

    // TO DO
    function deleteBuilding()
    {
      $sqlQuery = "DELETE FROM " . $this->table . " WHERE id = ?";
      $stmt = $this->conn->prepare($sqlQuery);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(1, $this->id);

      if ($stmt->execute()) {
        return true;
      }
      return false;
    }
  }

?>