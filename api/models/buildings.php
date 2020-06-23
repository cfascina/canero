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
      $this->status = htmlspecialchars(strip_tags($this->status));
      $this->default = htmlspecialchars(strip_tags($this->default));

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

    // TO DO
    public function updateBuilding()
    {
      $sqlQuery = "UPDATE
                          " . $this->table . "
                      SET
                          name = :name, 
                          email = :email, 
                          age = :age, 
                          designation = :designation, 
                          created = :created
                      WHERE 
                          id = :id";

      $stmt = $this->conn->prepare($sqlQuery);

      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->age = htmlspecialchars(strip_tags($this->age));
      $this->designation = htmlspecialchars(strip_tags($this->designation));
      $this->created = htmlspecialchars(strip_tags($this->created));
      $this->id = htmlspecialchars(strip_tags($this->id));

      // bind data
      $stmt->bindParam(":name", $this->name);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":age", $this->age);
      $stmt->bindParam(":designation", $this->designation);
      $stmt->bindParam(":created", $this->created);
      $stmt->bindParam(":id", $this->id);

      if ($stmt->execute()) {
        return true;
      }
      return false;
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