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
            <h2>registration</h2>
            <form action="register.php" method="POST">
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

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                mysql_connect("localhost", "root", "root") or die (mysql_error());
                mysql_select_db("cloud") or die ("Cannot connect to database");

                $username = $_POST['username'];
                $password = $_POST['password'];

                $select = mysql_query("SELECT * FROM user WHERE username='$username'");

                if (mysql_num_rows($select) == 0) {
                    $insert = mysql_query("INSERT INTO user (username, password) VALUES ('$username', '$password')");
                    $_SESSION['user'] = $username;
                    Print '<script>alert("registration successful.");</script>';
                } else {
                    Print '<script>alert("user already exists.");</script>';
                }
            }
            ?>

        </div>
    </div>

<?php include 'templates/footer.php'; ?>