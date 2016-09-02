<html>
<head>
    <title>My first PHP Website</title>
</head>
<body>
<h2>Registration Page</h2>
<a href="index.php">Click here to go back</a><br/><br/>
    <form action="register.php" method="POST">
        Enter Username: <input type="text" name="username" required="required" /> <br/>
        Enter password: <input type="password" name="password" required="required" /> <br/>
        <input type="submit" value="Register"/>
    </form>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    mysql_connect("localhost", "root", "root");
    mysql_select_db("cloud");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_exists = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE username ='$username'"));

    if ($user_exists) {
        Print '<script>alert("username has been taken!")</script>';
    } else {
        mysql_query("INSERT INTO user (username, password) VALUES ('$username', '$password')");
        Print '<script>alert("successfully registered");</script>';
        Print '<script>window.location.assign("register.php")</script>';

    }
}
?>