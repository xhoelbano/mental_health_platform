<?php 
require_once("../model/user.class.php");


class Business {
    private $dbh;

    public function __construct($dbh){
        $this->dbh = $dbh;
    }

    public function registerBusiness($email, $password, $type, $nipt, $bname, $contact, $address, $website){
        $user_instance = new Users($this->dbh);
        if (($user_instance)->registerUser($email, $password, $type) == true) {
            $userID =  $this->dbh->lastInsertId();
            $stmt = $this->dbh->prepare("INSERT INTO `business` (`business_id`, `nipt`, `business_name`, `contact`, `address`, `website`) 
            VALUES (?, ?, ?, ?, ?, ?);");
            $stmt->execute(array($userID, $nipt, $bname, $contact, $address, $website));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Account created successfully! Thank you for joinning our platform! Now wait patiently! Our staff will review and verify your account shortly. You will be notified via email when your account will be verified!')
            window.location.href='../login.php';
            </SCRIPT>");
        }else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location.href='../signup/signup_psychologist.php';
            </SCRIPT>");
           
        }

    }
}