<?php
session_start();
if ($_SESSION['username']) { // forward to home if user is logged in
    echo '<pre>redirect to upload</pre>';
    header("location: upload.php");
} else {

    echo '<pre>redirect to login</pre>';
    header("location: login.php");
}
?>