<?php
// Creates a new user from a class having:
// > 2 static methods: 
    //check_password validating the password to be at least 12 characters having at least 1 uppercase, 1 lowercase and 1 special character
    //validate_email to validate the the email format.
// > 1 method: copy_with taking optional parameters and returns a NEW user instance (copy) with the updated values that were passed.

class User{
    public $email = NULL;
    public $password = NULL;

    public function __construct($email = NULL) {
        $this->email = $email;
    }

    public function __construct($password = NULL) {
        $this->password = $password;
    }

    public function check_password(){
        if(!is_string($password)){
            http_response_code(400);
            echo json_encode(['error'=>'password is not a valid string']);
        }else{
            if()
        }
    }
}

?>