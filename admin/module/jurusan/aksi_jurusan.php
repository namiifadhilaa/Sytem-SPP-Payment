<?php

    include "../../../config/koneksi.php";

    $module = $_GET['module'] ?? '';
    $act = $_GET['act'] ?? '';

    //hapus jurusan

    if($module=='jurusan' AND $act=='hapus'){
    
            $query = " DELETE FROM jurusan WHERE id_jurusan=$_GET[id] ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            } else {
                header('location:../../media.php?module='.$module);
            }
    }

    //tambah data jurusan
    else if ($module=='jurusan' AND $act=='input'){
    
        $query = " INSERT INTO jurusan(jurusan,nama_jurusan) VALUES ('$_POST[jurusan]','$_POST[nama_jurusan]')";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }

    //update data
    else if ($module=='jurusan' AND $act=='update'){
    
        $query = " UPDATE jurusan SET jurusan='$_POST[jurusan]',nama_jurusan='$_POST[nama_jurusan]' WHERE id_jurusan='$_POST[id_jurusan]'";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }
    



    
    ?>

