<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['user_id'];
    
    if($_SESSION['type'] == 1){
        $sql = "SELECT * FROM general_users join users on general_user_id = users.id where type!=0 ";
        $sql2 = "SELECT * FROM business join users on business_id = users.id ";
    }
    if($_SESSION['type'] == 2)
        $sql = "SELECT * FROM psychologist join users on psychologist_id = users.id ";

    elseif($_SESSION['type'] == 3){
        $sql = "SELECT * FROM psychologist join users on psychologist_id = users.id ";

    }
    $query = mysqli_query($conn, $sql);

    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>