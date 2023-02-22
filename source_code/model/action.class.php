<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
			$qry = $this->db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM users where email = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		$status = "Offline now";
		$sql2 = $this->db->query("UPDATE users SET status = '{$status}' WHERE id = {$_SESSION['user_id']}");
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../login.php");
	}

	function save_user(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password')
					$v = password_hash($v,PASSWORD_BCRYPT);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM users where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set $data");
		}else{
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if($save){
			return 1;
		}
	}
	
	function update_user(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass','table')) && !is_numeric($k)){
				if($k =='password'){
					if($v == NULL)
						continue;
					$v = password_hash($v,PASSWORD_BCRYPT);}
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM users where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set $data");
		}else{
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if($save){
			foreach ($_POST as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
			return 1;
	}

	function delete_student(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM students where id = ".$id);
		if($delete)
			return 1;
	}

	function delete_school(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM `schools` where id = ".$id);
		if($delete)
			return 1;
	}


	function save_survey(){
		extract($_POST);
		$data = "";
		$id_key = 'user_id';
		$id_value = $_SESSION['user_id'];
		$data .= " $id_key='$id_value' ";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO survey_set set $data");
		}else{
			$save = $this->db->query("UPDATE survey_set set $data where id = $id");
		}

		if($save)
			return 1;
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		return htmlspecialchars($data);
	}

	function checkAccountExists($email){
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->execute([$email]);
		$result = $stmt->get_result(); // get the mysqli result
        $user = $result->fetch_assoc(); // fetch data   
        return $user ? $user: null;
    }

	function save_student(){
		extract($_POST);
		$data = "";
		$user = "";
		if(isset($_POST['email']) && isset($_POST['password'])){
			if ($this->checkAccountExists($_POST['email']))
				return 0;
			$sql4 = "INSERT INTO `users` (`email`,`password`,`type`) values (?,?,'4')"; // SQL with parameters
			$stmt4 = $this->db->prepare($sql4); 
			$encode = password_hash($_POST['password'],PASSWORD_BCRYPT);
			$stmt4->bind_param("ss", $_POST['email'],$encode);
			$stmt4->execute();
		}
		
		foreach($_POST as $k => $v){
				if($k == "email" || $k == "password"){
					if($k == "password"){
						$encode = password_hash($v,PASSWORD_BCRYPT);
						$v = $encode;
					}
					if(empty($user)){
						$user .= " $k='$v' ";
					}else{
						$user .= ", $k='$v' ";
					}

				}
				elseif(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
		}
		$sql = "SELECT linked_school_id FROM psychologist where psychologist_id = ?"; // SQL with parameters
		$stmt = $this->db->prepare($sql); 
		
		$stmt->bind_param("i", $_SESSION['user_id']);
		$stmt->execute();
		$result = $stmt->get_result(); // get the mysqli result
		$rows = $result->fetch_assoc(); // fetch data   
		
		$sc_id = "school_id";
		$linked_id = $rows['linked_school_id'];
		$data .= ", $sc_id='$linked_id' ";


		$sql5 = "SELECT id FROM `users` ORDER BY id DESC LIMIT 1; "; // SQL with parameters
		$stmt5 = $this->db->prepare($sql5); 
		$stmt5->execute();
		$result5 = $stmt5->get_result(); // get the mysqli result
		$rows5 = $result5->fetch_assoc(); // fetch data   
		$userID =  $rows5['id'];
		
		$st_id = "id";
		$data .= ", $st_id='$userID' ";
		$save = $this->db->query("INSERT INTO `students` set $data");

		if($save)
			return 1;
	}
	
	function delete_survey(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM survey_set where id = ".$id);
		if($delete){
			return 1;
		}
	}
	
	function save_question(){
		extract($_POST);
			$data = " survey_id=$sid ";
			$data .= ", question='$question' ";
			$data .= ", type='$type' ";
			if($type != 'textfield_s'){
				$arr = array();
				foreach ($label as $k => $v) {
					$i = 0 ;
					while($i == 0){
						$k = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
						if(!isset($arr[$k]))
							$i = 1;
					}
					$arr[$k] = $v;
				}
			$data .= ", frm_option='".json_encode($arr)."' ";
			}else{
			$data .= ", frm_option='' ";
			}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO questions set $data");
		}else{
			$save = $this->db->query("UPDATE questions set $data where id = $id");
		}

		if($save)
			return 1;
	}
	function delete_question(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM questions where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function action_update_qsort(){
		extract($_POST);
		$i = 0;
		foreach($qid as $k => $v){
			$i++;
			$update[] = $this->db->query("UPDATE questions set order_by = $i where id = $v");
		}
		if(isset($update))
			return 1;
	}
	function save_answer(){
		extract($_POST);
			foreach($qid as $k => $v){
				$data = " survey_id=$survey_id ";
				$data .= ", question_id='$qid[$k]' ";
				$data .= ", user_id='{$_SESSION['user_id']}' ";
				if($type[$k] == 'check_opt'){
					$data .= ", answer='[".implode("],[",$answer[$k])."]' ";
				}else{
					$data .= ", answer='$answer[$k]' ";
				}
				$save[] = $this->db->query("INSERT INTO answers set $data");
			}
					

		if(isset($save))
			return 1;
	}

	function save_school(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
		}
			$save = $this->db->query("INSERT INTO `schools` set $data");
		

		if($save){
			return 1;
		}
	}

	function save_activation_code(){
		extract($_POST);
	
		$sql = "SELECT * FROM schools where activation_code = ?"; // SQL with parameters
		$stmt = $this->db->prepare($sql); 
		
		$stmt->bind_param("s", $activation_code);
		$stmt->execute();
		$result = $stmt->get_result(); // get the mysqli result
		$rows = $result->fetch_assoc(); // fetch data   
		$num_rows = mysqli_num_rows($result);
		

		if ($num_rows){
			
			$save = $this->db->query("UPDATE `psychologist` set education_env_check=1, 
					linked_school_id={$rows['id']} where psychologist_id={$_SESSION['user_id']} ");
				
		}

		if($save){
			return 1;
		}
	}

}