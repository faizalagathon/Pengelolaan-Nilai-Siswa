<?php
require "../functions.php";
if (!isset($_SESSION["login_wali"])) {
  header("Location: login_wali.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style_beranda.css">
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
              <p>Muhammad Azis Nurfajari</p>
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
        <a class="nav-link active fw-bold text-dark text-decoration-underline" aria-current="page" href="beranda.html">
          <img src="../icon/reader.png" class="ms-4" width="40rem" alt=""><br>
          Daftar Murid
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link fw-bold text-decoration-none text-dark" href="tambah_murid.html">
          <img src="../icon/add-user.png" class="ms-4" width="40rem" alt=""><br>
          Tambah Data
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link fw-bold text-dark" href="data_nilai.html">
          <img src="../icon/score.png" class="ms-5" width="40rem" alt=""><br>
          Data Nilai Murid
        </a>
      </li>
    </ul>
    <!-- AKHIR MENU -->
    <div class="mt-4 bg-success rounded-4 border border-3 border-white p-3 m-3">
      <form action="">
        <div class="input-group w-25 mb-3 ms-auto">
          <input type="search" class="form-control rounded-pill rounded-end">
          <button class="btn btn-primary rounded-pill rounded-start">Cari</button>
        </div>
      </form>
      <!-- HEADER TABEL -->
      <div class="mt-2 d-flex bg-dark p-3 mb-3" style="box-shadow: -10px -10px 0px rgb(171, 171, 171);">
        <h3 class="text-white">Daftar Murid</h3>
        <!-- SORT BY -->
        <div class="dropstart-center dropstart" style="margin-left: 79%;">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sort By
          </button>
          <ul class="dropdown-menu">
            <li>
              <button class="dropdown-item">
                <img src="../icon/sort-az.png" width="20rem" alt="">
                ASC
              </button>
            </li>
            <li>
              <button class="dropdown-item">
                <img src="../icon/sort-za.png" width="20rem" alt="">
                DESC
              </button>
            </li>
          </ul>
        </div>
        <!-- SORT BY -->
      </div>
      <!-- AKHIR HEADER TABEL -->
      <!-- TABEL MURID -->
      <table class="table table-light table-striped mb-5 m-auto">
        <tr>
          <th colspan="9">
            <button class="btn btn-info w-100 text-white fw-bold">Export to PDF</button>
          </th>
        </tr>
        <tr class="text-center">
          <th>#</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Jk</th>
          <th>Alamat</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Password</th>
          <th class="w-25">Aksi</th>
        </tr>
        <tr class="text-center">
          <td>1</td>
          <td>12127912</td>
          <td>Muhammad Azis Nurfajari</td>
          <td>L</td>
          <td>Cirebon</td>
          <td></td>
          <td></td>
          <td></td>
          <td class="text-center">
            <button class="bg-transparent border-0">
              <a href="">
                <img src="../icon/delete1.png" width="30rem" alt="hapus">
              </a>
            </button>
            <button class="bg-transparent border-0" type="button" data-bs-target="#edit" data-bs-toggle="modal">
              <img src="../icon/edit1.png" width="30rem" alt="edit">
            </button>
            <button class="bg-transparent border-0">
              <a href="">
                <img src="../icon/refresh-button.png" width="30rem" alt="Refresh">
              </a>
            </button>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td class="text-center">
            <button class="bg-transparent border-0">
              <a href="">
                <img src="../icon/delete1.png" width="30rem" alt="">
              </a>
            </button>
            <button class="bg-transparent border-0" type="button" data-bs-target="#edit" data-bs-toggle="modal">
              <img src="../icon/edit1.png" width="30rem" alt="">
            </button>
            <button class="bg-transparent border-0">
              <a href="">
                <img src="../icon/refresh-button.png" width="30rem" alt="Refresh">
              </a>
            </button>
          </td>
        </tr>
      </table>
      <!-- AKHIR TABEL MURID -->
      <!-- AWAL POP UP EDIT -->
      <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header border-0 text-white" style="background: linear-gradient(120deg,#4433ff,#00ffff);">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Murid</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-secondary">
              <form action="">
                <div class="row">
                  <div class="mb-3">
                    <label for="username" class="form-label text-white">NIS :</label>
                    <input type="text" class="form-control" id="username">
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label text-white">Nama :</label>
                    <input type="text" class="form-control" id="nama">
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label text-white">Jenis Kelamin :</label>
                    <select class="form-select w-25" aria-label="Default select example">
                      <option selected></option>
                      <option value="1">L</option>
                      <option value="2">P</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label text-white">Alamat :</label>
                    <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                  </div>
                </div>
                <div class="text-end">
                  <button class="btn btn-warning">
                    <img src="../icon/cancel.png" width="20rem" alt="">
                    Batal
                  </button>
                  <button class="btn btn-info">
                    <img src="../icon/save.png" width="20rem" alt="">
                    Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- AKHIR POP UP EDIT -->
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