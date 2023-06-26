<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_id = $_POST['image_id'];

    // Delete the row from the images table
    $delete_query = "DELETE FROM images WHERE id = $image_id";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        $message = "Image deleted successfully.";
    } else {
        $message = "Failed to delete the image.";
    }

    echo "<script>
            alert('$message');
            window.location.href = 'displayImages.php';
          </script>";
}
?>
