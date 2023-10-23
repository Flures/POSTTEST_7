<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require("includes/connection.php") ?>
    <header>
        <?php include("includes/navbar-admin.php") ?>
    </header>

    <section class="product-list-container">
        <div class="product-list">
            <h2>Product List</h2>
            <h1> Tanggal :
                <?php date_default_timezone_set("Asia/Makassar");
                echo date(" l , d-F-Y")
                    ?>
                <br>
                Jam :
                <?php date_default_timezone_set("Asia/Makassar");
                echo date("H:i:s") ?>
                Timezone:
                <?php date_default_timezone_set("Asia/Makassar");
                echo date_default_timezone_get() ?>
            </h1>


            <table>
                <tr>
                    <th>Gambar</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Opsi</th>
                </tr>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM accessories");
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <img class="product-image" src="<?= $row['image'] ?>" width="100px" alt="">
                        </td>

                        <td>
                            <?= $row['id'] ?>
                        </td>

                        <td>
                            <?= $row['name'] ?>
                        </td>

                        <td>
                            <?= $row['price'] ?>
                        </td>

                        <td>
                            <?= $row['description'] ?>
                        </td>

                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>">
                                <button class="update-btn">Update</button></a>

                            <a href="delete.php?id=<?= $row['id'] ?>">
                                <button class="delete-btn">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
    <script src="script.js" ;></script>
</body>

</html>