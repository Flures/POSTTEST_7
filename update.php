<?php require("includes/connection.php") ?>

<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>



<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM accessories WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "<script>alert('Aksesoris tidak ditemukan')</script>";
        echo "<script>document.location = 'dashboard.php'</script>";
        return;
    }
}

?>

<?php

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];


    if (file_exists($_FILES["image"]["tmp_name"])) {
        $targetFile = basename($_FILES["image"]["name"]);
        $tempTargetFile = $_FILES["image"]["tmp_name"];
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validasi apakah file yang diupload adalah image
        $validExtensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $validExtensions)) {
            $targetFileDir = "uploads/";
            $targetFileName = $targetFileDir . date("Y-m-d") . "-" . $name . "." . $imageFileType;

            echo "File berhasil di upload";

        } else {
            echo "Hanya dapat mengupload file jpg, jpeg, png, dan gif.";
        }
        $result = mysqli_query($conn, "UPDATE accessories SET name = '$name', description = '$description', price = '$price', image = '$targetFileName' WHERE id = '$id'");


    } else {
        $result = mysqli_query($conn, "UPDATE accessories SET name = '$name', description = '$description', price = '$price' WHERE id = '$id'");
    }
    if (!$result) {
        echo "<script>alert('Gagal mengupdate aksesoris')</script>";
        return;
    } else {
        echo "<script>alert('Berhasil mengupdate aksesoris')</script>";
        echo "<script>document.location = 'dashboard.php' </script>";
    }
    move_uploaded_file($tempTargetFile, $targetFileName);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include('includes/navbar.php'); ?>
    </header>

    <section class="form-section">
        <div class="container-form">
            <h2>Update Product</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input name="id" hidden value="<?= $_GET['id'] ?>" type="text">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= $row['name'] ?>" required>

                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="<?= $row['description'] ?>" required>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="<?= $row['price'] ?>" required>

                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" value="<?= $row['image'] ?>" accept="image/*">

                <button type="submit" name="update" value="update">Submit</button>
            </form>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <script src="script.js" ;></script>
</body>

</html>