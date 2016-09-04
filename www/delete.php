<html>
<head>
    <title>My first PHP Website</title>
</head>
<?php
session_start(); //starts the session
if(!$_SESSION['user']){ // checks if the user is logged in
    header("location: index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>
</html>
