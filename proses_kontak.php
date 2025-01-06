<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['nama']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['pesan']);

    if (!$email) {
        echo "Alamat email tidak valid.";
        exit;
    }
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pesan = isset($_POST['pesan']) ? $_POST['pesan'] : '';

    if (empty($nama) || empty($email) || empty($pesan)) {
        echo 'Semua field wajib diisi!';
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Email tidak valid.';
        exit;
    }

    $mail = new PHPMailer(true);

try {
    // Konfigurasi server email
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'septiapriliawulandari1@gmail.com'; // Ganti dengan email Gmail Anda
    $mail->Password = 'yioc tozk niti gqyg'; // Ganti dengan password aplikasi Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Pengaturan email pengirim dan penerima
    $mail->setFrom('septiapriliawulandari1@gmail.com', 'Lokerin');
    $mail->addAddress('septiapriliawulandari1@gmail.com'); // Ganti dengan email penerima (misalnya admin)
    

    $mail->Subject = 'Pesan dari Lokerin';
    $mail->Body = "Nama: $name\nEmail: $email\nPesan: $message";

    // Kirim email
    
 
if ($mail->send()) {
        echo "Pesan berhasil dikirim!";
    }
} catch (Exception $e) {
    echo "Pesan gagal dikirim. Kesalahan: {$mail->ErrorInfo}";
}
}