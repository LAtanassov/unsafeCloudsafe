<?php
session_start();

if ($_SESSION['username'] || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: index.php");
}


mysql_connect("localhost", "root", "root") or die (mysql_error());
mysql_select_db("cloud") or die ("Cannot connect to database");

$username = $_POST['username'] or '';
$password = $_POST['password'] or '';

if ($username == '' or $password == '') {
    Print '<script>alert("username and password cannot be empty. please try again.");</script>';
} else {
    $result = mysql_query("SELECT * FROM user WHERE username='$username' AND password = '$password'");

    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_assoc($result);

        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['uid'] = $row['uid'];
        echo '<pre>success </pre>';
        header("location: index.php");
    } else {
        echo '<pre>sql error </pre>';
        header("location: login.php?msg=login_failed");
    }

}


?>