<?php

require "../crudNilai.php";
if (!isset($_SESSION["login_mapel"])) {
  header("Location: login_mapel.php");
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

<?php

if (isset($_GET['tHapus'])) {
  echo "
  <script>
  alert('Data Berhasil di Hapus');
  </script>
  ";
}
if (isset($_GET['fHapus'])) {
  echo "
  <script>
  alert('Data Gagal di Hapus');
  </script>
  ";
}
if (isset($_GET['tEdit'])) {
  echo "
  <script>
  alert('Data Berhasil di Edit');
  </script>
  ";
}
if (isset($_GET['fEdit'])) {
  echo "
  <script>
  alert('Data Gagal di Edit');
  </script>
  ";
}

?>

<body>
  <div class="">
    <!-- HEADER -->
    <nav class="navbar bg-dark judul">
      <div class="container">
        <a class="navbar-brand fw-bold fs-4 text-white" href="beranda.php">
          <img src="../icon/SMKN-1-Cirebon.png" alt="" class="bg-white p-1 rounded-4" width="80" height="80">
          Pengelola Data Nilai
        </a>
        <div class="d-flex text-center">
          <button class="border-0 bg-white fw-bold rounded-pill" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <img src="../icon/profile.png" width="40rem" alt="" class="bg-light rounded-circle p-0 py-1 pe-1">Profile
          </button>

          <div class="offcanvas offcanvas-end h-50" style="border-radius: 0 0 0 30%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasRightLabel">Guru Mapel</h5>
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
    <div class="container-fluid">
      <!-- HEADER TABLE -->
      <div class="bg-secondary text-center w-50 m-auto" style="border-radius: 0 0 10px 10px;">
        <form action="" method="get" id="kategori">
          <label for="" class="form-label text-white fw-bold">Pilih Berdasarkan :</label>
          <div class="row">
            <div class="col">
              <div class="mb-3 w-75 m-auto">
                <label for="username" class="form-label text-white">Kelas :</label>
                <select class="form-select" aria-label="Default select example" name="angkatan">
                  <option selected></option>
                  <option value="X" <?= (isset($_GET['angkatan']) && $_GET['angkatan'] == 'X') ? 'selected' : '' ?>>
                    X
                  </option>
                  <option value="XI" <?= (isset($_GET['angkatan']) && $_GET['angkatan'] == 'XI') ? 'selected' : '' ?>>
                    XI
                  </option>
                  <option value="XII" <?= (isset($_GET['angkatan']) && $_GET['angkatan'] == 'XII') ? 'selected' : '' ?>>
                    XII
                  </option>
                  <option value="XIII" <?= (isset($_GET['angkatan']) && $_GET['angkatan'] == 'XIII') ? 'selected' : '' ?>>
                    XIII
                  </option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="mb-3 w-75 m-auto">
                <label for="username" class="form-label text-white">Jurusan :</label>
                <select class="form-select" aria-label="Default select example" name="jurusan">
                  <option selected></option>
                  <?php foreach ($daftarJurusan as $jurusan) : ?>
                    <option value="<?= $jurusan['kode_jurusan'] ?>" <?= (isset($_GET['jurusan']) && $_GET['jurusan'] == $jurusan['kode_jurusan']) ? 'selected' : '' ?>>
                      <?= $jurusan['kode_jurusan'] ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="mb-3 w-75 m-auto">
                <label for="username" class="form-label text-white">Semester :</label>
                <select class="form-select" aria-label="Default select example" name="semester">
                  <option selected></option>
                  <option value="1" <?= (isset($_GET['semester']) && $_GET['semester'] == '1') ? 'selected' : '' ?>>
                    Semester 1
                  </option>
                  <option value="2" <?= (isset($_GET['semester']) && $_GET['semester'] == '2') ? 'selected' : '' ?>>
                    Semester 2
                  </option>
                </select>
              </div>
            </div>
            <div class="mb-2 px-4">
              <button type="submit" class="btn btn-primary w-100">Pilih</button>
            </div>
          </div>
        </form>
      </div>
      <div class="mt-4 d-flex bg-dark p-3">
        <h3 class="text-white">Nilai <?= isset($nilaiSiswa[0]['nama_m']) ? $nilaiSiswa[0]['nama_m'] : '-' ?></h3>
        <div class="dropstart-center dropstart" style="margin-left: auto;">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sort By :
          </button>
          <ul class="dropdown-menu">
            <form action="" method="get">
              <?php if (isset($_GET['angkatan']) && isset($_GET['jurusan']) && isset($_GET['semester'])) : ?>
                <input type="hidden" name="angkatan" value="<?= $_GET['angkatan'] ?>">
                <input type="hidden" name="jurusan" value="<?= $_GET['jurusan'] ?>">
                <input type="hidden" name="semester" value="<?= $_GET['semester'] ?>">
              <?php endif ?>
              <li>
                <button type="submit" name="asc" class="dropdown-item">
                  <img src="../icon/sort-az.png" width="20rem" alt="">
                  ASC
                </button>
              </li>
            </form>
            <form action="" method="get">
              <?php if (isset($_GET['angkatan']) && isset($_GET['jurusan']) && isset($_GET['semester'])) : ?>
                <input type="hidden" name="angkatan" value="<?= $_GET['angkatan'] ?>">
                <input type="hidden" name="jurusan" value="<?= $_GET['jurusan'] ?>">
                <input type="hidden" name="semester" value="<?= $_GET['semester'] ?>">
              <?php endif ?>
              <li>
                <button type="submit" name="desc" class="dropdown-item">
                  <img src="../icon/sort-za.png" width="20rem" alt="">
                  DESC
                </button>
              </li>
            </form>
          </ul>
        </div>
      </div>
      <!-- AKHIR HEADER TABLE -->
      <!-- TABLE MURID -->
      <div class="bg-secondary p-3">
        <h3 class="text-white text-center">
          - XI RPL 2 - <br>
          <i class="fs-6">Semester <?= (isset($_GET['semester'])) ? $_GET['semester'] : '-' ?></i>
        </h3>
        <form action="" method="get">
          <?php if (isset($_GET['angkatan']) || isset($_GET['jurusan']) || isset($_GET['semester'])) : ?>
            <input type="hidden" name="angkatan" value="<?= $_GET['angkatan'] ?>">
            <input type="hidden" name="jurusan" value="<?= $_GET['jurusan'] ?>">
            <input type="hidden" name="semester" value="<?= $_GET['semester'] ?>">
          <?php endif ?>
          <div class="input-group w-50 m-auto mb-3">
            <input type="search" class="form-control rounded-pill rounded-end" name="cariNilai" value="<?= (isset($_GET['cariNilai'])) ? $_GET['cariNilai'] : '' ?>">
            <button class="btn btn-primary rounded-pill rounded-start">Cari</button>
          </div>
        </form>
        <table class="table table-light table-striped mb-5 m-auto">
          <tr class="text-center">
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>UH</th>
            <th>PTS</th>
            <th>PAS</th>
            <th>NA</th>
            <th>Aksi</th>
          </tr>
          <?php foreach (query($sqlReadNilai) as $siswa) : ?>
            <tr class="text-center">
              <td><?= $i++ ?></td>
              <td><?= $siswa["nis"] ?></td>
              <td><?= $siswa["nama_s"] ?></td>
              <td><?= $siswa['angkatan'] . '-' . $siswa['kode_jurusan'] ?></td>
              <td><?= $siswa["uh"] ?></td>
              <td><?= $siswa["uts"] ?></td>
              <td><?= $siswa["uas"] ?></td>
              <td><?= $siswa["na"] ?></td>
              <td class="text-center">
                <button class="bg-transparent border-0" type="button" data-bs-target="#hapus<?= $siswa["id_nilai"] ?>" data-bs-toggle="modal">
                  <img src="../icon/delete1.png" width="30rem" alt="hapus">
                </button>
                <button class="bg-transparent border-0" type="button" data-bs-target="#edit<?= $siswa["id_nilai"] ?>" data-bs-toggle="modal">
                  <img src="../icon/edit1.png" width="30rem" alt="edit">
                </button>
              </td>
            </tr>
            <!-- AWAL POP UP HAPUS -->
            <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="hapus<?= $siswa["id_nilai"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 text-white" style="background: linear-gradient(120deg,#4433ff,#00ffff);">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Nilai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body bg-dark">
                    <form action="../crudNilai.php?hapusNilai" method="POST">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label for="uh" class="form-label text-white">UH : <?= $siswa["uh"] ?></label>
                          </div>
                          <div class="mb-3">
                            <label for="PTS" class="form-label text-white">PTS : <?= $siswa["uts"] ?></label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="mb-3">
                            <label for="PAS" class="form-label text-white">PAS : <?= $siswa["uas"] ?></label>
                          </div>
                          <div class="mb-3">
                            <label for="NA" class="form-label text-white">NA : <?= $siswa["na"] ?></label>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="idNilai" value="<?= $siswa["id_nilai"] ?>">
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
            <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="edit<?= $siswa["id_nilai"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 text-white" style="background: linear-gradient(120deg,#4433ff,#00ffff);">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Nilai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body bg-dark">
                    <form action="../crudNilai.php?editNilai" method="POST">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label for="uh" class="form-label text-white">UH :</label>
                            <input type="number" class="form-control border-bottom border-0 rounded-0" id="uh" name="uh" value="<?= $siswa["uh"] ?>">
                          </div>
                          <div class="mb-3">
                            <label for="PTS" class="form-label text-white">PTS :</label>
                            <input type="number" class="form-control border-bottom border-0 rounded-0" id="PTS" name="uts" value="<?= $siswa["uts"] ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="mb-3">
                            <label for="PAS" class="form-label text-white">PAS :</label>
                            <input type="number" class="form-control border-bottom border-0 rounded-0" id="PAS" name="uas" value="<?= $siswa["uas"] ?>">
                          </div>
                          <div class="mb-3">
                            <label for="NA" class="form-label text-white">NA :</label>
                            <input type="number" class="form-control border-bottom border-0 rounded-0" id="NA" name="na" value="<?= $siswa["na"] ?>">
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="idNilai" value="<?= $siswa["id_nilai"] ?>">
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
      <!-- AWAL POP UP EDIT -->
      <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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