<?php
session_start();

if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}

include("connection.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM posts WHERE id=$id");

//redirecting to the display page (posts.php in our case)
header("Location:posts.php");


