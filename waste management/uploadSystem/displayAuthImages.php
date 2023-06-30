<?php
include('connect.php');

$sql_query = "SELECT * FROM authImages";
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
    <h1>Authenticated Images ( showing in website )</h1>
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
                    <form action="delAuthImages.php" method="post">
                        <input type="hidden" name="image_id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Unpublish & Delete</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
