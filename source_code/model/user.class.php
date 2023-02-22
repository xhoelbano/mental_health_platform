<?php 
class Users {
    private $dbh;

    public function __construct($dbh){
        $this->dbh = $dbh;
    }

    public function verifyLogin($email, $password){        
        # prepare query and fetch results
        $stmt = $this->dbh->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user['type'] == 1){
            $stmt2 = $this->dbh->prepare("SELECT * FROM `psychologist` WHERE psychologist_id = ?");
            $stmt2->execute([$user['id']]);
            $user2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            if($user2['verify_profile'] == 0){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='../login.php';
                window.alert('Your Psychologist Account is not yet verified!')
                </SCRIPT>");
                return false;
            }
            if($user2['verify_profile'] == 2){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='../login.php';
                window.alert('Your Account is rejected! Please contact us')
                </SCRIPT>");
                return false;
            }
        }

        if($user['type'] == 2){
            $stmt3 = $this->dbh->prepare("SELECT * FROM `business` WHERE business_id = ?");
            $stmt3->execute([$user['id']]);
            $user3 = $stmt3->fetch(PDO::FETCH_ASSOC);
            if($user3['verify_profile'] == 0){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='../login.php';
                window.alert('Your Business Account is not yet verified!')
                </SCRIPT>");
                return false;
            }
            if($user3['verify_profile'] == 2){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='../login.php';
                window.alert('Your Account is rejected! Please contact us')
                </SCRIPT>");
                return false;
            }
        }

        return ($user && password_verify($password, $user['password'])) ? $user: null;
    }


    public function checkAccountExists($email){
        $stmt = $this->dbh->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user: null;
    }

    public function registerUser($email, $password, $type){
        if ($this->checkAccountExists($email) != true){
            $stmt = $this->dbh->prepare("INSERT INTO `users` (`email`, `password`, `type`) VALUES (?, ?, ?);");
            $encode = password_hash($password,PASSWORD_BCRYPT);
            $stmt->execute(array($email, $encode, $type));
            return true;
        }
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('There already exist an account with the email you provided. Please Login or try to Sign Up again!')
  
</SCRIPT>");
return false;

}


}

?>