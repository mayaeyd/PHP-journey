class Node{
 public $data;
 public $next;

 function set_data($data) {
    $this->data = $data;
  }
 function get_name() {
    return $this->data;
  }

}

class LinkedList{
    private $head = NULL;
    public function insert($data){
        $new_node = new Node($data);
        if($this->head = NULL){
            $this->head = $new_node;
        }else{
            
        }
    }
}