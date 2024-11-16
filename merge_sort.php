<?php 

if(!isset($_GET['array'])){
    http_response_code(400);
    echo json_encode(['error'=>'Array is not set in the params']);
    exit;
}

$array = $_GET['array'];
if(!is_array($array)){
    http_response_code(400);
    echo json_encode(['error'=>'Array sent is not of type array']);
    exit;
}

function merge_sort($array){
    if(count($array)<=1){
        return $array;
    }

    $middle = floor(count($array)/2);

    $left = array_slice($array, 0, $middle);
    $right = array_slice($array,$middle);

    $left = merge_sort($left);
    $right = merge_sort($right);
}

?>
