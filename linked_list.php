<?php

class Node{
    public $data = NULL;
    public $next = NULL;

    public function __construct($data = NULL) {
            $this->data = $data;
        }

}

class LinkedList{
    private $head = NULL;

    public function insert($data){
        $new_node = new Node($data);
        if($this->head === NULL){
            $this->head = $new_node;
        }else{
            $current_node = $this->head;
            while($current_node->next !== NULL){
                $current_node = $current_node->next;
            }
            $current_node->next= $new_node;
        }
    }

    public function traverse(){
        $result = [];
        $current_node = $this->head;

        while($current_node !== NULL){

            //check if string
            if(is_string($current_node->data)){
                $string=strtolower($current_node->data);
                $vowel_count = 0;
                for($i=0; $i<strlen($string); $i++){
                    $char = $string[$i];

                    //count vowels
                    if($char == 'a' || $char == 'e' || $char == 'i' || $char == 'o' || $char == 'u'){
                        $vowel_count++;
                    }
                    if($vowel_count==2){
                        $result[] =$string;
                        break;
                    }
                }
            }else{
                echo json_encode(['error'=>"Node's data is not a valid string"]);
            }
            $current_node = $current_node->next;
        }
        return json_encode(['Nodes with two vowels '=>$result]);
    }
}

$list = new LinkedList();
$list->insert("tree");
$list->insert("apple");
$list->insert("dad");
$list->insert("9dw");
$list->insert("haudwdnceio");
$list->insert('as rte');


echo $list->traverse();

?>