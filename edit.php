<?php
session_start();

if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}

include("connection.php");
include("include/header.php");

//getting id from url
$id = $_GET['id'];

if(isset($_POST['update']))
{
	$post = $_POST['post'];

    //updating the table
    $result = mysqli_query($mysqli, "UPDATE posts SET post='$post' WHERE id=$id");

    //redirectig to the display page. In our case, it is posts.php
    header("Location: posts.php");
}

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM posts WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$post = $res['post'];
}
?>

<div class="content">
	
	<form name="form" method="post" action="" role="form">
        <div class="form-group">
            <textarea name="post" rows="2" cols="60" required placeholder="Say! Whats happening now?" class="form-control">
                <?php echo $post;?>
            </textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="update" value="Update" class="btn btn-primary" />
        </div>
    </form>

</div>

<?php include("include/footer.php"); ?>
