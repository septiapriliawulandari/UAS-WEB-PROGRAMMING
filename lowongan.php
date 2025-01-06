<?php
include 'db.php'; // File koneksi database

// Query untuk mendapatkan data lowongan
$sql = "SELECT * FROM lowongan ORDER BY tanggal_posting DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Lokerin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container d-flex align-items-center">
            <img src="img/logo.png" alt="Lokerin Logo" class="mr-3" width="50" height="50">
            <h1 class="h4 mb-0">Lokerin</h1>
            <nav class="ml-auto">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="lowongan.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pasang_lowongan.html">Pasang Lowongan Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="cari_lowongan.html">Cari Lowongan Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="tips_loker.html">Tips Loker</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="kontak.html">Kontak</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="hero-title">Cari Lowongan Kerja</h1>
                    <p class="hero-description">Temukan pekerjaan yang akan Anda sukai.</p>
                    <div>
                        <div class="hero-search">
                            <input type="text" class="form-control" placeholder="Ketik pekerjaan atau lokasi...">
                            <button class="btn btn-success btn-block mt-2">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="jobs">
        <div class="container">
            <h2 class="section-title">Lowongan Terbaru</h2>
            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                    <img src="img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>" class="logo" width="200" height="200">
                                    <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                                    <p class="card-text"><small class="text-muted">Diposting pada: <?php echo $row['tanggal_posting']; ?></small></p>
                                    <a href="#" class="btn btn-primary">Lamar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-md-12">
                        <p class="text-center">Tidak ada lowongan tersedia saat ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

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
