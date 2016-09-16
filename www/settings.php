<?php include 'templates/header.php'; ?>

<?php
session_start();
if (!$_SESSION['username']) {
    header("location: index.php");
}
if ($_GET['msg'] == 'update_failed') { ?>
    <script>alert("updated failed. please try again.");</script>
<?php } else if ($_GET['msg'] == 'update_success') { ?>
    <script>alert("updated successful.");</script>
<?php } ?>

<?php include 'templates/navigation.php'; ?>

    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <h3>settings</h3>
            <form action="be_settings.php" method="POST">
                <div class="form-group">
                    <label for="oldpass">old password</label>
                    <input type="password" class="form-control" name="oldpass" placeholder="old password">
                </div>
                <div class="form-group">
                    <label for="newpass">new password</label>
                    <input type="password" class="form-control" name="newpass" placeholder="new password">
                </div>
                <div class="form-group">
                    <label for="newpassagain">new password again</label>
                    <input type="password" class="form-control" name="newpassagain" placeholder="new password again">
                </div>
                <button type="submit" class="btn btn-default">update password</button>
            </form>
        </div>

    </div>

<?php include 'templates/footer.php'; ?>