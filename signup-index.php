<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST['submit'])){
        include 'db_conn.php';
        
        function sendemail_verify($firstname,$email, $verify_token, $otp){
            $mail = new PHPMailer(true);

            $mail-> isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'princeericksonsanado@gmail.com';
            $mail->Password = 'mfoh yvii laas xbtw';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
    
            $mail->setFrom('princeericksonsanado@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
    
            $mail->Subject ="Email Verification for logging in";
            $email_message = "
                <h2>Hi $firstname! Potang ina Ito ang code mo</h2><br>
                <p>Sa wed Gawa tayo ng sayo ito OTP: <b>$otp</b></p>
                <h5>
                    Verify your email address with the 
                    link given below HEHE
                </h5>
                <br><br>
                <a href='http://localhost/Final/verify-email.php?token=$verify_token'>Click Here</a>                
            
            ";
            $mail->Body = $email_message;
            $mail->send();
            echo
            "
            <script>
            alert('We've send you an verification to your email kindly check');
            </script>
            ";
        }

        $firstname      = $_POST['firstname'];
        $middlename     = $_POST['middlename'];
        $lastname       = $_POST['lastname'];
        $email          = $_POST['email'];
        $status         = $_POST['status'];
        $uname          = $_POST['username'];
        $password       = $_POST['password'];
        $otp            = substr(str_shuffle("0123456789"), 0, 5);
        $verify_token   = md5(rand());

        //veryfying if the email and username input is unique
        $vfy_email = mysqli_query($conn, "SELECT Email FROM users WHERE Email = '$email'");
        $vfy_uname = mysqli_query($conn, "SELECT Username FROM users WHERE username = '$uname'");
        
        if(mysqli_num_rows($vfy_email) > 0) {
            header("Location: signupform.php?error=Email is already used!");
        } else if(mysqli_num_rows($vfy_uname) > 0) {
            header("Location: signupform.php?error=User name is already used!"); 
        } else {
            $sql = "INSERT INTO users (Firstname, Middlename, Lastname, Email, Status, username, password, verify_token, otp)
            VALUES ('$firstname', '$middlename','$lastname', '$email', '$status', '$uname', '$password', '$verify_token', '$otp')";
            $result = mysqli_query($conn, $sql);

            if($result){
                sendemail_verify("$firstname","$email","$verify_token","$otp");

                header("Location: signupform.php?success=You've successfully created account!". 
                "We've Email please verify your email address");
            }
        }
    }
?>