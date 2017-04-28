<?php

include "config.php"; //memanggil koneksi
include "class_anggota.php"; //memanggil class anggota
$db = new Config(); //koneksi
$db->koneksi(); // eksekusi koneksi
$dt = new Anggota(); //anggota
	if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telpon = $_POST['telpon'];
        $dt->prosesedit($id, $nama, $alamat, $telpon); //eksekusi edit anggota
	}
?>