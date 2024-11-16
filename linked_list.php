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
        if($this->head = NULL){
            $this->head = $new_node;
        }else{
            $current_node = $this->head;
            while($current_node->next !== NULL){
                $current_node = $current_node->next;
            }
            $current_node= $new_node;
        }
    }

    public function traverse(){
        $vowel_count = 0;
        $current_node = $this->head;
        while($current_node->next !== NULL){
            if(is_string($current_node->data)){
                $string=strtolower($current_node->data)
                for($i=0; $i<strlen($string); $i++){
                    $char = $string[$i];
                    if($char = 'a' || $char = 'e' || $char = 'i' || $char = 'o' || $char = 'u'){
                        $vowel_count++;
                    }
                }
            }
            $current_node = $current_node->next;
        }
    }
}