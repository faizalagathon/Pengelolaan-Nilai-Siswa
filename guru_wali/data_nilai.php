<?php 
include '../functions.php';

if (!isset($_SESSION["login_wali"])) {
  header("Location: login_wali.php");
  exit;
}

require '../crudNilai.php';

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Nilai</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
    body {
      background: url(../bg/bg6.jpg);
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
</head>

<body>
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

          <div class="offcanvas offcanvas-end h-50" style="border-radius: 0px 0px 0px 20%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasRightLabel">Wali Kelas XI RPL 2</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <img src="../icon/profile.png" width="100rem" alt="" class="mb-3">
              <p><?= query("SELECT nama FROM guru WHERE nip = $_SESSION[nip]")[0]['nama'] ?></p>
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
    <!-- MENU -->
    <ul class="nav justify-content-center bg-light">
      <li class="nav-item">
        <a class="nav-link active fw-bold text-dark" aria-current="page" href="beranda.php">
          <img src="../icon/reader.png" class="ms-4" width="40rem" alt=""><br>
          Daftar Murid
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link fw-bold text-dark" href="tambah_murid.php">
          <img src="../icon/add-user.png" class="ms-4" width="40rem" alt=""><br>
          Tambah Data
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link fw-bold text-dark text-decoration-underline" href="data_nilai.php">
          <img src="../icon/score.png" class="ms-5" width="40rem" alt=""><br>
          Data Nilai Murid
        </a>
      </li>
    </ul>
    <!-- AKHIR MENU -->
    <div class="">
      <!-- SlIDE NILAI -->
      <div class="dropdown-center dropdown text-center">
        <button class="btn btn-warning text-white fw-bold dropdown-toggle w-50 rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Pilih Mapel
        </button>
        <ul class="dropdown-menu w-50">
          <div class="row">
            <div class="col">
              <?php foreach ($daftarMapel as $mapel) : ?>
                <li>
                  <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="<?= $j++ ?>">
                    <?= $mapel['nama_m'] ?>
                  </button>
                </li>
              <?php endforeach; ?>
              <!-- <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="1">
                                    PJOK
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="2">
                                    PKK-UMUM
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="3">
                                    PBO
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="4">
                                    B.INGGRIS
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="5">
                                    PWEB
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="6">
                                    BK/BP
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="7">
                                    PPKN
                                </button>
                            </li> -->

            </div>
            <div class="col">
              <!-- <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="8">
                                    MTK
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="9">
                                    BASDAT
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="10">
                                    B.INDONESIA
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="11">
                                    PAI
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-target="#carouselExample" data-bs-slide-to="12">
                                    PKK
                                </button>
                            </li> -->
            </div>
          </div>
        </ul>
      </div>
      <div id="carouselExample" class="carousel slide container-fluid mt-4">
        <div class="carousel-inner bg-secondary p-3 border border-2 border-white rounded-4">
          <div class="mt-2 d-flex bg-dark p-3">
            <h3 class="text-white">Nilai Mapel</h3>
            <div class="dropstart-center dropstart" style="margin-left: 79%;">
              <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Semester :
              </button>
              <ul class="dropdown-menu">
                <li>
                  <form action="" method="get"></form>
                  <button class="dropdown-item">
                    Semester 1
                  </button>
                </li>
                <li>
                  <button class="dropdown-item">
                    Semester 2
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <?php $i = 1 ?>
          <?php foreach ($daftarMapel as $mapel) : ?>
            <?php $active = ($i == 1) ? 'active' : '' ?>
            <div class="carousel-item <?= $active ?>">
              <h2 class="text-center text-white"><?= $mapel['nama_m'] ?></h2>
              <table class="table table-light table-striped mb-5 m-auto">
                <tr class="text-center">
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>UH</th>
                  <th>PTS</th>
                  <th>PAS</th>
                  <th>NA</th>
                </tr>
                <?php foreach (query($sqlReadNilai) as $siswa) : ?>
              <tr class="text-center">
                <td><?= $j++ ?></td>
                <td><?= $siswa["nis"] ?></td>
                <td><?= $siswa["nama_s"] ?></td>
                <td><?= $siswa["uh"] ?></td>
                <td><?= $siswa["uts"] ?></td>
                <td><?= $siswa["uas"] ?></td>
                <td><?= $siswa["na"] ?></td>
              </tr>
            <?php endforeach; ?>
              </table>
            </div>
            <?php $i++ ?>
          <?php endforeach ?>
          <!-- <div class="carousel-item" >
                        <h2 class="text-center text-white">PJOK</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">PKK-UMUM</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">PBO</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">B.INGGRIS</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">PWEB</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">BK/BP</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">PPKN</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">MTK</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">BASDAT</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">B.INDONESIA</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">PAI</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <h2 class="text-center text-white">PKK</h2>
                        <table class="table table-light table-striped mb-5 m-auto">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>UH</th>
                                <th>PTS</th>
                                <th>PAS</th>
                                <th>NA</th>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style=" width: 6%;">
          <span class="carousel-control-prev-icon bg-dark rounded-2" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style=" width: 6%;">
          <span class="carousel-control-next-icon bg-dark rounded-2" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- AKHIR SLIDE NILAI -->
    </div>
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
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>