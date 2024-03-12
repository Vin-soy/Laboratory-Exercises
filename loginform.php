<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="index.php" method="post" autocomplete="off">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error space"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <p></p>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <div>Don't have account? <a href="signupform.php">Sign Up Here</a></div>
        <button type="submit">Login</button>
    </form>
</body>
</html>