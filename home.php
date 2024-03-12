
<?php 
session_start();
include "db_conn.php";

if(!isset($_SESSION['status'])){
    header("Location: loginform.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <h2>Welcomeee</h2>
    <input type="submit" name="submit">
    </form>
    
</body>
</html>

<?php 
if(isset($_POST["submit"])) {
    session_start();
    session_destroy();
    header("Location: loginform.php");
}
?>