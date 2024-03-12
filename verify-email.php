<?php
include 'db_conn.php';

if(isset($_POST['verify'])){
    
    if(isset($_GET['token'])){
        $activation_code = $_GET['token'];
        $otp = $_POST['otp'];

        $sql = "SELECT * FROM users WHERE verify_token = '$activation_code'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $rowSelect = mysqli_fetch_assoc($result);

            $rowOtp = $rowSelect['otp'];

            if($rowOtp !== $otp){
                echo '<script>alert("Please provide correct OTP!")</script>';
            } else {
                $sqlUpdate = "UPDATE users SET active = 'true' WHERE otp = '$otp' 
                AND verify_token = '$activation_code'";

                $result = mysqli_query($conn, $sqlUpdate);
                
                if($result){
                    echo '<script>alert("Your account successfuly activated")</script>'; 
                    header("Refresh:2; url=index.php");
                }
                else{
                    echo '<script>alert("Opss... Your account is already activated")</script>'; 
                }
            }
        } else {
            echo '<script>alert("Youve enter invalid token")</script>'; 
            header("Refresh:2; url=index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Document</title>
</head>
<body>
    <h2>Otp Verify</h2><br>
    <form action="" method="post">
        OTP <input type="text" name="otp"><br>
        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
<?php
// include 'db_conn.php';
// session_start();

// if(isset($_GET['token'])) {
//     $token  = $_GET['token'];
//     $query  = "SELECT verify_token,verify_status FROM users WHERE verify_token = '$token' LIMIT 1";
//     $result = mysqli_query($conn,$query);

//     if(mysqli_num_rows($result) > 0){

//         $row = mysqli_fetch_array($result);
//         if($row['verify_status'] == "unactive"){

//             $cld_token = $row['verify_token'];
//             $query = "UPDATE users SET verify_status = 'active' WHERE verify_token = '$cld_token' LIMIT 1";
//             $result = mysqli_query($conn,$query);
//             if($result){
//                 header("Location: loginform.php?error=Your Account Successfuly Verified");
//             } else {
//                 header("Location: loginform.php?error=Their is an error verifiying your account");
//             }
//         } else{
            
//             $_SESSION['status'] = "This email already verified";
//             header("Location: loginform.php");
//         }

//     } else {
//         $_SESSION['status'] = "This Token does not Eaxixst";
//         header("Location: loginform.php?error=This Token does not Eaxixst");
//     }

// } else{
//     header("Location: loginform.php?error=your not allowed");
// }
?>