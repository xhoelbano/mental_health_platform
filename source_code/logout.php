<?php
require_once("model/db_conn.php");
require_once("model/user.class.php");

session_start();
$dbh = Database::get_connection();
$user_instance = new Users($dbh);
$status = "Offline now";
$sql2 = $dbh->prepare("UPDATE users SET status = '{$status}' WHERE id = {$_SESSION['user_id']}");
$sql2->execute();
session_unset();
session_destroy();

header("Location: ./login.php");