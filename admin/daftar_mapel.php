<?php 

    $namaFiles = __FILE__;
    $param = "\a";
    $hasil=preg_replace("/a/","", $param);
    $akhirArray = explode("$hasil" , $namaFiles);
    $halaman = end($akhirArray);
    
    require '../aksi.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mapel</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_mapel.css">
    <link rel="stylesheet" href="style/style_alert.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
  </head>
  <body>

  <!-- SECTION INFO STATUS AKSI -->
  <?php if(isset($_GET['paramStatusAksi'])) : ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                <img src="../icon/gear.png" class="rounded me-2" width="20" height="20" alt="...">
                <strong class="me-auto">System</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                <?php switch($_GET['paramStatusAksi']) { 
                    case "berhasilTambah" : ?> <strong class="me-auto">Berhasil</strong> Menambahkan Data Mapel <?php break ; ?>
                    <?php case "berhasilHapus" :?> <strong class="me-auto">Berhasil</strong> Meng-hapus Data Mapel <?php break ; ?>
                    <?php case "berhasilEdit" :?> <strong class="me-auto">Berhasil</strong> Mengubah Data Mapel <?php break ; ?>
                    <?php case "gagalTambahMapel" :?> <strong class="me-auto">Gagal </strong> Tambah Mapel, Mapel Tersebut sudah terdaftar <?php break ; ?>
                    <?php default : ?> <strong class="me-auto">Gagal</strong> Tidak Melakukan Apapun <?php break ; ?>
                <?php } ?>
                </div>
            </div>
        </div>
    <?php endif ; ?>
    <!-- !SECTION INFO STATUS AKSI -->
    
    <div class="">
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
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Admin</h5>
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
        <ul class="nav justify-content-center bg-light">
            <li class="nav-item">
                <a class="nav-link active fw-bold text-dark" aria-current="page" href="beranda.php">
                    <img src="../icon/lease.png" class="ms-2" width="40rem" alt=""><br>
                    Beranda
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link fw-bold text-dark" href="tambah_guru.php">
                    <img src="../icon/add-user.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Guru
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-dark" href="tambah_mapel.php">
                    <img src="../icon/lesson.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Mapel
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../icon/presentation.png" class="ms-5" width="40rem" alt=""><br>
                    Tambah Jurusan
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tambah_jurusan.php">Tambah Jurusan Baru</a></li>
                    <li class=""><a class="dropdown-item" href="tambah_jurusan_ada.php" class="text-decoration-underline">Jurusan Yang Sudah Ada</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../icon/presentation.png" class="ms-5" width="40rem" alt=""><br>
                    Tambah Mengajar
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tambah_mengajar_nilai.php">Tambah Kelas</a></li>
                    <li class=""><a class="dropdown-item" href="tambah_mengajar_nilai_siswa.php" class="text-decoration-underline">Tambah Siswa</a></li>
                </ul>
            </li>
        </ul>

        <div class="container-fluid">
            <div class="dropdown-center dropdown text-center">
                <button class="btn btn-warning text-white fw-bold dropdown-toggle w-50 rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih
                </button>
                <ul class="dropdown-menu w-50">
                    <li>
                        <a href="daftar_guru.php" class="text-decoration-none">
                            <button class="dropdown-item">
                                Daftar Guru
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="daftar_mapel.php" class="text-decoration-none">
                            <button class="dropdown-item">
                                Daftar Mapel
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="daftar_jurusan.php" class="text-decoration-none">
                            <button class="dropdown-item">
                                Daftar Jurusan
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="daftar_mengajar.php" class="text-decoration-none">
                            <button class="dropdown-item">
                                Daftar Mengajar
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-success rounded-4 p-4 mt-3">
                <!-- SECTION CARI -->
                <form action="../aksi.php?paramAksi=cari&paramTable=mapel&paramHalaman=daftar_mapel.php" method="post">
                    <div class="input-group w-25 ms-auto">
                        <input type="text" class="form-control rounded-pill rounded-end" name="keyword">
                        <button class="btn btn-primary rounded-pill rounded-start" type="submit">Cari</button>
                    </div>
                </form>
                <!-- !SECTION CARI -->
                
            <!-- TABLE DAFTAR MAPEL -->
            <div class="p-3">
                <table class="table table-light table-striped mb-5 m-auto">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Mapel</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i=1; ?>
                    <?php foreach($dataMapel as $data) : ?>
                    <tr class="text-center">
                        <td><?= $i ?></td>
                        <td><?= $data['nama_m'] ; ?></td>
                        <td class="gap-2">
                            <button class="bg-transparent border-0">
                                <a href="../aksi.php?id=<?= $data['nama_m'] ?>&paramTable=mapel&paramAksi=delete&paramHalaman=daftar_mapel.php&keyword=<?= $keyword ?>&urut=<?= $urut ?>" onclick="return confirm('Yakin ingin menghapus mapel?')">
                                    <img src="../icon/delete1.png" width="30rem" alt="hapus">
                                </a>
                            </button>
                            <button class="bg-transparent border-0" type="button" data-bs-target="#editmapel<?= $i ?>" data-bs-toggle="modal">
                                <img src="../icon/edit1.png" width="30rem" alt="edit">
                            </button>

                                <!-- AWAL POP UP EDIT -->
                    <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="editmapel<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header border-0 text-white" style="background: linear-gradient(120deg,#4433ff,#00ffff);">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Mapel</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-secondary">
                                    <form action="../aksi.php?id=<?= $data['nama_m'] ?>&paramTable=mapel&paramAksi=edit&paramHalaman=daftar_mapel.php&keyword=<?= $keyword ?>&urut=<?= $urut ?>" method="post">
                                        <div class="">
                                            <div class="mb-3">
                                                <label for="mapel" class="form-label text-white">Mapel :</label>
                                                <input type="text" name="mapel" class="form-control" id="mapel" value="<?= $data['nama_m'] ?>">
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                                                <img src="../icon/cancel.png" width="20rem" alt="">
                                                Batal
                                            </button>
                                            <button class="btn btn-info" type="submit">
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
                            
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach ; ?>

                    <?php if ($i == 1) : ?>
                    <tr>
                        <td colspan="8" align="center"> Tidak Mata Pelajaran</td>
                    </tr>
                    <?php endif; ?>
                    
                </table>
                
            </div>
            <!-- AKHIR TABLE DAFTAR MAPEL -->
            </div>
        </div>
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
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../assets/js/bootstrap.bundle.js"></script> -->
    <!-- <script src="../assets/js/bootstrap.js"></script> -->
    <script>
        const toastLiveExample = document.getElementById('liveToast')
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    </script>

  </body>
</html>