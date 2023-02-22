<?php
require_once("../model/db_conn.php");
require_once("../model/general_user.class.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nickname'])){
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $nickname = test_input($_POST['nickname']);

        $dbh = Database::get_connection();
        $general_user_instance = new GeneralUser($dbh);
        $general_user =($general_user_instance)->registerGeneralUser($email, $password, 3, $nickname);
    }
}

?>