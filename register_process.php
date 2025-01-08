<?php
// Konfigurasi koneksi database
$servername = "localhost";  // Sesuaikan dengan nama server MySQL Anda
$username = "root";         // Sesuaikan dengan username MySQL Anda
$password = "";             // Sesuaikan dengan password MySQL Anda
$dbname = "webchili";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password

// Query untuk memasukkan data ke dalam tabel
$sql = "INSERT INTO users (Nama, Email, Username, Password) VALUES ('$nama', '$email', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil!";
    // Redirect ke halaman login atau halaman sukses lainnya
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
