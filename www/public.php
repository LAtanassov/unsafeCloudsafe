<?php include 'templates/header.php'; ?>

<?php
session_start();
if (!$_SESSION['username']) { // forward to home if user is logged in
    header("location: index.php");
}
?>

<?php include 'templates/navigation.php'; ?>

    <div class="container">
        <?php
        $fileSystemIterator = new FilesystemIterator('/tmp/uploads/public');

        foreach ($fileSystemIterator as $fileInfo) {
            echo '<div class="col-md-4">
                      <a class="thumbnail">
                        <img src="/tmp/uploads/public/' . $fileInfo->getFilename() . '" style="width:150px;height:150px">
                      </a>
                    </div>';
        }

        ?>
    </div>

<?php include 'templates/footer.php'; ?>