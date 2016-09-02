<html>
<head>
    <title>My first PHP Website</title>
</head>
<?php
session_start(); //starts the session
if ($_SESSION['user']) { // checks if the user is logged in
} else {
    header("location: index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>
<body>
<h2>Home Page</h2>
<p>Hello <?php Print $user ?></p>
<a href="logout.php"> click here to logout</a>
<form action="add.php">
    Add more to list: <input type="text" name="details"/><br/>
    public post ? <input type="checkbox" name="public[]" value="yes"/><br/>
    <input type="submit" value="Add to list"/>
</form>
<h2 align="center">My list</h2>
<table border="1px" width="100%">
    <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

</table>
</body>
</html>