<?php

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/models/buildings.php';

  $database = new Database();
  $conn = $database->getConnection();

  $building = new Building($conn);
  $building->id = isset($_GET['id']) ? $_GET['id'] : die();
  $result = $building->getBuilding();

  if($result->rowCount() === 1) {
    $buildingData = $result->fetch(PDO::FETCH_ASSOC);
    echo json_encode($buildingData);
  }    
  else {
    http_response_code(404);
    
    echo json_encode(
      array(
        "error" => array(
          "code" => 404, 
          "message" => "No buildings found."
        )
      )
    );
  }

?>