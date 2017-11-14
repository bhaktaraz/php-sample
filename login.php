<?php
session_start();

include("connection.php");
include('include/header.php');

$hasError = false;

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
        $hasError = true;
		$errorMessage = "Either username or password field is empty.";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			$hasError = true;
		    $errorMessage = "Invalid username or password.";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
}
?>

<div class="content">

    <h1>Login</h1>

    <?php
    if($hasError){ ?>
        <p class="alert alert-danger"><?php echo $errorMessage; ?></p>
    <?php } ?>

    <form name="form" method="post" action="" role="form">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
        </div>
    </form>

</div>

<?php
include('include/footer.php');
?>
