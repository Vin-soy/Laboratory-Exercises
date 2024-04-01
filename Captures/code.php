<?php
include '../db_conn.php';
session_start();

if(!isset($_SESSION['status'])){
  header("Location: ../loginform.php");
}
$uname = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE username='$uname' AND user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$user_image = $row['img'];
$firstname = $row['Firstname'];
$middilename = $row['Middlename'];
$lastname = $row['Lastname'];
?>
