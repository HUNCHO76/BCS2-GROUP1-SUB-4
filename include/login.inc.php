<?php
if(isset($_POST['login-submit'])){
 
    require "db.inc.php";

    $email = $_POST['email'];
    $password = $_POST['password_hash'];

    if(empty($email) || empty($password)){
        echo $email;    
        echo $password;
        // header("location: ../index.php?error=emptyfield");
    }

    else{

        $sql = "SELECT * FROM users WHERE first_name=? or  email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../form-login.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result)){
                $pwdcheck = password_verify($password, $row['password_hash']); 
                if($pwdcheck == false){
                    header("location: ../form-login.php?error=wrongpasswd");
                    exit();
                }
                elseif($pwdcheck == true){
                    session_start();
                    $_SESSION['userid'] = $row['user_id'];
                    $_SESSION['useruid'] = $row['email']; //        

                    header("location: ../feed.php?login=success");
                    exit();

                }
                else {
                    header("location: ../form-login.php?error=wrongpwd");
                    exit();
                }

            }
            else{
                header("location: ../form-login.php?error=nouser");
            exit();
            }
        }

       
        
    }
}
else{
    header("location: ../index.php");
    exit();
} 