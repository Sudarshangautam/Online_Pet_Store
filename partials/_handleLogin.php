<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"]; 
    
    $sql = "Select * from users where username='$username' && is_verified = 1"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['id'];
        if (password_verify($password, $row['password'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            header("location: /OnlinePetStore/index.php?loginsuccess=true");
            exit();
        } 
        else{
            header("location: /OnlinePetStore/index.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /OnlinePetStore/index.php?loginsuccess=false");
    }
}    
?>