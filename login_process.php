<?php
// Mulai sesi
session_start();

// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webchili";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mengambil data pengguna berdasarkan username
$sql = "SELECT * FROM users WHERE Username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah pengguna ditemukan
if ($result->num_rows > 0) {
    // Ambil data pengguna
    $user = $result->fetch_assoc();
    
    // Verifikasi password
    if (password_verify($password, $user['Password'])) {
        // Jika password benar, mulai sesi dan arahkan ke halaman perhitungan
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['Username'];
        
        // Redirect ke halaman perhitungan.php setelah login berhasil
        header("Location: perhitungan.php");
        exit(); // Pastikan script berhenti setelah redirect
    } else {
        // Jika password salah, redirect ke halaman login dengan error
        header("Location: login.php?error=true");
        exit();
    }
} else {
    // Jika username tidak ditemukan, redirect ke halaman login dengan error
    header("Location: login.php?error=true");
    exit();
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>


