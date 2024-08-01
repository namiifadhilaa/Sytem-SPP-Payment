<div class="container-fluid">
  <div class="row">
  <?php if($_SESSION['level'] == 'admin'){ ?>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="?module=home">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?module=jurusan">
              <span data-feather="file"></span>
              Jurusan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?module=siswa">
              <span data-feather="shopping-cart"></span>
              Siswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?module=spp">
              <span data-feather="users"></span>
              SPP
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Pembayaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?module=kelas">
              <span data-feather="layers"></span>
              Kelas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?module=petugas">
              <span data-feather="layers"></span>
            Petugas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Transaksi Pembayaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              History Pembayaran 
            </a>
          </li>
        </ul>

       
      </div>
    </nav>

    <?php } 

    elseif($_SESSION['level'] == 'petugas'){ ?>

      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="?module=home">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Transaksi Pembayaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              History Pembayaran 
            </a>
          </li>
    </ul>
      </div>
    </nav>

  <?php } ?>

      