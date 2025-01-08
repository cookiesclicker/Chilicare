<?php
$koneksi = mysqli_connect("localhost", "root", "", "webchili");

//baca data dari tabel sensor
$sql = mysqli_query($koneksi, "select * from sensor order by id desc");

//baca data paling atas
$data = mysqli_fetch_array($sql);
$kelembaban = $data['kelembaban'];

//uji, apabila nilai kelembaban belum ada, maka anggap kelembaban = 0
if ($kelembaban == "") $kelembaban = 0;

//cetak kelembaban
echo $kelembaban;
