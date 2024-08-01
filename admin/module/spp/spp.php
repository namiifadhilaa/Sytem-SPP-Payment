<?php

$act = ($_GET['act'] ?? '');
switch($act){
    default:

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA SPP SMK GARUDA</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-success" href="?module=spp&act=tambah_spp">TAMBAH DATA SPP</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>ID SPP</th>
              <th>Jurusan</th>
              <th>Tahun</th>
              <th>Nominal</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php

            $query = " SELECT * FROM spp,jurusan WHERE spp.id_jurusan=jurusan.id_jurusan ORDER BY spp.id_jurusan ASC ";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("koneksi database error : " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
            }

            $no = 1;

            while($r = mysqli_fetch_assoc($result)){
                echo"
                <tr>
                    <td>$no</td>
                    <td>$r[id_spp]</td>
                    <td>$r[jurusan]</td>
                    <td>$r[tahun]</td>
                    <td>$r[nominal]</td>
                    <td class='text-center'>
                    <a class='btn btn-primary' href='media.php?module=spp&act=edit_spp&id=$r[id_spp]'> Edit </a>
                    <a class='btn btn-danger' href='module/spp/aksi_spp.php?module=spp&act=hapus&id=$r[id_spp]'> Hapus </a>
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

    case"tambah_spp":

    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/spp/aksi_spp.php?module=spp&act=input">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data SPP </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        </div>
    <div class="col-sm-5">
        <label for="inputEmail">Tahun</label>
        <input type="text" name="tahun" id="inputEmail" class="form-control" required autofocus>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Jurusan</label>
        <select type="text" name="jurusan" id="inputEmail" class="form-control" required autofocus>
        <?php
            $tampil = " SELECT * FROM jurusan WHERE id_jurusan ";
            $result = mysqli_query($koneksi,$tampil);
            while($jur = mysqli_fetch_assoc($result)){
                echo"
                <option value='$jur[id_jurusan]'>$jur[jurusan]</option> 
                ";
            }
            ?>
    </select>
    </div>
    <div class="mb-5">
    <div class="col-sm-5">
          <label for="username">Nominal</label>
          <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
            <input type="text" name="nominal" id="inputEmail" class="form-control" required autofocus>
        </div>
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

    case"edit_spp":

      $id = $_GET['id'];

      $sql = " SELECT * FROM spp WHERE id_spp='$id'";
      $result = mysqli_query($koneksi,$sql);
     $query = ( $r = mysqli_fetch_assoc($result));

    ?> 
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <form method="POST" class="form-signin" action="module/spp/aksi_spp.php?module=spp&act=update">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Spp </h1>
        </div>
      <div class="col-sm-5">
        <input type="text" name="id_spp"  value="<?php echo $r['id_spp'] ?>" id="inputEmail" class="form-control" required autofocus readonly>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Tahun</label>
        <input type="text" name="tahun"  value="<?php echo $r['tahun'] ?>" id="inputEmail" class="form-control" required autofocus readonly>
    </div>
    <div class="col-sm-5">
        <label for="inputEmail">Jurusan</label>
        <select type="text" name="jurusan" value="<?php echo $r['jurusan'] ?>" id="inputEmail" class="form-control" required autofocus readonly>
        <?php
            $tampil = " SELECT * FROM jurusan WHERE id_jurusan ";
            $result = mysqli_query($koneksi,$tampil);
            while($jur = mysqli_fetch_assoc($result)){
                echo"
                <option value='$jur[id_jurusan]'>$jur[jurusan]</option> 
                ";
            }
            ?>
    </select>
    </div>
    <div class="mb-5">
    <div class="col-sm-5">
          <label for="username">Nominal</label>
          <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
            <input type="text" name="nominal" value="<?php echo $r['nominal'] ?>" id="inputEmail" class="form-control" required autofocus>
        </div>
    </div>
    <br>
    <br>
    <div class="btn-group mr-2">
        <button type="submit" class="btn btn-primary" >EDIT</button>
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

    
