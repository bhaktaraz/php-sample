<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHP Sample</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="./">PHP Sample</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <ul class="navbar-nav">

            <?php
            if(isset($_SESSION['valid'])) {
                include("connection.php");
                $result = mysqli_query($mysqli, "SELECT * FROM user");
                ?>

                <li class="nav-item dropdown text-right">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, <?php echo $_SESSION['name'] ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="posts.php">Posts</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>

                <?php
            } else { ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Sign Up</a></li>
            <?php } ?>

        </ul>

    </div>
</nav>

<div class="container">