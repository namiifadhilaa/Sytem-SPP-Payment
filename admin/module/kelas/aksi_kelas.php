<?php

    include "../../../config/koneksi.php";

    $module = $_GET['module'] ?? '';
    $act = $_GET['act'] ?? '';

    //hapus jurusan

    if($module=='kelas' AND $act=='hapus'){
    
            $query = " DELETE FROM kelas WHERE id_kelas=$_GET[id] ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            } else {
                header('location:../../media.php?module='.$module);
            }
    }

    //tambah data jurusan
    else if ($module=='kelas' AND $act=='input'){
        

        
        $query = " INSERT INTO kelas(nama_kelas,kompetensi_keahlian) VALUES ('$_POST[nama_kelas]','$_POST[kompetensi_keahlian]')";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }

    //update data
    else if ($module=='kelas' AND $act=='update'){
    
        $query = " UPDATE kelas SET nama_kelas='$_POST[nama_kelas]',kompetensi_keahlian='$_POST[kompetensi_keahlian]' WHERE id_kelas='$_POST[id_kelas]'";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }
    



    
    ?>

