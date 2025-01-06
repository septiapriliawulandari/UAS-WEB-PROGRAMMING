<?php
// Memasukkan PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Pastikan file ini di-include jika Anda tidak menggunakan Composer
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

// Menangani form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah semua data ada
    if (isset($_POST['nama_perusahaan'], $_POST['judul_lowongan'], $_POST['deskripsi'], $_POST['email_kontak'])) {
        // Ambil data dari formulir
        $nama_perusahaan = $_POST['nama_perusahaan'];
        $judul_lowongan = $_POST['judul_lowongan'];
        $deskripsi = $_POST['deskripsi'];
        $email_kontak = $_POST['email_kontak'];

        // Validasi email
        if (!filter_var($email_kontak, FILTER_VALIDATE_EMAIL)) {
            echo "Email tidak valid.";
            exit();
        }

        // Mengambil data gambar jika ada
        $gambar_lowongan = isset($_FILES['gambar_lowongan']) ? $_FILES['gambar_lowongan'] : null;

        // Membuat objek PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Ganti dengan SMTP server Anda (misal: smtp.gmail.com)
            $mail->SMTPAuth = true;
            $mail->Username = 'septiapriliawulandari1@gmail.com'; // Ganti dengan email Anda
            $mail->Password = 'yioc tozk niti gqyg'; // Ganti dengan password email Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Pengaturan pengirim dan penerima
            $mail->setFrom('septiapriliawulandari1@gmail.com', 'Lokerin'); // Ganti dengan email pengirim
            $mail->addAddress('septiapriliawulandari1@gmail.com'); // Email tujuan, misalnya pengelola lowongan

            // Subjek dan isi email
            $mail->isHTML(true);
            $mail->Subject = 'Pasang Lowongan Baru - ' . $judul_lowongan;
            $mail->Body    = "Nama Perusahaan: {$nama_perusahaan}<br>
                              Judul Lowongan: {$judul_lowongan}<br>
                              Deskripsi: {$deskripsi}<br>
                              Email Kontak: {$email_kontak}";

            // Menambahkan gambar jika ada
            if ($gambar_lowongan && $gambar_lowongan['error'] == 0) {
                $mail->addAttachment($gambar_lowongan['tmp_name'], $gambar_lowongan['name']);
            }

            // Kirim email
            if ($mail->send()) {
                echo 'Lowongan berhasil dipasang dan email telah dikirim!';
            } else {
                echo 'Gagal mengirim email.';
            }
        } catch (Exception $e) {
            echo "Pesan tidak dapat dikirim. Kesalahan: {$mail->ErrorInfo}";
        }
    } else {
        echo "Data tidak lengkap!";
    }
}

?>
