<?php

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/models/buildings.php';

  $database = new Database();
  $conn = $database->getConnection();

  $building = new Building($conn);
  $result = $building->getBuildings();
  $resultCount = $result->rowCount();

  if($resultCount > 0) {
    $buildinsgArr = array();
    $buildinsgArr["body"] = array();
    $buildinsgArr["resultCount"] = $resultCount;

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      
      $rowData = array(
        "id" => $id,
        "name" => $name,
        "zipCode" => $zip_code,
        "address" => $address,
        "number" => $number,
        "complement" => $complement,
        "neighborhood" => $neighborhood,
        "city" => $city,
        "state" => $state,
        "status" => $status,
        "default" => $default,
        "createdAt" => $created_at,
        "updatedAt" => $updated_at
      );
      
      array_push($buildinsgArr["body"], $rowData);
    }
    echo json_encode($buildinsgArr);
  }
  else {
    http_response_code(404);
    
    echo json_encode(
      array(
        "error" => array(
          "code" => 404, 
          "message" => "No records found."
        )
      )
    );
  }

?>