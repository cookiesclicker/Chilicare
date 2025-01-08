<?php
// Konfigurasi koneksi database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "webchili";

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $dbname);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Periksa parameter yang dikirim
if (isset($_GET['suhu']) && isset($_GET['kelembaban']) && isset($_GET['kesuburan'])) {
    $suhu = $_GET['suhu'];
    $kelembaban = $_GET['kelembaban'];
    $kesuburan = $_GET['kesuburan'];

    // Validasi data
    if (is_numeric($suhu) && is_numeric($kelembaban) && is_numeric($kesuburan)) {
        // Simpan data ke tabel
        $query = "INSERT INTO sensor (suhu, kelembaban, kesuburan) VALUES ('$suhu', '$kelembaban', '$kesuburan')";
        if (mysqli_query($koneksi, $query)) {
            echo "Berhasil dikirim. Data: Suhu=$suhu, Kelembaban=$kelembaban, Kesuburan=$kesuburan";

            // Panggil perhitungan hasil dari kode utama
            include 'perhitungan.php'; // Pastikan nama file sudah benar
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal Dikirim: Data tidak valid.";
    }
} else {
    echo "Gagal Dikirim: Parameter tidak lengkap.";
}

// Tutup koneksi
mysqli_close($koneksi);
