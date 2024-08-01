<?php

    include "../../../config/koneksi.php";

    $module = $_GET['module'] ?? '';
    $act = $_GET['act'] ?? '';

    //hapus jurusan

    if($module=='siswa' AND $act=='hapus'){
    
            $query = " DELETE FROM siswa WHERE nisn=$_GET[id] ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            } else {
                header('location:../../media.php?module='.$module);
            }
    }

    //tambah data jurusan
    else if ($module=='siswa' AND $act=='input'){
    
        $query = " INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) VALUES ('$_POST[nisn]','$_POST[nis],'$_POST[nama]','$_POST[id_kelas]','$_POST[alamat]','$_POST[no_telp]','$_POST[id_spp]')";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }

    //update data
    else if ($module=='kelas' AND $act=='update'){
    
        $query = " UPDATE kelas SET nama_kelas='$_POST[kelas]',kompetensi_keahlian='$_POST[kompetensi_keahlian]' WHERE id_kelas='$_POST[id_kelas]'";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }
    



    
    ?>

