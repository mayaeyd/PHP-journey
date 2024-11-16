<?php
// Creates a new user from a class having:
// > 2 static methods: 
    //check_password validating the this->password to be at least 12 characters having at least 1 uppercase, 1 lowercase and 1 special character
    //validate_email to validate the the email format.
// > 1 method: copy_with taking optional parameters and returns a NEW user instance (copy) with the updated values that were passed.

class User{
    public $email = NULL;
    public $password = NULL;

    public function __construct($email = NULL, $password = NULL) {
        $this->email = $email;
        $this->password = $password;
    }

    public static function check_password($password){
        if(!is_string($password)){
            http_response_code(400);
            echo json_encode(['error'=>'Password is not a valid string']);
            exit;
        }else{
            if(strlen($password)<12){
                http_response_code(400);
                echo json_encode(['error'=>'Password has less than 12 characters']);
                exit;
            }else{
                $has_UpperCase=false;
                $has_LowerCase=false;
                $has_SpecialChar=preg_match('/[\'^!£$%&*()}{@#~?><>,|=_+¬-]/', $password);
                for($i=0;$i<strlen($password);$i++){
                    if(ctype_upper($password[$i])){
                        $has_UpperCase=true;
                    }

                    if(ctype_lower($password[$i])){
                        $has_LowerCase=true;
                    }
                }

                if($has_LowerCase && $has_UpperCase && $has_SpecialChar){
                    http_response_code(200);
                    echo json_encode(['success'=>'Password is valid']);
                }
                else{
                    http_response_code(400);
                    echo json_encode(['error'=>'Password must include at least one lowercase, uppercase and special character']);
                }
            }
        }
    }

    public static function validate_email($email){
        if(!is_string($email)){
            http_response_code(400);
            echo json_encode(['error'=>'Email is not a valid string']);
        }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid email format']);
            } else {
                http_response_code(200);
                echo json_encode(['success' => 'Email is valid']);
            }
        }
    }

    public function copy_with($new_email = NULL, $new_password = NULL) {
        //check if the new values are null, then keep the old ones
        $new_email = $new_email ?? $this->email;
        $new_password = $new_password ?? $this->password;

        return new User($new_email, $new_password);
    }
}

$user = new User("test@example.com", "Password123!");

// Updated email
$new_user_email = $user->copy_with("newemail@example.com");

// Updated password
$new_user_password = $user->copy_with(null, "NewPassword123!");

// Updated email and password
$new_user_both = $user->copy_with("updated@example.com", "UpdatedPassword123!");

if (isset($_GET['email']) && isset($_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];

    $user = new User($email, $password);

    $emailValidationResult = $user::validate_email($email);
    echo json_encode($emailValidationResult);
    
    // Test password validation
    $passwordValidationResult = $user::check_password($password);
    echo json_encode($passwordValidationResult);
}


?>