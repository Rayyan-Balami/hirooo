<?php include('./connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Uplaod</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <form action="store_image_file.php" method="post" enctype="multipart/form-data">
            <img class="samriddhi"src="samriddhi.png" alt="samriddhi logo" title="Samriddhi">
            <h1>Image Upload</h1>
            <div class="textarea-div">
            <textarea name="imageTitle" placeholder="Title for image . . ." required ></textarea>
            <textarea name="imageDescription" placeholder="Descreption for image . . ." required></textarea>
            </div>
            <div class="input-div">
                <input type="file" name="imageFile" id="image" required title="Image">
            </div>
            <button type="submit" name="imageUpload">Submit</button>
        </form>
    </div>
</body>
<script>
  const textareas = document.querySelectorAll("textarea");
  textareas.forEach((textarea) => {
    textarea.addEventListener("input", (e) => {
      e.target.style.height = "auto";
      e.target.style.height = `${e.target.scrollHeight}px`; // Account for padding and border
    });

    textarea.style.height = `${textarea.scrollHeight}px`; // Initialize height
  });
</script>






</html>