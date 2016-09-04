<?php
session_start();
if(!$_SESSION['user']) {
    header("location:index.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST") {

    mysql_connect("localhost", "root", "root") or die(mysql_error());
    mysql_select_db("cloud") or die("Cannot connect to database");

    $user_id = mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE username ='$username'"))['id'];

    Print '<script>alert("debug");</script>'; // Prompts the user
    $username = $_SESSION['user'];
    $details = $_POST['details'];
    $decision = $_POST['public'] != null ? true : false;
    echo $username . ' ' . $details . ' ' . $decision . ' ' . $user_id;

    mysql_query("INSERT INTO list (details, user_id, public) VALUES ('$details','$user_id', '$decision')");
    header("location:home.php");
}
else
{
    header("location:home.php");
}
?>