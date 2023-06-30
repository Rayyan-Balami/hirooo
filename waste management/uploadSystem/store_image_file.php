<?php include('./connect.php'); ?>

<?php

// to display errors because my mac is not displaying errors by default
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['imageUpload'])) {
    // data gathered from image upload form
    $image_title = $_POST['imageTitle'];
    $image_description = $_POST['imageDescription'];
    $image_file = $_FILES['imageFile'];

    // Displaying image title, description, and image data array
    // echo "<br>";
    // echo "Image Title: " . $image_title;
    // echo "<br>";
    // echo "Image Description: " . $image_description;
    // echo "<br>";
    // echo "Image Data Array: ";
    // print_r($image_file);

    // image file data
    $image_file_name = $image_file['name'];
    $image_file_tmp = $image_file['tmp_name'];
    $image_file_size = $image_file['size'];
    $image_file_error = $image_file['error'];
    $image_file_type = $image_file['type'];

    // image file extension separating
    $image_file_extension = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));
    // echo "<br>" . "image extension: ";
    // print_r($image_file_extension);

    // Validate extension
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($image_file_extension, $allowed_extensions)) {
        // Check the file size
        $max_file_size = 5 * 1024 * 1024; // 5MB in bytes
        if ($image_file_size > $max_file_size) {
            echo "<script>alert('File size exceeds the limit of 5MB.'); window.location.href = 'uploadImage.php';</script>";
            exit; // Exit the script if the file size exceeds the limit
        } else {
            // echo "Extension matched";
            $compressed_path = 'images/' . $image_file_name;

            // Compress the image based on extension
            switch ($image_file_extension) {
                case 'jpg':
                case 'jpeg':
                    $image = imagecreatefromjpeg($image_file_tmp);
                    imagejpeg($image, $compressed_path, 40);
                    break;
                case 'png':
                    $image = imagecreatefrompng($image_file_tmp);
                    imagepng($image, $compressed_path, 6);
                    break;
                case 'gif':
                    $image = imagecreatefromgif($image_file_tmp);
                    imagegif($image, $compressed_path);
                    break;
                default:
                    break;
            }

            imagedestroy($image);

            // Store the compressed image path in the database using prepared statement
            $sql_query = "INSERT INTO images (username, class, section, title, description, image_path) VALUES ('', '', '', ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql_query);
            mysqli_stmt_bind_param($stmt, 'sss', $image_title, $image_description, $compressed_path);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<script>alert('Image uploaded successfully. Admin approval in progress'); window.location.href = '../website/index.php';</script>";
            } else {
                echo "<script>alert('Data not inserted'); window.location.href = 'uploadImage.php';</script>";
            }
        }
    } else {
        echo "<script>alert('Extension not matched.'); window.location.href = 'uploadImage.php';</script>";

        exit; // Exit the script if the extension doesn't match
    }
}

?>
