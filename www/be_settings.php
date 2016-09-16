<?php
session_start();

session_start();

if ($_SESSION['username'] || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: index.php");
}


mysql_connect("localhost", "root", "root") or die (mysql_error());
mysql_select_db("cloud") or die ("Cannot connect to database");

$username = $_SESSION['username'];
$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];

$select = mysql_query("SELECT * FROM user WHERE username='$username' and password = '$oldpass'");

if (mysql_num_rows($select) == 1) {
    $result = mysql_query("UPDATE user SET password='$newpass' WHERE username='$username'");
    if ($result) {
        header("location: settings.php?msg=update_success");
    } else {
        header("location: settings.php?msg=update_failed");
    }
} else {
    header("location: settings.php?msg=update_failed");
}
