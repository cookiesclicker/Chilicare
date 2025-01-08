<?php
// process_sensor.php

// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "webchili";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data terbaru dari tabel sensor
$query_sensor = mysqli_query($conn, "SELECT * FROM sensor ORDER BY id DESC LIMIT 1");
$sensor_data = mysqli_fetch_assoc($query_sensor);

if (!$sensor_data) {
    die("Error: Data sensor tidak ditemukan.");
}

$kelembaban = (float)$sensor_data['kelembaban'];
$suhu = (float)$sensor_data['suhu'];
$kesuburan = (float)$sensor_data['kesuburan'];

// Klasifikasi gejala
$G001 = ($kelembaban <= 30) ? 1 : 0;
$G004 = ($kelembaban > 70) ? 1 : 0;
$G006 = ($kelembaban > 30 && $kelembaban <= 70) ? 1 : 0;

$G002 = ($suhu <= 20) ? 1 : 0;
$G003 = ($suhu > 30) ? 1 : 0;
$G005 = ($suhu > 20 && $suhu <= 30) ? 1 : 0;

$G007 = ($kesuburan > 70) ? 1 : 0;
$G008 = ($kesuburan > 30 && $kesuburan <= 70) ? 1 : 0;
$G009 = ($kesuburan <= 30) ? 1 : 0;

// Ambil data basis kasus
$query = mysqli_query($conn, "SELECT * FROM basis_kasus");
$bobot = [5, 3, 5, 5, 3, 3, 5, 3, 5];
$gejala_baru = [$G001, $G002, $G003, $G004, $G005, $G006, $G007, $G008, $G009];

// Perhitungan similarity
$max_similarity = 0;
$hasil_solusi = '';
$kasus_terdekat = [];

while ($kasus = mysqli_fetch_assoc($query)) {
    $similarity = 0;
    $total_bobot = array_sum($bobot);

    foreach ($gejala_baru as $i => $nilai) {
        $cocok = ($nilai == $kasus["G00" . ($i + 1)]) ? 1 : 0;
        $similarity += $bobot[$i] * $cocok;
    }

    $similarity /= $total_bobot;

    if ($similarity > $max_similarity) {
        $max_similarity = $similarity;
        $hasil_solusi = $kasus['solusi'];
        $kasus_terdekat = $kasus;
    }
}

// Ambil deskripsi solusi
$solusi_query = mysqli_query($conn, "SELECT deskripsi_solusi FROM solusi WHERE id_solusi = '$hasil_solusi'");
$solusi = mysqli_fetch_assoc($solusi_query);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan CBR</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Hasil Perhitungan CBR</h2>
        <h3>Data Sensor Terbaru:</h3>
        <ul>
            <li><strong>Kelembaban Tanah:</strong> <?php echo htmlspecialchars($kelembaban); ?></li>
            <li><strong>Suhu Udara:</strong> <?php echo htmlspecialchars($suhu); ?></li>
            <li><strong>Kesuburan Tanah:</strong> <?php echo htmlspecialchars($kesuburan); ?></li>
        </ul>

        <h3>Kasus yang Paling Mirip:</h3>
        <ul>
            <li><strong>ID Kasus:</strong> <?php echo htmlspecialchars($kasus_terdekat['id_kasus']); ?></li>
            <li><strong>Nilai Similarity Tertinggi:</strong> <?php echo round($max_similarity, 2); ?></li>
        </ul>

        <h3>Solusi Terbaik:</h3>
        <p><?php echo htmlspecialchars($solusi['deskripsi_solusi']); ?></p>
    </div>
</body>

</html>
