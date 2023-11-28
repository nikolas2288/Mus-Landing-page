<?php
class Account {
    private $con;
    private $arrayErr;
    public function __construct($con){
        $this->con = $con;
        $this->arrayErr = array();
    }
    
    public function register($un, $fn, $ln, $em, $pw, $pw2){
        $this->validateUserName($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmail($em);
        $this->validatePasswords($pw, $pw2); 

        if(empty($this->arrayErr) == true) {
            return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
        }
        else {
            return false;
        }
    }

    public function getError($error){
        if (!in_array($error, $this->arrayErr)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($un, $fn, $ln, $em, $pw){
        $encryptedPw = md5($pw);
        $profilePic = "assests/img/profile-pick/profile.png";
        $date = date("Y-m-d");

        $result = mysqli_query($this->con, "INSERT INFO users VALUES(
            '', 
            '$un', 
            '$fn', 
            '$ln',
            '$em', 
            '$encryptedPw', 
            '$date', 
            '$profilePic')");
        return $result;
    }

    private function validateUserName($un) {
       if(strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->arrayErr, Constant::$usernameDoNotMuch);
            return;
       }
    }
    private function validateFirstName($fn) {
        if(strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->arrayErr, Constant::$firstNameDoNotMuch);
            return;
        }
    }
    private function validateLastName($ln) {
        if(strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->arrayErr, Constant::$lastNameDoNotMuch);
            return;
        }
    }
    private function validateEmail($em) {
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->arrayErr, Constant::$emailDoNotMuch);
            return;
        }
    }
    private function validatePasswords($pw, $pw2) {
        if($pw != $pw2) {
            array_push($this->arrayErr, Constant::$passwordDoNotMuch);
            return;
        }      
        if(preg_match('/[^A-Za-z0-9]/', $pw)) {
            array_push($this->arrayErr, Constant::$passwordContain);
            return;
        }
        if(strlen($pw) > 30 || strlen($pw) < 5) {
            array_push($this->arrayErr, Constant::$passwordCharacter);
            return;
        }
    }
}

?>