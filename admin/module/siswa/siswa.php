<?php

$act = ($_GET['act'] ?? '');
switch($act){
    default:

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA SISWA/I SMK GARUDA </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="?module=siswa&act=tambah_siswa">TAMBAH DATA SISWA</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>NISN</th>
              <th>NIS</th>
              <th>NAMA SISWA/I </th>
              <th>ALAMAT</th>
              <th>NO.TELP</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php

            $query = " SELECT * FROM siswa,spp WHERE siswa.id_spp=spp.id_spp ORDER BY siswa.nisn ASC ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            }

            $no = 1;

            while($r = mysqli_fetch_assoc($result)){
                echo"
                <tr>
                    <td>$no</td>
                    <td>$r[nisn]</td>
                    <td>$r[nis]</td>
                    <td>$r[nama]</td>
                    <td>$r[alamat]</td>
                    <td>$r[no_telp]</td>
                    <td class='text-center'>
                    <a class='btn btn-primary' href='media.php?module=siswa&act=edit_siswa&id=$r[nisn]'> Edit </a>
                    <a class='btn btn-danger' href='module/siswa/aksi_siswa.php?module=siswa&act=hapus&id=$r[nisn]'> Hapus </a>
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

    case"tambah_siswa":

    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/siswa/aksi_siswa.php?module=siswa&act=input">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data SISWA</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" href="?module=siswa&act=tambah_siswa">TAMBAH DATA JURUSAN</button>
          </div>
        </div>
        </div>
    <div class="col-sm-5">
        <label for="inputEmail">NISN</label>
        <input type="text" name="nisn" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">NIS</label>
        <input type="text" name="nis" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">NAMA SISWA/I</label>
        <input type="text" name="nama" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">ALAMAT</label>
        <input type="text" name="alamat" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">No Telp</label>
        <input type="text" name="no_telp" id="inputEmail" class="form-control" required autofocus>
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

    
