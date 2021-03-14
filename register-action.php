<?php 
require 'users.php';
    if(isset($_POST['action']) && $_POST['action'] == 'register') {
        $users = validateRegForm();
        
        $objUser = new Users();
        $objUser->setUsername($users['username']);
        $objUser->setFirstname(NULL);
        $objUser->setLastname(NULL);
        $objUser->setEmail($users['email']);
        $objUser->setPassword($users['password']);
        $objUser->setWebsite(NULL);
        $objUser->setPhone(NULL);
        $objUser->setAge(NULL);
        $objUser->setDob(NULL);

        $userData = $objUser->getUserByEmail();

        if($userData['email'] == $users['email']){
            echo json_encode(["status" => 0, "msg" => "Email already registered."]);
            exit;
        }

        if($objUser->save()) {
            echo json_encode(["status" => $userData['email'], "msg" => "Registration Successful."]);
        } else {
            echo json_encode(["status" => 0, "msg" => "Registration failed."]);
        }

    }

    if(isset($_POST['action']) && $_POST['action'] == 'login') {
    $users = validateLoginForm();
    
    $objUser = new Users();
    $objUser->setEmail($users['email']);
    $objUser->setPassword($users['password']);
    $userData = $objUser->getUserByEmail();

    if(is_array($userData) && count($userData) > 0) {
        if($userData['password'] == $objUser->getPassword()) {
            echo json_encode(["status" => $userData['email'], "msg" => "Login Success."]);
        } else {
            echo json_encode(["status" => 0, "msg" => "Email or Password is wrong."]);
        }
    } else {
        echo json_encode(["status" => 0, "msg" => "Email or Password is wrong."]);
    }

    }

    function validateLoginForm() {
        $users['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if(false == $users['email']) {
            echo json_encode(["status" => 0, "msg" => "Enter valid Email"]);
            exit;
        }

        $users['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if(false == $users['password'] ) {
            echo json_encode(["status" => 0, "msg" => "Enter valid Password"]);
            exit;
        }

        return $users;
    }

    function validateRegForm() {
    $users['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        if(false == $users['username']) {
            echo json_encode(["status" => 0, "msg" => "Enter valid username"]);
            exit;
        }

        $users['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if(false == $users['email']) {
            echo json_encode(["status" => 0, "msg" => "Enter valid email"]);
            exit;
        }

        $users['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if(false == $users['password'] ) {
            echo json_encode(["status" => 0, "msg" => "Enter valid Password"]);
            exit;
        }
        return $users;
    }

    if(isset($_POST['action']) && $_POST['action'] == 'update') {
        $users = validateUptForm();
        
        $objUser = new Users();
        $objUser->setLastname($users['lastname']);
        $objUser->setWebsite($users['url']);
        $objUser->setPhone($users['phone']);
        $objUser->setAge($users['age']);
        $objUser->setDob($users['dob']);

        $userData = $objUser->getUserByEmail();

        if($userData['email'] != $users['email']){
            echo json_encode(["status" => 0, "msg" => "Email not valid."]);
            exit;
        }

        if($objUser->update($users)) {
            echo json_encode(["status" => 1, "msg" => "Update Successful."]);
        } else {
            echo json_encode(["status" => 0, "msg" => "Update failed."]);
        }

    }

    function validateUptForm() {
            $users['firstname'] = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
            if(false == $users['firstname']) {
                echo json_encode(["status" => 0, "msg" => "Enter a valid name."]);
                exit;
            }
    
            $users['lastname'] = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
            if(false == $users['lastname']) {
                echo json_encode(["status" => 0, "msg" => "Enter a valid name."]);
                exit;
            }
    
            $users['phone'] = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
            if(false == $users['phone'] ) {
                echo json_encode(["status" => 0, "msg" => "Enter valid phone no"]);
                exit;
            }

            $users['url'] = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
            if(false == $users['url'] ) {
                echo json_encode(["status" => 0, "msg" => "Enter valid url"]);
                exit;
            }

            $users['age'] = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
            if(false == $users['age'] ) {
                echo json_encode(["status" => 0, "msg" => "Enter valid age"]);
                exit;
            }

            $users['dob'] = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
            if(false == $users['dob'] ) {
                echo json_encode(["status" => 0, "msg" => "Enter valid D-O-B"]);
                exit;
            }


            return $users;
        }


?>


