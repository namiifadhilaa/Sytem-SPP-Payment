<?php if($_GET['module']=='home') { ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">SISTEM SMK GARUDA</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <form method="POST" class="form-signin" >
  <div class="text-center mb-4">
    <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Selamat datang ' <?php echo"$_SESSION[nama_user]" ?> ' </h1>
    <p> anda sudah bisa meng-akses data yang terdapat dalam sistem </P>
    </p>
  </div>

  
</form>

    </main>

<?php }

else if($_GET['module']=='jurusan'){
    include"module/jurusan/jurusan.php";
}

else if($_GET['module']=='petugas'){
  include"module/petugas/petugas.php";
}

else if($_GET['module']=='kelas'){
  include"module/kelas/kelas.php";
}

else if($_GET['module']=='spp'){
  include"module/spp/spp.php";
}
else if($_GET['module']=='siswa'){
  include"module/siswa/siswa.php";
}

?>