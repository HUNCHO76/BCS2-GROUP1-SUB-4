<?php
 if(isset($_POST['signup-submit'])){

    require 'db.inc.php';

    $firstname = $_POST['first_name'];
    $lastname =  $_POST['last_name'];
    $email = $_POST['email'];
    $password =  $_POST['password_hash'];
    $pwdrepeat = $_POST['pwd-repeart'];

    if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($pwdrepeat)){
        header("location: ../form-register.php?error=emptyfield");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $usename)){
        header("location: ../form-register.php?error=validuid&email");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../form-register.php?error=validemail". $email);
        exit();

    }
    elseif(!preg_match("/^[a-zA-Z]*$/", $firstname)){
        header("location: ../form-register.php?error=char". $fistname);
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z]*$/", $lastname))
    {
        header("location: ../form-register.php?error=char". $lastname);
        exit(); 
    }
    elseif($password !== $pwdrepeat){
        header("location: ../form-register.php?error=pwdnotmatch". $firstname. "&email" .$email);
        exit();
    }
    

     else{
     
  $sql = "SELECT first_name FROM users WHERE first_name=?;";
  $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../form-register.php?error=sqlierror");
    exit();
   }

    else{
        mysqli_stmt_bind_param($stmt, "s", $firstname ); //change first_name to email 
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);
        if($resultcheck > 0){
            header("location: ../form-register.php?error=usernametaken&mail=". $email);
            exit();

        }
        else{
              $sql = "INSERT INTO users(first_name, last_name, email, password_hash) VALUES (?,?,?,?);";
              $stmt = mysqli_stmt_init($conn);
             if(!mysqli_stmt_prepare($stmt, $sql)){
              header("location: ../form-register.php?error=sqlierror");
        
              exit();
                }
             
             else{
              $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ssss", $firstname , $lastname, $email, $hashedpwd);
              mysqli_stmt_execute($stmt);
              header("location: ../form-login.php?signup=success");
             exit();
       
             }
       }
    }
     
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

   
}
 else{
    header("location: ../form-register.php?");
        exit();
 }