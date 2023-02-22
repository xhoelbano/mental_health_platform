<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	include'../views/db_connect.php';
	
	$bussid = $_POST['bus'];
	$accdel = $_POST['accdel'];
	
	if($accdel == 0){
		$result = mysqli_query($conn,"UPDATE business 
										SET verify_profile = 2
										WHERE business_id = '$bussid'");
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Business was Rejected')
				window.location.href='../views/index.php?page=table_business';
				</SCRIPT>");
	}
	else if($accdel == 1){
		$result = mysqli_query($conn,"UPDATE business 
										SET verify_profile = 1
										WHERE business_id = '$bussid'");
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Business was Approved')
				window.location.href='../views/index.php?page=table_business';
				</SCRIPT>");
	}
	else{
		$result = mysqli_query($conn,"DELETE FROM users WHERE id = '$bussid'");
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Businesss was Removed')
				window.location.href='../views/index.php?page=table_business';
				</SCRIPT>");
	}
}
?>