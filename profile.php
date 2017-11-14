<?php
session_start();

include("connection.php");
include('include/header.php');

$id = $_SESSION['id'];

$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id = $id")
            or die("Could not execute the select query.");

$row = mysqli_fetch_assoc($result);
?>

<div class="content">

    <h1>Profile</h1>

    <table class="table">
        <tr>
            <th>Name</th>
            <td><?php echo $row['name']?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $row['email']?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?php echo $row['username']?></td>
        </tr>
    </table>

</div>

<?php
include('include/footer.php');
?>
