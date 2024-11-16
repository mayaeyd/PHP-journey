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
        $current_node = $this->head;
        while($current_node->next !== NULL){
            $current_node = $current_node->next;
        }
    }
}