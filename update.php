<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM lowongan WHERE id = $id");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lowongan - Lokerin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1 class="h4 mb-0">Edit Lowongan</h1>
        </div>
    </header>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="mb-4">Edit Informasi Lowongan</h3>
                <form action="update_process.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                    <!-- Judul -->
                    <div class="form-group">
                        <label for="judul">Judul Lowongan</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $data['judul']; ?>" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Lowongan</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" required><?php echo $data['deskripsi']; ?></textarea>
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar">Gambar (Opsional)</label>
                        <input type="file" class="form-control-file" name="gambar" id="gambar">
                    </div>

                    <!-- Button -->
                    <button type="submit" name="submit" class="btn btn-success btn-block">Update Lowongan</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container text-center">
            &copy; 2024 Lokerin. Semua Hak Dilindungi.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
