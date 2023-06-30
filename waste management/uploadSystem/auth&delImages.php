<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_id = $_POST['image_id'];
    $username = $_POST['username'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_path = $_POST['image_path'];

    // Insert the data into the authImages table
     $sql_query = "INSERT INTO authImages (username, class, section, title, description, image_path) VALUES ('', '', '', ?, ?, ?)";
     $stmt = mysqli_prepare($conn, $sql_query);
     mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $image_path);
     $result = mysqli_stmt_execute($stmt);

    // If the insertion was successful, delete the row from the images table
    if ($result) {
        $delete_query = "DELETE FROM images WHERE id = $image_id";
        $delete_result = mysqli_query($conn, $delete_query);
        if ($delete_result) {
            $message = "Authorization successful. Image moved to authImages table. Image deleted from images table.";
        } else {
            $message = "Failed to authorize the image. Failed to delete the image.";
        }
    } else {
        $message = "Failed to authorize the image.";
    }

    echo "<script>
            alert('$message');
            window.location.href = 'displayImages.php';
          </script>";
}
?>
