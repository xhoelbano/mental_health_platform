<?php
require_once("../model/db_conn.php");
require_once("../model/psychologist.class.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['website']) && isset($_POST['license_number'])){
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $firstname = test_input($_POST['fname']);
        $lastname = test_input($_POST['lname']);
        $contact = test_input($_POST['contact']);
        $address = test_input($_POST['address']); 
        $website = test_input($_POST['website']);
        $license_nr = test_input($_POST['license_number']);

        $dbh = Database::get_connection();
        $psychologist_instance = new Psychologist($dbh);
        $psychologist =($psychologist_instance)->registerPsychologist($email, $password, 1, $firstname, $lastname, $contact, $address, $website, $license_nr);
    }
}

?>