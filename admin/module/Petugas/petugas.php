<?php

$act = ($_GET['act'] ?? '');
switch($act){
    default:

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Petugas SMK GARUDA</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-success" href="?module=petugas&act=tambah_petugas">Tambah Data Petugas</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th>No</th>
              <th>ID PETUGAS</th>
              <th>Username</th>
              <th>Password</th>
              <th>Nama Petugas</th>
              <th>Level</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php

            $query = " SELECT * FROM petugas ORDER BY id_petugas ASC ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            }

            $no = 1;

            while($r = mysqli_fetch_assoc($result)){
                echo"
                <tr>
                    <td>$no</td>
                    <td>$r[id_petugas]</td>
                    <td>$r[username]</td>
                    <td>$r[password]</td>
                    <td>$r[nama_petugas]</td>
                    <td>$r[level]</td>
                    <td class='text-center'>
                    <a class='btn btn-primary' href='media.php?module=petugas&act=edit_petugas&id=$r[id_petugas]'> Edit </a>
                    <a class='btn btn-danger' href='module/petugas/aksi_petugas.php?module=petugas&act=hapus&id=$r[id_petugas]'> Hapus </a>
                    </td>
                </tr>
                ";

                $no++;
            }

            ?>
        
          </tbody>
        </table>
      </div>
    </main>

    <?php 
    break;

    case"tambah_petugas":

    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/petugas/aksi_petugas.php?module=petugas&act=input">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Petugas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        </div>
    <div class="col-sm-5">
        <label for="inputEmail">id petugas</label>
        <input type="text" name="id_petugas" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">username</label>
        <input type="text" name="username" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Password</label>
        <input type="password" name="password" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">nama user</label>
        <input type="text" name="nama_petugas" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">level</label>
        <input type="text" name="level" id="inputEmail" class="form-control" required autofocus>
    </div>
    <br>
    <br>
    <div class="btn-group mr-2">
        <button type="submit" class="btn btn-primary" >TAMBAH</button>
    </div>
    <div class="btn-group mr-2">
        <button type="submit" class="btn btn-danger" onclick='javascript:history.back()' >KEMBALI</button>
       
    </div>
    

  
    </form> 
    </main>

    <?php 
    break;

    case"edit_petugas":

      $id = $_GET['id'];

      $sql = " SELECT * FROM petugas WHERE id_petugas=$id";
      $result = mysqli_query($koneksi,$sql);
      $query=($r = mysqli_fetch_assoc($result));

    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/petugas/aksi_petugas.php?module=petugas&act=update">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Jurusan</h1>
        </div>
<div class="col-sm-5">
      <label for="inputEmail">Id Petugas</label>
        <input type="" name="id_petugas" value="<?php echo $r['id_petugas'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">username</label>
        <input type="text" name="username" value="<?php echo $r['username'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">password</label>
        <input type="password" name="password" value="<?php echo $r['password'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Nama User</label>
        <input type="text" name="nama_petugas" value="<?php echo $r['nama_petugas'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">level</label>
        <input type="text" name="level" value="<?php echo $r['level'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
    <br>
    <br>
    <div class="btn-group mr-2">
        <button type="submit" class="btn btn-primary" > EDIT </button>
    </div>
    <div class="btn-group mr-2">
        <button type="submit" class="btn btn-danger" onclick='javascript:history.back()' >KEMBALI</button>
       
    </div>
    

  
    </form> 
    </main>


<?php 
    break;

        }

    ?>

    
