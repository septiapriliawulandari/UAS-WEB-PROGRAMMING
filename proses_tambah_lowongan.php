<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lowongan = $_POST['nama_lowongan'];
    $deskripsi = $_POST['deskripsi'];

    // Proses upload file
    $target_dir = "uploads/"; // Folder untuk menyimpan file
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi file gambar
    if (getimagesize($_FILES["foto"]["tmp_name"]) === false) {
        echo "File bukan gambar!";
        $upload_ok = 0;
    }

    // Validasi ukuran file (maksimal 2MB)
    if ($_FILES["foto"]["size"] > 2000000) {
        echo "Ukuran file terlalu besar!";
        $upload_ok = 0;
    }

    // Validasi tipe file
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        echo "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $upload_ok = 0;
    }

    if ($upload_ok == 1) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Simpan data ke database
            $stmt = $conn->prepare("INSERT INTO lowongan (nama_lowongan, deskripsi, foto) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama_lowongan, $deskripsi, $target_file);

            if ($stmt->execute()) {
                echo "Data berhasil disimpan!";
                header("Location: list_lowongan.php");
                exit();
            } else {
                echo "Gagal menyimpan data: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Gagal mengunggah file.";
        }
    }
}
$conn->close();
?>
