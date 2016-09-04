<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$bool = true;

mysql_connect("localhost", "root", "root") or die (mysql_error());
mysql_select_db("cloud") or die ("Cannot connect to database");
$query = mysql_query("SELECT * FROM user WHERE username='$username'");
$exists = mysql_num_rows($query);
$table_users = "";
$table_password = "";
if ($exists > 0) {
    while ($row = mysql_fetch_assoc($query)) // display all rows from query
    {
        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
        $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
    }
    if (($username == $table_users) && ($password == $table_password))// checks if there are any matching fields
    {
        if ($password == $table_password) {
            $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
            header("location: home.php"); // redirects the user to the authenticated home page
        }
    } else {
        Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
} else {
    Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
}
?>