<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];

    if ($gambar) {
        $target = "img/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $sql = "UPDATE lowongan SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
    } else {
        $sql = "UPDATE lowongan SET judul='$judul', deskripsi='$deskripsi' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
