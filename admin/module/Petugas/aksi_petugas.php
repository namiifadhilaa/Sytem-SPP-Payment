<?php

    include "../../../config/koneksi.php";

    $module = $_GET['module'] ?? '';
    $act = $_GET['act'] ?? '';

    //hapus jurusan

    if($module=='petugas' AND $act=='hapus'){
    
            $query = " DELETE FROM petugas WHERE id_petugas=$_GET[id] ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            } else {
                header('location:../../media.php?module='.$module);
            }
    }

    //tambah data jurusan
    else if ($module=='petugas' AND $act=='input'){
    
        $query = " INSERT INTO petugas(id_petugas,username,password,nama_petugas,level) 
        VALUES ('$_POST[id_petugas]','$_POST[username]','$_POST[password]','$_POST[nama_petugas]','$_POST[level]')";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }

    //update data
    else if ($module=='petugas' AND $act=='update'){
    
        $query = " UPDATE petugas SET id_petugas='$_POST[id_petugas]',username='$_POST[username]',password='$_POST[password]',nama_petugas='$_POST[nama_petugas]',level='$_POST[level]' WHERE id_petugas='$_POST[id_petugas]'";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }
    



    
    ?>

