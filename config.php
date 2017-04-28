<?php
//class untuk menghubungkan database
class Config{
    var $dbhost="localhost";
    var $dbuser="root";
    var $dbpass="";
    var $dbname="belajar";
    
    function koneksi(){
        $koneksi=@mysql_connect($this->dbhost,$this->dbuser,$this->dbpass)or die(mysql_error());
        if($koneksi){
            @mysql_select_db($this->dbname)or die(mysql_error());
        }else{
            die(mysql_error("Database Tidak bisa terkoneksi"));
        }
    }
}
?>
