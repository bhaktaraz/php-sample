<?php
session_start();

if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}

include_once("connection.php");
include_once("include/header.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM posts WHERE user_id=".$_SESSION['id']." ORDER BY id DESC");
?>

    <div class="content">
        <h1>My Posts</h1>

	<table class="table">
		<tr bgcolor='#CCCCCC'>
			<td>Post</td>
			<td>Date</td>
			<td>Action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['post']."</td>";
			echo "<td>".$res['datetime']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this post?')\">Delete</a></td>";
		}
		?>
	</table>
    </div>
<?php include('include/footer.php') ?>