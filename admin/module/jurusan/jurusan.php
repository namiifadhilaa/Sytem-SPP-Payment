<?php

$act = ($_GET['act'] ?? '');
switch($act){
    default:

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA JURUSAN SMK GARUDA</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-success" href="?module=jurusan&act=tambah_jurusan">TAMBAH DATA JURUSAN</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Jurusan</th>
              <th>Nama Jurusan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php

            $query = " SELECT * FROM jurusan ORDER BY id_jurusan ASC ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            }

            $no = 1;

            while($r = mysqli_fetch_assoc($result)){
                echo"
                <tr>
                    <td>$no</td>
                    <td>$r[jurusan]</td>
                    <td>$r[nama_jurusan]</td>
                    <td class='text-center'>
                    <a class='btn btn-primary' href='media.php?module=jurusan&act=edit_jurusan&id=$r[id_jurusan]'> Edit </a>
                    <a class='btn btn-danger' href='module/jurusan/aksi_jurusan.php?module=jurusan&act=hapus&id=$r[id_jurusan]'> Hapus </a>
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

    case"tambah_jurusan":

    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/jurusan/aksi_jurusan.php?module=jurusan&act=input">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Jurusan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" href="?module=jurusan&act=tambah_jurusan">TAMBAH DATA JURUSAN</button>
          </div>
        </div>
        </div>
    <div class="col-sm-5">
        <label for="inputEmail">Jurusan</label>
        <input type="text" name="jurusan" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Kompetensi Keahlian</label>
        <input type="text" name="nama_jurusan" id="inputEmail" class="form-control" required autofocus>
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

    case"edit_jurusan":

      $id = $_GET['id'];

      $sql = " SELECT * FROM jurusan WHERE id_jurusan=$id";
      $result = mysqli_query($koneksi,$sql);
      $query = ( $r = mysqli_fetch_assoc($result));

    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/jurusan/aksi_jurusan.php?module=jurusan&act=update">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Jurusan</h1>
        </div>
      <div class="col-sm-5">
        <input type="hidden" name="id_jurusan" value="<?php echo $r['id_jurusan'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Jurusan</label>
        <input type="text" name="jurusan" value="<?php echo $r['jurusan'] ?>" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Kompetensi Keahlian</label>
        <input type="text" name="nama_jurusan" value="<?php echo $r['nama_jurusan'] ?>" id="inputEmail" class="form-control" required autofocus>
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

    
