<?php
  
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
  include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/models/buildings.php';

  $database = new Database();
  $conn = $database->getConnection();

  $building = new Building($conn);
  $data = json_decode(file_get_contents("php://input"));
  
  $building->id = $data->id;
  $building->name = $data->name;
  $building->zipCode = $data->zipCode;
  $building->address = $data->address;
  $building->number = $data->number;
  $building->complement = $data->complement;
  $building->neighborhood = $data->neighborhood;
  $building->city = $data->city;
  $building->state = $data->state;
  $building->status = $data->status;
  $building->default = $data->default;

  if($building->updateBuilding()) {
    echo json_encode(
      array(
        "success" => array(
          "code" => 200, 
          "message" => "Building updated successfully."
        )
      )
    );
  }
  else {
    http_response_code(404);
    
    echo json_encode(
      array(
        "error" => array(
          "code" => 404, 
          "message" => "Building could not be updated."
        )
      )
    );
  }

?>