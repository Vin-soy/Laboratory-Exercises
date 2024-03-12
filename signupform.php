<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <div class="container mt-5">
        <form class="row g-3" action="signup-index.php" method="post">
            <h2>Register</h2>
            <p>Create your account here.</p>
            <?php if (isset($_GET['error'])) { ?>
                <div class="p bg-danger text-white p-1 rounded mb-4 text-center mx-auto">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <div class="p bg-success text-white p-1 rounded mb-4 text-center mx-auto">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php } ?>

            <div class="form-group">
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="firstname" placeholder="First name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="middlename" placeholder="Middle name">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="text" name="lastname" class="form-control" placeholder="Lastname">
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address">
            </div>

            <div class="form-group">
                <input type="text" name="status" class="form-control" placeholder="Status">
            </div>

            <div class="form-group">
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                Already have an account?<a href="loginform.php">Log in here</a>
            </div>
            <input type="submit" class="btn btn-success" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>