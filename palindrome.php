<?php 

if(!isset($_GET['string'])){
    http_response_code(400);
    echo json_encode(['error'=>'String is not sent']);
    exit;
}
$string = $_GET['string'];
if(!is_string($string)){
    http_response_code(400);
    echo json_encode(['error'=>'string param is not of type string']);
    exit;
}

$clean_string = '';
for($i=0;i<strlen($clean_string); i++){
    if(($sring[i]>='A' && $string[i]<='Z') || ($sring[i]>='a' && $string[i]<='z')){
        $clean_string .= strtolower($string[i]);
    }
}

?>