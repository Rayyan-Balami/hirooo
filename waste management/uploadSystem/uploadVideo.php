<?php include('./connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Uplaod</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <form action="store_video_file.php" method="post" enctype="multipart/form-data">
            <img class="samriddhi"src="samriddhi.png" alt="samriddhi logo" title="Samriddhi">
            <h1>Video Upload</h1>
            <div class="textarea-div">
            <textarea name="videoTitle" placeholder="Title for video . . ." required ></textarea>
            <textarea name="videoDescription" placeholder="Descreption for video . . ." required></textarea>
            </div>
            <div class="input-div">
                <input type="file" name="video_file" id="video" required title="video">
            </div>
            <button type="submit" name="videoUpload">Submit</button>
        </form>
    </div>
</body>
<script>
    const textareas = document.getElementsByClassName("textarea-div");
    console.log(textareas);
    for (let i = 0; i < textareas.length; i++) {
        textareas[i].addEventListener("keyup", e => {
            e.target.style.height = "auto";
            let scHeight = e.target.scrollHeight;
            e.target.style.height = ${scHeight}px;
        });
    }
</script>


</html>