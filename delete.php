<?php require("includes/connection.php") ?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = mysqli_query($conn, "DELETE FROM accessories WHERE id = '$id'");

    if (!$result) {
        echo "<script>alert('Gagal menghapus produk.')</script>";
        return;
    } else {
        echo "<script>alert('Berhasil menghapus produk.')</script>";
        echo "<script>document.location = 'dashboard.php'</script>";
    }
}
?>