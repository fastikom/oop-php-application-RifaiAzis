<?php
include "config.php"; //memanggil koneksi
include "class_anggota.php"; //memanggil class anggota
$db = new Config(); //koneksi
$db->koneksi();
$dt = new Anggota(); //anggota
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Aplikasi Kontak Dosen</title>
        <link rel='stylesheet' href='style.css' type='text/css' media='all' />
    </head>
    <body>
        <div id="container">
            <div id="header">
            <img src="header.jpg">
            </div>
            <div id="menu"><a href="index.php">Home</a></div>
            <div id="konten">
            <fieldset><legend>Daftar Anggota</legend>
                <form method="post" action="">
                    <input type="text" name="cari" size="50">
                    <input type="submit" name="caridata" value="Cari Data" >
                </form>
                <br>
                

                <?php
                if (isset($_POST['caridata'])) {
                    $cari = $_POST['cari'];
                    $carinya=$dt->caridata($cari); //eksekusi cari anggota
                    ?>
                <h3>Hasil pencarian</h3>
                jumlah data ditemukan sebanyak : <?php echo mysql_num_rows($carinya); ?>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>

                            </tr>
                        </thead>
                         <tbody>
                        <?php
                        $i=1;
                        while ($hasil = mysql_fetch_array($carinya)) {
                            ?>

                           
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $hasil['nama']; ?></td>
                                    <td><?php echo $hasil['alamat']; ?></td>
                                    <td><?php echo $hasil['telpon']; ?></td>

                                </tr> 
                            
                            <?php
                            $i++;
                        }
                        echo "</tbody></table>";
                    }
                    
                    echo"<br>";
                    
                    if (isset($_GET['aksi'])) {
                        if ($_GET['aksi'] == "edit") {
                            $id = $_GET['id'];
                            $edit = mysql_fetch_array($dt->editdata($id)); //mengisi form edit anggota
                            ?>
                            <h3>EDIT DATA</h3>
                            <form action="prosesedit.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <table border="0" cellspacing="0" cellpadding="5" width="100%">

                                    <tr>
                                        <td width="15%">Nama</td>
                                        <td width="2%">:</td>
                                        <td><input type="text" name="nama" value="<?php echo $edit['nama']; ?>" size="50" ></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><input type="text" name="alamat" value="<?php echo $edit['alamat']; ?>" size="50" ></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td><input type="text" name="telpon" value="<?php echo $edit['telpon']; ?>" ></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" name="edit" value="Edit Data" ></td>
                                    </tr>

                                </table>

                            </form>
                            <hr>
                            <?php
                        }
                    }
                    ?>
                    <table align="center" border="1" width="100%" cellspacing="0" cellpadding="5">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $anggota = $dt->tampildata(); //tampil anggota
                            $i = 1;
                            if (mysql_num_rows($anggota) > 0) {
                                while ($a = mysql_fetch_array($anggota)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $a['nama']; ?></td>
                                        <td><?php echo $a['alamat']; ?></td>
                                        <td><?php echo $a['telpon']; ?></td>
                                        <td align="center"><a href="<?php $_SERVER['PHP_SELF']; ?>?aksi=edit&id=<?php echo $a['id_anggota']; ?>">EDIT</a> | <a href="hapus.php?aksi=hapus&id=<?php echo $a['id_anggota']; ?>">HAPUS</a></td>
                                    </tr> 
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4" align="center">Data Kosong</td>

                                </tr>   
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    </fieldset>
                    <fieldset><legend>Tambah Data</legend>
                    <br>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $nama = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $telpon = $_POST['telpon'];
                        $dt->tambahdata($nama, $alamat, $telpon); //eksekusi tambah anggota
                    }
                    ?>
                    <form action="" method="POST">
                        <table border="0" cellspacing="0" cellpadding="5" width="100%">

                            <tr>
                                <td width="15%">Nama</td>
                                <td width="2%">:</td>
                                <td><input type="text" name="nama" size="50"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><input type="text" name="alamat" size="50" ></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td><input type="text" name="telpon" ></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="simpan" value="Simpan Data" ></td>
                            </tr>

                        </table>

                    </form>
                    </fieldset>

                    </div>
                    <div id="footer">
                        <div class="isinya">
                            <i>Muhammad Rifai Azis (2014150055)</i>
                        </div>
                    </div>
            </div>
    </body>
</html>
