<?php 

if(!isset($_GET['array'])){
    http_response_code(400);
    echo json_encode(['error'=>'Array is not set in the params']);
}



?>
