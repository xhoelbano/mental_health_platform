<?php 
  session_start();
  if(isset($_SESSION['user_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; 

?>

<?php 
if(!isset($_SESSION['user_id'])){
    header("location: ../../login.php");
}
?>

<body>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>

</html>