<?php
//class untuk anggota
class Anggota { 
    var $nama;
    var $alamat;
    var $telpon;

    function tampildata() { //function tampil data
        $query = "select * from anggota";
        $result = mysql_query($query) or die(mysql_error());
        return $result;
    }

    function tambahdata($nama, $alamat, $telpon) { //function tambah data
        $query = "INSERT INTO anggota(nama, alamat, telpon) VALUES ('$nama','$alamat','$telpon')";
        $result = mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:index.php');
        } else {
            die("Data gagal Disimpan");
        }
    }

    function editdata($id) { //function edit data
        $query = "select * from anggota where id_anggota='$id'";
        $result = mysql_query($query) or die(mysql_error());
        return $result;
    }

    function prosesedit($id, $nama, $alamat, $telpon) { //function proses edit data
        $query = "UPDATE anggota SET nama='$nama', alamat='$alamat',telpon='$telpon' WHERE id_anggota='$id'";
        $result = mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:index.php');
        } else {
            die("Data gagal Disimpan");
        }
    }

    function hapusdata($id) { //function hapus data
        $query = "DELETE FROM anggota WHERE id_anggota='$id'";
        $result = mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:index.php');
        } else {
            die("data gagal dihapus");
        }
    }

    function caridata($cari) { //function cari data
        $query = "select * from anggota where nama like '%$cari%' or alamat like '%$cari%' or telpon like '%$cari%'";
        $result = mysql_query($query) or die(mysql_error());
        return $result;
    }

}

?>
