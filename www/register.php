<?php include 'templates/header.php'; ?>

<?php
session_start();
if ($_SESSION['username']) { // forward to home if user is logged in
    header("location: index.php");
}
if ($_GET['msg'] == 'registration_failed') {?>
    <script>alert("registration failed. please try again.");</script>
<?php } ?>

<?php include 'templates/navigation.php'; ?>

    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <h2>registration</h2>
            <form action="be_register.php" method="POST">
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-default">register</button>
            </form>
        </div>
    </div>

<?php include 'templates/footer.php'; ?>