<?php
require_once("../model/db_conn.php");
require_once("../model/user.class.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $dbh = Database::get_connection();
        $user_instance = new Users($dbh);
        $user =($user_instance)->verifyLogin($email, $password);

        if ($user) {
            session_start();

            $_SESSION['user'] = $user;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['type'] = $user['type'];

            $status = "Active now";
            $sql2 = $dbh->prepare("UPDATE users SET status = '{$status}' WHERE id = {$_SESSION['user_id']}");
            $sql2->execute();

        if ($_SESSION['type'] == 0) #admin
            header("Location: ../views/index.php");
        else if ($_SESSION['type'] == 1) #general_user
            header("Location: ../views/index.php");
        else if ($_SESSION['type'] == 2) #psychologist
            header("Location: ../views/index.php");
        else if ($_SESSION['type'] == 3) #business
            header("Location: ../views/index.php"); 
        else if ($_SESSION['type'] == 4) #student
            header("Location: ../views/index.php"); 
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Incorrect credentials!')
            window.location.href='../login.php';
            </SCRIPT>");
            
        }
    }
}

?>