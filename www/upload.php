<?php include 'templates/header.php'; ?>

<?php
session_start();
if (!$_SESSION['user']) { // forward to home if user is logged in
    header("location: index.php");
}
?>

<?php include 'templates/navigation.php'; ?>

    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <h2>upload</h2>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="keyword">keyword</label>
                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="keyword">
                </div>
                <div class="form-group">
                    <label for="file">file</label>
                    <input type="file" id="file" name="file">
                </div>
                <div class="form-group">
                    <label for="public">public</label>
                    <input type="checkbox" id="public" name="public">
                </div>
                <button type="submit" class="btn btn-default">upload</button>

            </form>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $upload_dir = './uploads/';
                $file_dir = $upload_dir . ($_POST['public'] ? 'public/' : $_SESSION['user'] . '/') ;
                $file_path = $file_dir . basename($_FILES['file']['name']);

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir);
                }

                if (!is_dir($file_dir)) {
                    mkdir($file_dir);
                }
                $imageFileType = pathinfo($file_path,PATHINFO_EXTENSION);
                $isImage = getimagesize($_FILES["file"]["tmp_name"]);

                if ($isImage) {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {
                        Print '<script>alert("image was uploaded.");</script>';
                    } else {
                        Print '<script>alert("image upload failed.");</script>';
                    }
                } else {
                    Print '<script>alert("not an image.");</script>';
                }
            }

            ?>
        </div>
    </div>

<?php include 'templates/footer.php'; ?>