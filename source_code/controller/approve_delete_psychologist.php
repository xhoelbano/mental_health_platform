<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	include'../views/db_connect.php';
	
	$psychid = $_POST['bus'];
	$accdel = $_POST['accdel'];
	
	if($accdel == 0){
		$result = mysqli_query($conn,"UPDATE psychologist 
										SET verify_profile = 2
										WHERE psychologist_id = '$psychid'");
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Psychologist was Rejected')
				window.location.href='../views/index.php?page=table_psychologist';
				</SCRIPT>");
	}
	else if($accdel == 1){
		$result = mysqli_query($conn,"UPDATE psychologist 
										SET verify_profile = 1
										WHERE psychologist_id = '$psychid'");
		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Psychologist was Approved')
				window.location.href='../views/index.php?page=table_psychologist';
				</SCRIPT>");
	}
	else{
		$result = mysqli_query($conn,"DELETE FROM users WHERE id = '$psychid'");
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Psychologist was Removed')
				window.location.href='../views/index.php?page=table_psychologist';
				</SCRIPT>");
	}
}
?>