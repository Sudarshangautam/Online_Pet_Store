<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code)
{
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
                   
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sudarshangautam868@gmail.com';                     //SMTP username
        $mail->Password   = 'family123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('sudarshangautam868@gmail.com', 'Online pet store');
        $mail->addAddress($email);     //Add a recipient
       
    
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verification from online pet store';
        $mail->Body    = "Thanks for registration!
        Click the link below to verify the email address
        <a href='http://localhost/OnlinePetStore/partials/verify.php?email=$email&v_code=$v_code'>Verify</a>";
       
    
        $mail->send();
       return true;
    } 
    catch (Exception $e) {
        return false;
    }
}

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
        header("Location: /OnlinePetStore/index.php?signupsuccess=false&error=$showError");
    }
    else{
      if(($password == $cpassword)){
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $v_code=bin2hex(random_bytes(16));
          $sql = "INSERT INTO `users` ( `username`, `firstName`, `lastName`, `email`, `phone`, `password`, `joinDate`,`verification_code`,`is_verified`) VALUES ('$username', '$firstName', '$lastName', '$email', '$phone', '$hash', current_timestamp(),'$v_code','0')";   
          $result = mysqli_query($conn, $sql)  &&  sendMail($_POST['email'],$v_code);
          if ($result){
              $showAlert = true;
              
              header("Location: /OnlinePetStore/index.php?signupsuccess=true");
          }
      }
      else{
          $showError = "Password did not matched";
          header("Location: /OnlinePetStore/index.php?signupsuccess=false&error=$showError");
      }
    }
}
    
?>