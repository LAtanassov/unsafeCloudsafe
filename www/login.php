<?php include 'templates/header.php'; ?>

<?php
session_start();
if ($_SESSION['user']) { // forward to home if user is logged in
    header("location: index.php");
}
?>

<?php include 'templates/navigation.php'; ?>

    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <h2>login</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-default">login</button> or
                <a class="btn btn-success" href="register.php">register</a>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                mysql_connect("localhost", "root", "root") or die (mysql_error());
                mysql_select_db("cloud") or die ("Cannot connect to database");

                $username = $_POST['username'] or '';
                $password = $_POST['password'] or '';

                if ($username == '' or $password == '') {
                    Print '<script>alert("username and password cannot be empty. please try again.");</script>';
                } else {
                    $query = mysql_query("SELECT * FROM user WHERE username='$username' AND password = '$password'");

                    if (mysql_num_rows($query) == 1) {
                        $_SESSION['user'] = $username;
                    } else {
                        Print '<script>alert("login failed.");</script>';
                    }
                }
            }
            ?>
        </div>
    </div>

<?php include 'templates/footer.php'; ?>