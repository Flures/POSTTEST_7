<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require("includes/connection.php") ?>
    <header>
        <?php include('includes/navbar.php'); ?>
    </header>

    <section class="form-section">
        <div class="container-form">
            <h2>Create New Product</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>

                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*">

                <button type="submit" name="create" value="create">Submit</button>
            </form>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <script src="script.js" ;></script>
</body>

</html>

<?php
// Mengecek apakah field input terisi
if (isset($_POST["create"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];




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
    $result = mysqli_query($conn, "INSERT INTO accessories (name, description, price, image) VALUES ('$name', '$description', '$price', '$targetFileName')");
    if (!$result) {
        echo "<script>alert('Gagal menambahkan aksesoris')</script>";
        return;
    } else {
        echo "<script>alert('Berhasil menambahkan aksesoris')</script>";
        echo "<script>document.location = 'dashboard.php' </script>";
    }
    move_uploaded_file($tempTargetFile, $targetFileName);

}

?>