<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    // function validate($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }
    // $uname = validate($_POST['uname']);
    // $pass = validate($_POST['password']);
    $uname =$_POST['uname'];
    $pass = $_POST['password'];
    $_SESSION["status"] = false;

    if (empty($uname)) {
        header("Location: loginform.php?error=User Name is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: loginform.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] == $uname && $row['password'] == $pass) {

                if($row['active'] == 'false'){
                    header("Location: loginform.php?error=Please verify your account");
                } else {
                   $_SESSION['user_name'] = $row['user_name'];
                header("Location: home.php");
                exit();  
                }
            } else {
                header("Location: loginform.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            header("Location: loginform.php?error=Incorrect User name or password");
            exit();
        }
    }
} 
else {
    header("Location: loginform.php");
    exit();
}

?>
<?php 
// session_start();
// include "db_conn.php";
// if (isset($_POST['uname']) && isset($_POST['password'])) {
//     function validate($data) {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }
//     $uname = validate($_POST['uname']);
//     $pass = validate($_POST['password']);

//     if (empty($uname)) {
//         header("Location: index.php?error=User Name is required");
//         exit();

//     } else if(empty($pass)) {
//         header("Location: index.php?error-Password is required");
//         exit();

//     } else{
//         $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
//         $result = mysqli_query($conn, $sql); 
//         if (mysqli_num_rows($result) === 1) {
//             $row = mysqli_fetch_assoc($result);
//             if ($row['user_name'] === $uname && $row['password'] === $pass) {
//                 echo "Logged in!";
//                 $_SESSION['user_name'] = $row['user_name'];
//                 $_SESSION['name'] = $row['name'];
//                 $_SESSION['id'] = $row['id'];
//                 header("Location: home.php");
//                 exit();
//             }else{
//                 header("Location: index.php?error=Incorect User name or password");
//                 exit();
//             }
//         }else {
//             header("Location: index.php?error-Incorect User name or password");
//             exit();
//         }
//     }
// } else {
//     header("Location: index.php");
//     exit();
//     }
?>