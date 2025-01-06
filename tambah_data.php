<form action="create.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="judul" placeholder="Judul Lowongan" required>
    <textarea name="deskripsi" placeholder="Deskripsi Lowongan" required></textarea>
    <input type="file" name="gambar" required>
    <button type="submit" name="submit">Tambah</button>
</form>
