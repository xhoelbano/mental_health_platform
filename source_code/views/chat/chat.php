<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['user_id'])){
    header("location: ../login.php");
  }
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['id']);

          if($_SESSION['type'] == 1)
            $sql = mysqli_query($conn, "SELECT * FROM general_users join users on users.id = general_user_id WHERE general_user_id = {$user_id}");
          elseif($_SESSION['type'] == 2)
            $sql = mysqli_query($conn, "SELECT * FROM psychologist join users on users.id = psychologist_id  WHERE general_user_id = {$user_id}");
          elseif($_SESSION['type'] == 3)
            $sql = mysqli_query($conn, "SELECT * FROM psychologist join users on users.id = psychologist_id  WHERE psychologist_id = {$user_id}");
            
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>

                <img src="php/images/<?php 
                if($row['type'] == 1)
                  echo "psychologist.jpg"; 

                elseif($row['type'] == 2){
                  $row['firstname'] = $row['business_name'];
                  $row['lastname']= "";
                  echo "business.jpg"; 
                }
                elseif($row['type'] == 3){
                  $row['firstname'] = $row['nickname'];
                  $row['lastname']= "";
                  echo "user.jpg"; 
                }
                elseif($row['type'] == 4)
                  echo "student.jpg"; 
                ?>" alt="">
                <div class="details">
                    <span><?php echo $row['firstname']. " " . $row['lastname'] ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..."
                    autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chat.js"></script>

</body>

</html>