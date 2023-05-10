<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style_siswa.css">
</head>

<body>
  <!-- SECTION - ini dicopy ke semua untuk sesi -->
  <?php
    require '../functions.php';
  if (!isset($_SESSION["login_siswa"])) {
    header("Location: login_murid.php");
    exit;
  }
  require '../crudNilai.php';
  ?>
  <!-- !SECTION -  -->
  <div class="">
    <!-- HEADER -->
    <nav class="navbar bg-dark judul">
      <div class="container">
        <a class="navbar-brand fw-bold fs-4 text-white" href="#">
          <img src="../icon/SMKN-1-Cirebon.png" alt="" class="bg-white p-1 rounded-4" width="80" height="80">
          Pengelola Data Nilai
        </a>
        <div class="d-flex text-center">
          <button class="border-0 bg-white fw-bold rounded-pill" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <img src="../icon/profile.png" width="40rem" alt="" class="bg-light rounded-circle p-0 py-1 pe-1">Profile
          </button>

          <div class="offcanvas offcanvas-end h-50" style="border-radius: 0 0 0 30%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasRightLabel">User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <img src="../icon/profile.png" width="100rem" alt="" class="mb-3">
              <p><?= query("SELECT nama FROM siswa WHERE nis = '$_SESSION[nis]'")[0]['nama'] ?></p>
              <div class="footer">
                <button class="border-0 bg-white fw-bold">
                  <img src="../icon/logout.png" width="30rem" alt="">Logout
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- AKHIR HEADER -->
    <div class="container-fluid">
      <!-- HEADER TABLE -->
      <div class="mt-2 m-3 d-flex bg-dark p-3 mb-3" style="box-shadow: 10px 10px 0px rgb(120, 120, 120);">
        <h3 class="text-white">Nilai Mapel</h3>
        <div class="dropstart-center dropstart" style="margin-left: 79%;">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Semester :
          </button>
          <form action="" method="get">
            <ul class="dropdown-menu">
              <li>
                <button type="submit" name="semester" value="1" class="dropdown-item">
                  Semester 1
                </button>
              </li>
              <li>
                <button type="submit" name="semester" value="2" class="dropdown-item">
                  Semester 2
                </button>
              </li>
            </ul>
          </form>
        </div>
      </div>
      <!-- AKHIR HEADER TABLE -->
      <!-- TABLE MURID -->
      <div class="p-3">
        <table class="table table-dark table-striped mb-5 m-auto">
          <tr>
            <th colspan="6">
              <a href="pdfNilai.php" target="_blank">
                <button class="btn btn-primary w-100 text-white fw-bold">Export to PDF</button>
              </a>
            </th>
          </tr>
          <tr class="text-center">
            <th>#</th>
            <th>Mapel</th>
            <th>UH</th>
            <th>PTS</th>
            <th>PAS</th>
            <th>NA</th>
          </tr>
          <?php foreach ($nilaiSiswa as $ns) : ?>
            <tr class="text-center">
              <td><?= $i++ ?></td>
              <td><?= $ns['nama_m'] ?></td>
              <td><?= $ns['uh'] ?></td>
              <td><?= $ns['uts'] ?></td>
              <td><?= $ns['uas'] ?></td>
              <td><?= $ns['na'] ?></td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>
      <!-- AKHIR TABLE MURID -->
    </div>
    <!-- FOOTER -->
    <div class="bg-dark mt-5 p-1 pt-2 w-100" id="footer" style="margin-bottom: -2rem;">
      <footer class="main-footer mt-3" style="padding-top: 10px;">
        <div class="text-center">
          <a href="http://smkn1-cirebon.sch.id" class="txt2 hov1 text-decoration-none text-white nav-link disabled" target="_blank">
            © 2022 SMK Negeri 1 Cirebon
          </a>
        </div>
      </footer>

      <p class="text-center text-white"><small>- Support By XI RPL 2 -</small></p>
    </div>
    <!-- AKHIR FOOTER -->
  </div>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>