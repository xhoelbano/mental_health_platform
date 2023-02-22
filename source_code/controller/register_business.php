<?php
require_once("../model/db_conn.php");
require_once("../model/business.class.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nipt']) && isset($_POST['bname']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['website']) ){
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $nipt = test_input($_POST['nipt']);
        $bname = test_input($_POST['bname']);
        $contact = test_input($_POST['contact']);
        $address = test_input($_POST['address']); 
        $website = test_input($_POST['website']);

        $dbh = Database::get_connection();
        $business_instance = new Business($dbh);
        $business =($business_instance)->registerBusiness($email, $password, 2, $nipt, $bname, $contact, $address, $website);
    }
}

?>