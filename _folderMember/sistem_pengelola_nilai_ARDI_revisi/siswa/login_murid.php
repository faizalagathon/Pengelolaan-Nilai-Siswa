<?php
require '../koneksi.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/login_s.css">
  </head>
  <body>
    <form action="../aksi_login.php?ParamAksi=login&ParamTable=siswa&ParamCek=cekpass&ParamError=login_siswa" method="post" class="m-auto mb-1 mt-3 p-3 rounded-5">
        <div class="d-flex justify-content-center m-0">
          <img src="../icon/SMKN-1-Cirebon.png" alt="">
        </div>
        <h2 class="text-center pb-3 mb-0">Login Siswa</h2>
         <!--SECTION ALERT PASS SALAH   -->
         <?php if(isset($_GET['coba'])): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Nis atau Password salah!</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>  
        <!-- //!SECTION -->
        <div class="mb-3 px-3 mt-3">
          <label for="nama" class="form-label">NIS :</label>
          <input type="text" name="nis" class="form-control border-0 border-bottom" id="nama" aria-describedby="emailHelp"  >
        </div>
        <div class="mb-3 px-3">
          <label for="password" class="form-label">Password :</label>
          <input type="password" name="password" class="form-control border-0 border-bottom" 
          id="kontak" >
        </div>
        <br>
        <div class="d-grid gap-2">
          <button type="submit" name="login_siswa" class="btn rounded-pill text-white fw-bold login">Login</button>
        </div>
        <footer class="main-footer " style="padding-top: 10px;">
          <div class="text-center">
            <a href="" class="text-decoration-none text-dark nav-link disabled" target="_blank">
              © 2022 SMK Negeri 1 Cirebon
            </a>
          </div>
        </footer>
        <p class="text-center"><small>- Support By XI RPL 2 -</small></p>
      </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>