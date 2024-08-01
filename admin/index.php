<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Floating labels example · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/floating-labels/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    
<form method="POST" class="form-signin" action="cek-login.php">
  <div class="text-center mb-4">
    <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">SMK GARUDA</h1>
    <p>SELAMAT DATANG! SILAHKAN LOGIN TERLEBIH DAHULU </P>
    </p>
  </div>

  <div class="form-label-group">
    <input type="text" name="username" id="inputEmail" class="form-control"  required autofocus>
    <label for="inputEmail">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password"  id="inputPassword" class="form-control" required>
    <label for="inputPassword">Password</label>
  </div>
  <input type="submit" class="btn btn-lg btn-primary btn-block" name="login" value="LOGIN">
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2021</p>
</form>


    
  </body>
</html>
