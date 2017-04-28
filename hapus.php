<?php

include "config.php"; //memanggil koneksi
include "class_anggota.php"; //memanggil class anggota
$db = new Config(); //koneksi
$db->koneksi(); // eksekusi koneksi
$dt = new Anggota(); //anggota
if (isset($_GET['aksi']) == "hapus") {    //eksekusi anggota
    $dt->hapusdata($_GET['id']);
}
?>