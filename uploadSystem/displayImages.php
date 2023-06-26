<?php
include('connect.php');

$sql_query = "SELECT * FROM images";
$result = mysqli_query($conn, $sql_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Authentication</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Image Authentication</h1>
    <table>
        <tr>
            <th>User</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            $class = $row['class'];
            $section = $row['section'];
            $title = $row['title'];
            $description = $row['description'];
            $image_path = $row['image_path'];
            ?>
            <tr>
                <td><?php echo "$username, $class, $section"; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $description; ?></td>
                <td><img src="<?php echo $image_path; ?>" alt="image" width="100"></td>
                <td>
                    <form action="auth&delImages.php" method="post">
                        <input type="hidden" name="image_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" name="class" value="<?php echo $class; ?>">
                        <input type="hidden" name="section" value="<?php echo $section; ?>">
                        <input type="hidden" name="title" value="<?php echo $title; ?>">
                        <input type="hidden" name="description" value="<?php echo $description; ?>">
                        <input type="hidden" name="image_path" value="<?php echo $image_path; ?>">
                        <button type="submit">Authorize</button>
                    </form>
                    <form action="delImages.php" method="post">
                        <input type="hidden" name="image_id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
