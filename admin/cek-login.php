<?php

include "../config/koneksi.php";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];

        $cekLogin = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username'");
            if(mysqli_num_rows($cekLogin) > 0 ){
                $dataLogin = mysqli_fetch_array($cekLogin);
                    if($dataLogin['password'] == $pass){
                        //cek session
                        session_start();
                        $_SESSION['username'] = $dataLogin['username'];
                        $_SESSION['nama_user'] = $dataLogin['nama_petugas'];
                        $_SESSION['level'] = $dataLogin['level'];

                       header('Location:media.php?module=home');

                    } else{
                        header('location:gagal-login.php');
                    }
            } else{
                        header('location:gagal-login.php');
                    }
        
    }


?>