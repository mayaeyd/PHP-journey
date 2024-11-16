<?php 

if(!isset($_GET['array'])){
    http_response_code(400);
    echo json_encode(['error'=>'Array is not set in the params']);
    exit;
}

$array = json_decode($_GET['array'], true);

if(!is_array($array)){
    http_response_code(400);
    echo json_encode(['error'=>'Array sent is not of type array']);
    exit;
}

function merge_sort($array){
    if(count($array)<=1){
        return $array;
    }

    $middle = floor(count($array)/2);//2

    //2,5,3,1,6
    $left = array_slice($array, 0, $middle); //2,5
    $right = array_slice($array,$middle);//3,1,6

    $left = merge_sort($left);
    $right = merge_sort($right);

    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $i = 0;
    $j = 0;

    while($i<count($left) && $j<count($right)){
        if($left[$i]<=$right[$j]){
            $result[] = $left[$i];
            $i++;
        }else{
            $result[]=$right[$j];
            $j++;
        }
    }

    //add remaining numbers from left array
    while($i<count($left)){
        $result[]=$left[$i];
        $i++;
    }

    //add remaining numbers from rigth array
    while($j<count($right)){
        $result[]=$right[$j];
        $j++;
    }

    return $result;
}

//sort the input array using merge sort
$sorted_array = merge_sort($array);

http_response_code(200);
echo json_encode(['sortedArray' => $sorted_array]);

?>
