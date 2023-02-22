<?php 
require_once("../model/user.class.php");

class GeneralUser {
    private $dbh;

    public function __construct($dbh){
        $this->dbh = $dbh;
    }


    public function registerGeneralUser($email, $password, $type, $nickname){
        $user_instance = new Users($this->dbh);
        if (($user_instance)->registerUser($email, $password, $type) == true) {
            $userID =  $this->dbh->lastInsertId();
            $stmt = $this->dbh->prepare("INSERT INTO `general_users` (`general_user_id`, `nickname`) 
            VALUES (?, ?);");
            $stmt->execute(array($userID, $nickname));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Account created successfully! Thank you for joinning our platform!')
            window.location.href='../login.php';
            </SCRIPT>");
        }else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location.href='../signup/signup_general_user.php';
            </SCRIPT>");
        }

    }
}