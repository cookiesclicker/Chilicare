<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Sensor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sistem Perawatan Cabai</h1>
        <h3>Masukkan Nilai Sensor</h3>
        <form action="process_sensor.php" method="POST">
            <label for="kelembaban">Kelembaban Tanah (%)</label>
            <input type="number" id="kelembaban" name="kelembaban" min="0" max="100" required>
            
            <label for="suhu">Suhu Udara (&deg;C)</label>
            <input type="number" id="suhu" name="suhu" min="0" max="50" required>
            
            <label for="kesuburan">Kesuburan Tanah (%)</label>
            <input type="number" id="kesuburan" name="kesuburan" min="0" max="100" required>
            
            <button type="submit">Proses Data</button>
        </form>
    </div>
    <footer>
        &copy; 2024 Sistem Perawatan Cabai | Dibuat oleh Anda
    </footer>
</body>
</html>
