<?php
$koneksi = mysqli_connect("localhost", "root", "", "webchili");

//baca data dari tabel sensor
$sql = mysqli_query($koneksi, "select * from sensor order by id desc");

//baca data paling atas
$data = mysqli_fetch_array($sql);
$suhu = $data['suhu'];

//uji, apabila nilai suhu belum ada, maka anggap suhu = 0
if ($suhu == "") $suhu = 0;

//cetak suhu
echo $suhu;
