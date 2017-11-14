<?php
session_start();
include('connection.php');
include('include/header.php');
?>

<div class="home-content">

    <?php
    if(isset($_SESSION['valid'])) {

        $userId = $_SESSION['id'];

        // Submitting form
        if(isset($_POST['submit'])) {
            $post = $_POST['post'];

            mysqli_query($mysqli, "INSERT INTO posts(post, datetime, user_id) VALUES('$post', current_time(), '$userId')")
            or die(mysqli_error($mysqli)." Could not execute the insert query.");

            header("Location:index.php");
        }

    ?>
        <div class="col-md-8">
            <h1>Hey,  <?php echo $_SESSION['name'] ?></h1>

            <form method="post" action="" role="form">
                <div class="form-group">
                    <textarea name="post" rows="2" cols="60" required placeholder="Say! Whats happening now?" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Publish" class="btn btn-success">
                </div>
            </form>

            <h2>Recent Posts</h2>

            <?php
            // Recent Posts
            $recentPosts = mysqli_query($mysqli, "SELECT p.post, p.datetime, u.name FROM posts p JOIN user u ON p.user_id = u.id ORDER BY p.id DESC LIMIT 10");
            while($post = mysqli_fetch_array($recentPosts)) {
            ?>

            <strong><?php echo $post['name']?></strong>

            <p><?php echo $post['post']?></p>

            <i><?php echo $post['datetime']?></i>

            <hr>

            <?php } ?>

        </div>

        <div class="col-md-4">

        </div>

    <?php }else{?>

    <div class="content">
        <h1>PHP Sample</h1>
        <p class="lead">PHP sample crud script with login and registration feature.<br> You can change the code as per your requirement.</p>
    </div>

    <?php } ?>

</div>
<?php include('include/footer.php') ?>


