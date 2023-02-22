<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['user_id'])){
    header("location: .../login.php");
  }
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <?php 
            if($_SESSION['type'] == 1)
            $sql = mysqli_query($conn, "SELECT * FROM psychologist WHERE psychologist_id = {$_SESSION['user_id']}");
            
            elseif($_SESSION['type'] == 2)
            $sql = mysqli_query($conn, "SELECT * FROM business WHERE business_id = {$_SESSION['user_id']}");

            elseif($_SESSION['type'] == 3)
            $sql = mysqli_query($conn, "SELECT * FROM general_users WHERE general_user_id = {$_SESSION['user_id']}");

            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
                    <img src="php/images/<?php 
                      if($_SESSION['type'] == 1)
                      echo "psychologist.jpg"; 
                      elseif($_SESSION['type'] == 2)
                        echo "business.jpg"; 
                      elseif($_SESSION['type'] == 3)
                        echo "user.jpg"; 
                      elseif($_SESSION['type'] == 4)
                        echo "student.jpg"; 
                    ?>" alt="">
                    <div class="details">
                        <span><?php 
                        if($_SESSION['type'] == 1)
                          echo $row['firstname']. " ".$row['lastname'] ; 
                        elseif($_SESSION['type'] == 2)
                          echo $row['business_name'];
                        elseif($_SESSION['type'] == 3)
                          echo $row['nickname'];
                        ?></span>

                        <p><?php 
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = {$_SESSION['user_id']}");
                        $row_id = mysqli_fetch_assoc($sql);
                        echo $row_id['status']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $_SESSION['user_id']; ?>" class="logout">Logout</a>
                <a href="../index.php" class="logout">Dashboard</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>

</body>

</html>