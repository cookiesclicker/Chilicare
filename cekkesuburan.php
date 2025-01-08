<?php
$koneksi = mysqli_connect("localhost", "root", "", "webchili");

//baca data dari tabel sensor
$sql = mysqli_query($koneksi, "select * from sensor order by id desc");

//baca data paling atas
$data = mysqli_fetch_array($sql);
$kesuburan = $data['kesuburan'];

//uji, apabila nilai kesuburan belum ada, maka anggap kesuburan = 0
if ($kesuburan == "") $kesuburan = 0;

//cetak kelembaban
echo $kesuburan;
