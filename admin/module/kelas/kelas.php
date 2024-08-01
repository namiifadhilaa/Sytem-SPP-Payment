<?php

$act = ($_GET['act'] ?? '');
switch($act){
    default:

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA KELAS SMK GARUDA</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-success" href="?module=kelas&act=tambah_kelas">TAMBAH DATA KELAS</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Kelas</th>
              <th>Kompetensi Keahlian</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php

            $query = " SELECT * FROM kelas ORDER BY id_kelas ASC ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            }

            $no = 1;

            while($r = mysqli_fetch_assoc($result)){
                echo"
                <tr>
                    <td>$no</td>
                    <td>$r[nama_kelas]</td>
                    <td>$r[kompetensi_keahlian]</td>
                    <td class='text-center'>
                    <a class='btn btn-primary' href='media.php?module=kelas&act=edit_kelas&id=$r[id_kelas]'> Edit </a>
                    <a class='btn btn-danger' href='module/kelas/aksi_kelas.php?module=kelas&act=hapus&id=$r[id_kelas]'> Hapus </a>
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

    case"tambah_kelas":

    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/kelas/aksi_kelas.php?module=kelas&act=input">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Jurusan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        </div>
    <div class="col-sm-5">
        <label for="inputEmail">Nama Kelas</label>
        <input type="text" name="nama_kelas" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Kompetensi Keahlian</label>
        <input type="text" name="kompetensi_keahlian" id="inputEmail" class="form-control" required autofocus>
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

    case"edit_kelas":

      $id = $_GET['id'];

      $sql = " SELECT * FROM kelas WHERE id_kelas=$id";
      $result = mysqli_query($koneksi,$sql);
      $query=($r = mysqli_fetch_assoc($result));
      

    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/kelas/aksi_kelas.php?module=kelas&act=update">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Jurusan</h1>
        </div>
        <div class="col-sm-5">
        <input type="hidden" name="id_kelas" value="<?php echo $r['id_kelas'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
        <div class="col-sm-5">
        <label for="inputEmail">Nama Kelas</label>
        <input type="text" name="nama_kelas" value="<?php echo $r['nama_kelas'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Kompetensi Keahlian</label>
        <input type="type" name="kompetensi_keahlian" value="<?php echo $r['kompetensi_keahlian'] ?>" id="inputEmail" class="form-control" required autofocus>
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

    
