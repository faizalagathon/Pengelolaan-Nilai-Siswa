<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
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

<?php include "../functions.php" ?>

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

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasRightLabel">Guru Mapel</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <img src="../icon/profile.png" width="100rem" alt="" class="mb-3">
              <p>Muhammad Azis Nurfajari</p>
              <p>XI RPL 2</p>
              <p>0858-6280-0579</p>
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
        <a class="nav-link fw-bold text-dark text-decoration-underline" href="data_nilai.html">
          <img src="../icon/score.png" class="ms-5" width="40rem" alt=""><br>
          Edit Nilai Murid
        </a>
      </li>
    </ul>
    <!-- AKHIR MENU -->
    <div class="container-fluid">

      <?php if (isset($_GET["bHapus"])) : ?>

      <?php endif; ?>

      <!-- HEADER TABLE -->
      <div class="mt-4 d-flex bg-dark p-3">
        <h3 class="text-white">Nilai Mapel PPKN</h3>
        <div class="dropstart-center dropstart" style="margin-left: auto;">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kelas/Jurusan
          </button>
          <ul class="dropdown-menu">
            <li>
              <button class="dropdown-item">
                XI RPL 1
              </button>
            </li>
            <li>
              <button class="dropdown-item">
                XI RPL 2
              </button>
            </li>
          </ul>
        </div>
      </div>
      <!-- AKHIR HEADER TABLE -->
      <!-- TABLE MURID -->
      <div class="bg-secondary p-3">
        <h3 class="text-white text-center">- XI RPL 2 -</h3>
        <table class="table table-light table-striped mb-5 m-auto">
          <tr class="text-center">
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>UH</th>
            <th>PTS</th>
            <th>PAS</th>
            <th>NA</th>
            <th class="w-25">Aksi</th>
          </tr>
          <?php
          $i = 1;
          foreach (query("
            SELECT * FROM mapel INNER JOIN guru 
            ON mapel.id = guru.id_mapel INNER JOIN mengajar
            ON guru.id = mengajar.id_guru INNER JOIN siswa
            ON mengajar.id_siswa = siswa.id INNER JOIN angkatan
            ON siswa.id_angkatan = angkatan.id INNER JOIN jurusan
            ON siswa.id_jurusan = jurusan.id INNER JOIN nilai
            ON mengajar.id = nilai.id_mengajar") as $nilaiSiswa) : ?>
            <tr class="text-center">
              <td><?= $i++ ?></td>
              <td><?= $nilaiSiswa["nis_s"] ?></td>
              <td><?= $nilaiSiswa["nama_s"] ?></td>
              <td><?= $nilaiSiswa["uh"] ?></td>
              <td><?= $nilaiSiswa["uts"] ?></td>
              <td><?= $nilaiSiswa["uas"] ?></td>
              <td><?= $nilaiSiswa["na"] ?></td>
              <td class="text-center">
                <button class="bg-transparent border-0" type="button" data-bs-target="#hapus<?= $nilaiSiswa["id_nilai"] ?>" data-bs-toggle="modal">
                  <img src="../icon/delete1.png" width="30rem" alt="hapus">
                </button>
                <button class="bg-transparent border-0" type="button" data-bs-target="#edit<?= $nilaiSiswa["id_nilai"] ?>" data-bs-toggle="modal">
                  <img src="../icon/edit1.png" width="30rem" alt="edit">
                </button>
              </td>
            </tr>
            <!-- AWAL POP UP HAPUS -->
            <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="hapus<?= $nilaiSiswa["id_nilai"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 text-white" style="background: linear-gradient(120deg,#4433ff,#00ffff);">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Nilai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body bg-dark">
                    <form action="actionCRUDNilai.php?hapusNilai" method="POST">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label for="uh" class="form-label text-white">UH : <?= $nilaiSiswa["uh"] ?></label>
                          </div>
                          <div class="mb-3">
                            <label for="PTS" class="form-label text-white">PTS : <?= $nilaiSiswa["uts"] ?></label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="mb-3">
                            <label for="PAS" class="form-label text-white">PAS : <?= $nilaiSiswa["uas"] ?></label>
                          </div>
                          <div class="mb-3">
                            <label for="NA" class="form-label text-white">NA : <?= $nilaiSiswa["na"] ?></label>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="idNilai" value="<?= $nilaiSiswa["id_nilai"] ?>">
                      <div class="text-end mt-3">
                        <button type="reset" class="btn btn-danger py-1 px-4 pt-0">
                          <img src="../icon/multiply.png" width="20rem" alt="">
                          Cancel
                        </button>
                        <button type="submit" class="btn btn-primary py-1 px-4 pt-0">
                          <img src="../icon/bookmark.png" width="20rem" alt="">
                          save
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- AKHIR POP UP HAPUS -->
            <!-- AWAL POP UP EDIT -->
            <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="edit<?= $nilaiSiswa["id_nilai"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 text-white" style="background: linear-gradient(120deg,#4433ff,#00ffff);">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Nilai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body bg-dark">
                    <form action="actionCRUDNilai.php?editNilai" method="POST">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label for="uh" class="form-label text-white">UH :</label>
                            <input type="number" class="form-control border-bottom border-0 rounded-0" id="uh" name="uh" value="<?= $nilaiSiswa["uh"] ?>">
                          </div>
                          <div class="mb-3">
                            <label for="PTS" class="form-label text-white">PTS :</label>
                            <input type="number" class="form-control border-bottom border-0 rounded-0" id="PTS" name="PTS" value="<?= $nilaiSiswa["uts"] ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="mb-3">
                            <label for="PAS" class="form-label text-white">PAS :</label>
                            <input type="number" class="form-control border-bottom border-0 rounded-0" id="PAS" name="PAS" value="<?= $nilaiSiswa["uas"] ?>">
                          </div>
                          <div class="mb-3">
                            <label for="NA" class="form-label text-white">NA :</label>
                            <input type="number" class="form-control border-bottom border-0 rounded-0" id="NA" name="NA" value="<?= $nilaiSiswa["na"] ?>">
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="idNilai" value="<?= $nilaiSiswa["id_nilai"] ?>">
                      <div class="text-end mt-3">
                        <button type="reset" class="btn btn-danger py-1 px-4 pt-0">
                          <img src="../icon/multiply.png" width="20rem" alt="">
                          Cancel
                        </button>
                        <button type="submit" class="btn btn-primary py-1 px-4 pt-0">
                          <img src="../icon/bookmark.png" width="20rem" alt="">
                          save
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- AKHIR POP UP EDIT -->
          <?php endforeach; ?>
        </table>
      </div>
      <!-- AKHIR TABLE MURID -->

    </div>
    <div class="container-fluid">
      <!-- HEADER TABLE -->
      <div class="mt-4 d-flex bg-dark p-3">
        <h3 class="text-white">Nilai Mapel PBO</h3>
        <div class="dropstart-center dropstart" style="margin-left: auto;">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kelas/Jurusan
          </button>
          <ul class="dropdown-menu">
            <li>
              <button class="dropdown-item">
                XI RPL 1
              </button>
            </li>
            <li>
              <button class="dropdown-item">
                XI RPL 2
              </button>
            </li>
          </ul>
        </div>
      </div>
      <!-- AKHIR HEADER TABLE -->
      <!-- TABLE MURID -->
      <div class="bg-secondary p-3">
        <h3 class="text-white text-center">- XI RPL 2 -</h3>
        <table class="table table-light table-striped mb-5 m-auto">
          <tr class="text-center">
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>UH</th>
            <th>PTS</th>
            <th>PAS</th>
            <th>NA</th>
            <th class="w-25">Aksi</th>
          </tr>
          <tr class="text-center">
            <td>1</td>
            <td>12127912</td>
            <td>Muhammad Azis Nurfajari</td>
            <td></td>
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
            </td>
          </tr>
          <tr class="text-center">
            <td>2</td>
            <td>12128012</td>
            <td>Khoirun Nihayah</td>
            <td></td>
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
            </td>
          </tr>
        </table>
      </div>
      <!-- AKHIR TABLE MURID -->
      <!-- AWAL POP UP EDIT -->
      <!-- <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header border-0 text-white" style="background: linear-gradient(120deg,#4433ff,#00ffff);">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Nilai</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark">
              <form action="editBuku.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label for="uh" class="form-label text-white">UH :</label>
                      <input type="number" class="form-control border-bottom border-0 rounded-0" id="uh" name="uh" value="">
                    </div>
                    <div class="mb-3">
                      <label for="PTS" class="form-label text-white">PTS :</label>
                      <input type="number" class="form-control border-bottom border-0 rounded-0" id="PTS" name="PTS" value="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                      <label for="PAS" class="form-label text-white">PAS :</label>
                      <input type="number" class="form-control border-bottom border-0 rounded-0" id="PAS" name="PAS" value="">
                    </div>
                    <div class="mb-3">
                      <label for="NA" class="form-label text-white">NA :</label>
                      <input type="number" class="form-control border-bottom border-0 rounded-0" id="NA" name="NA" value="">
                    </div>
                  </div>
                </div>
                <input type="hidden" name="idBuku" value="">
                <div class="text-end mt-3">
                  <button type="reset" class="btn btn-danger py-1 px-4 pt-0">
                    <img src="../icon/multiply.png" width="20rem" alt="">
                    Cancel
                  </button>
                  <button type="submit" class="btn btn-primary py-1 px-4 pt-0">
                    <img src="../icon/bookmark.png" width="20rem" alt="">
                    save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> -->
      <!-- AKHIR POP UP EDIT -->
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
  </div>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
  <script src="../assets/js/bootstrap.bundle.min.js">
    const toastElList = document.querySelectorAll('.toast')
    const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, option))
  </script>
</body>

</html>