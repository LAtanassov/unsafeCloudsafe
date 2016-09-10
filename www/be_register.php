<?php
session_start();

session_start();

if ($_SESSION['username'] || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: index.php");
}


mysql_connect("localhost", "root", "root") or die (mysql_error());
mysql_select_db("cloud") or die ("Cannot connect to database");

$username = $_POST['username'];
$password = $_POST['password'];

$select = mysql_query("SELECT * FROM user WHERE username='$username'");

if (mysql_num_rows($select) == 0) {
    $result = mysql_query("INSERT INTO user (username, password) VALUES ('$username', '$password')");
    if ($result) {
        header("location: index.php");
    } else {
        header("location: register.php?msg=registration_failed");
    }
} else {
    header("location: register.php?msg=registration_failed");
}
