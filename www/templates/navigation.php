<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/index.php">unsafeCloudSafe</a>
        </div>
        <?php
        if ($_SESSION['user']) { // forward to home if user is logged in
            echo '<div>
                    <ul class="nav navbar-nav">
                        <li><a href="public.php">public data</a></li>
                        <li><a href="private.php">private data</a></li>
                        <li><a href="upload.php">upload</a></li>
                        <li><a href="settings.php">settings</a></li>
                        <li><a href="logout.php">logout</a></li>
                    </ul>
                </div>';
        } else {
            echo '<div>
                    <ul class="nav navbar-nav">
                        <li><a href="login.php">login</a></li>
                        <li><a href="register.php">register</a></li>
                    </ul>
                </div>';
        }
        ?>

    </div>
</nav>