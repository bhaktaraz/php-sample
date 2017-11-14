<?php
include("connection.php");
include("include/header.php");

$hasError = false;

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		$errorMessage = "All fields should be filled. Either one or many fields are empty.";
        $hasError = true;
	} else {
		mysqli_query($mysqli, "INSERT INTO user(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");

        header("Location:login.php");
	}
}
?>
<div class="content">
    <h1>Register</h1>

    <?php
    if($hasError){ ?>
        <p class="alert alert-danger"><?php echo $errorMessage; ?></p>
    <?php } ?>

	<form name="form" method="post" action="" role="form">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
        </div>

	</form>
</div>

<?php include("include/footer.php"); ?>

