<?php

    include "../../../config/koneksi.php";

    $module = $_GET['module'] ?? '';
    $act = $_GET['act'] ?? '';

    //hapus jurusan

    if($module=='spp' AND $act=='hapus'){

    
            $query = " DELETE FROM spp WHERE id_spp='$_GET[id]' ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            } else {
                header('location:../../media.php?module='.$module);
            }
    }

    //tambah data jurusan
    else if ($module=='spp' AND $act=='input'){

        $j = "SELECT * FROM jurusan WHERE id_jurusan=$_POST[jurusan]";
        $res = mysqli_query($koneksi,$j);
        $r = (mysqli_fetch_assoc($res));
        $id_spp = $_POST['tahun'].$r['jurusan'];
    
        $query = " INSERT INTO spp(id_spp,jurusan,tahun,nominal,id_jurusan) VALUES ('$id_spp','$_POST[jurusan]','$_POST[tahun]','$_POST[nominal]','$_POST[jurusan]')";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }

    //update data
    else if ($module=='spp' AND $act=='update'){
        
        $j = "SELECT * FROM jurusan WHERE id_jurusan=$_POST[jurusan]";
        $res = mysqli_query($koneksi,$j);
        $r = (mysqli_fetch_assoc($res));
        $id_spp = $_POST['tahun'].$r['jurusan'];

        $query = " UPDATE spp SET nominal='$_POST[nominal]'WHERE id_spp='$id_spp'";
        $result = mysqli_query($koneksi,$query);

        if(!$result){
            die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
        } else {
            header('location:../../media.php?module='.$module);
        }
    }
    



    
    ?>

