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
for($i=0;$i<strlen($string); $i++){
    $char=$string[$i];
    if(($char>='A' && $char<='Z') || ($char>='a' && $char<='z')){
        $clean_string .= strtolower($char);
    }
}

//check if palindrome
$is_palindrome=true;
for($i=0; $i<strlen($clean_string)/2; $i++){
    if($clean_string[$i]!== $clean_string[strlen($clean_string)-$i-1]){
        $is_palindrome =false;
        echo json_encode(['is Palindrome'=>$is_palindrome]);
        exit;
    }
}

http_response_code(200);
echo json_encode(['is Palindrome'=>$is_palindrome]);

?>