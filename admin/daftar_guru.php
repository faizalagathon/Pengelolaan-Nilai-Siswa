<?php 


$namaFiles = __FILE__;
$param = "\a";
$hasil=preg_replace("/a/","", $param);
$akhirArray = explode("$hasil" , $namaFiles);
$halaman = end($akhirArray);

include '../aksi.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar guru</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_beranda.css">
    <link rel="stylesheet" href="style/style_alert.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
    
  </head>
  <body>

    
    
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
                    case "berhasilAcak" : ?> <strong class="me-auto">Berhasil</strong> Mengacak Password Guru <?php break ; ?>
                    <?php case "berhasilTambah" :?> <strong class="me-auto">Berhasil</strong> Menambah Data Guru <?php break ; ?>
                    <?php case "berhasilEdit" :?> <strong class="me-auto">Berhasil</strong> Mengubah Data Guru <?php break ; ?>
                    <?php case "berhasilHapus" :?> <strong class="me-auto">Berhasil</strong> Menghapus Data Guru <?php break ; ?>
                    <?php default : ?> <strong class="me-auto">Gagal</strong> Tidak Melakukan Apapun <?php break ; ?>
                <?php } ?>
                </div>
            </div>
        </div>
    <?php endif ; ?>
    <!-- !SECTION INFO STATUS AKSI -->

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
                </ul>
            </div>
            
            <div class="bg-success rounded-4 p-4 mt-3">

                <form action="../aksi.php?paramAksi=cari&paramTable=guru&paramHalaman=daftar_guru.php" method="post">
                    <div class="input-group w-25 ms-auto">
                        <input type="text" class="form-control rounded-pill rounded-end" name="keyword">
                        <button class="btn btn-primary rounded-pill rounded-start">Cari</button>
                    </div>
                </form>

                <!-- HEADER TABLE -->
                <div class="mt-4 d-flex bg-dark p-3" style="box-shadow: -10px -10px 0px rgb(171, 171, 171);">
                    <h3 class="text-white">Daftar Guru</h3>
                    <div class="dropstart-center dropstart" style="margin-left: auto;">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Status Guru
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="../aksi.php?paramAksi=status&paramTable=guru&paramHalaman=daftar_guru.php&halamanUser=<?= $halaman ?>" method="post">
                                    <button class="dropdown-item">
                                        <input type="text" class="form-control rounded-pill rounded-end" name="keyword" value="0" hidden>
                                        <img src="../icon/teacher2.png" width="35rem" alt="">
                                        Guru Mapel
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="../aksi.php?paramAksi=status&paramTable=guru&paramHalaman=daftar_guru.php&halamanUser=<?= $halaman ?>" method="post">
                                    <button class="dropdown-item">
                                        <input type="text" class="form-control rounded-pill rounded-end" name="keyword" value="1" hidden>
                                        <img src="../icon/teacher.png" width="35rem" alt="">
                                        Wali Kelas
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- AKHIR HEADER TABLE -->
                <!-- TABLE AKUN GURU -->
                <div class="p-3">
                    <table class="table table-light table-striped mb-5 m-auto">
                        <tr>
                            <th colspan="8">
                                <button class="btn btn-info w-100 text-white fw-bold">Export to PDF</button>
                            </th>
                        </tr>
                        <tr class="text-center">
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Alamat</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $i=1; ?>
                        <?php foreach($dataGuru as $data) : ?>
                        <tr class="text-center">
                            <td><?= $i ?></td>
                            <td><?= $data['nip'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jk'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['password'] ?></td>
                            <td><?= $data['is_walikelas'] == 1 ? 'Wali Kelas' : 'Guru Mapel' ?></td>
                            <td class="gap-2">
                                <button class="bg-transparent border-0">
                                    <a href="../aksi.php?id=<?= $data['id'] ?>&paramTable=guru&paramAksi=delete&paramHalaman=daftar_guru.php&halamanUser=<?= $halamanAktif ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>" onclick="return confirm('Yakin ingin menghapus guru?')">
                                        <img src="../icon/delete1.png" width="30rem" alt="hapus">
                                    </a>
                                </button>
                                <button class="bg-transparent border-0" type="button" data-bs-target="#editguru<?= $data['id'] ?>" data-bs-toggle="modal">
                                    <img src="../icon/edit1.png" width="30rem" alt="edit">
                                </button>

                            <!-- AWAL POP UP EDIT -->
                            <div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="editguru<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header border-0 text-white" style="background: linear-gradient(120deg,#4433ff,#00ffff);">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Akun</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-secondary">
                                            <form action="../aksi.php?id=<?= $data['id'] ?>&paramTable=guru&paramAksi=edit&paramHalaman=daftar_guru.php&halamanUser=<?= $halamanAktif ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>" method="post">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="nip" class="form-label text-white d-flex">NIP :</label>
                                                        <input type="text" name="nip" class="form-control" id="nip" value="<?= $data['nip'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label text-white d-flex">Nama :</label>
                                                        <input type="text" class="form-control" id="nama" value="<?= $data['nama'] ?>" name="nama">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jk" class="form-label text-white d-flex">Jenis Kelamin :</label>
                                                        <select class="form-select w-25" aria-label="Default select example" name="jk" id="jk">
                                                                <option selected value="<?= $data['jk'] ?>"><?= $data['jk'] ?></option>
                                                            <?php if($data['jk'] === 'L') : ?>
                                                                <option value="P">P</option> 
                                                            <?php else : ?>
                                                                <option value="L">L</option>
                                                            <?php endif ; ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat" class="form-label text-white d-flex">Alamat :</label>
                                                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="3"><?= $data['alamat'] ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="is_walikelas" class="form-label text-white d-flex">Status Guru :</label>
                                                        <select class="form-select w-25" aria-label="Default select example" name="is_walikelas" id="is_walikelas">
                                                            <?php if($data['is_walikelas'] === '0') : ?>
                                                                <option selected value="<?= $data['is_walikelas'] ?>">Guru Mapel</option>
                                                            <?php else : ?>
                                                                <option selected value="<?= $data['is_walikelas'] ?>">Wali Kelas</option>
                                                            <?php endif ; ?>

                                                            <?php if($data['is_walikelas'] === '0') : ?>
                                                                <option value="1">Wali Kelas</option>
                                                            <?php else : ?>
                                                                <option value="0">Guru Mapel</option>
                                                            <?php endif ; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-warning">
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
                                
                                <button class="bg-transparent border-0">
                                    <a href="../aksi.php?id=<?= $data['id'] ?>&paramTable=guru&paramAksi=acakPass&paramHalaman=daftar_guru.php&halamanUser=<?= $halamanAktif ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>&halamanUser=<?= $halamanAktif ?>" onclick="return confirm('Yakin ingin merubah Password guru?')">
                                        <img src="../icon/refresh-button.png" width="30rem" alt="Refresh">
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach ; ?>

                        <?php if ($i == 1) : ?>
                        <tr>
                            <td colspan="8" align="center"> Tidak ada Guru</td>
                        </tr>
                        <?php endif; ?>
                        
                    </table>

                    

                <!-- SECTION pagination peminjaman-->
                    <div aria-label="Page navigation example" > 
                        <ul class="pagination">
                            <?php if($jumlahHalaman != 1 || isset($_GET['keyword']) > 1) : ?>
                                <?php if ( $halamanAktif > 1 ) : ?>
                                    <li class="page-item"><a class="page-link" href="?halamanUser=<?=$halamanAktif - 1 ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>">Previous</a></li>
                                <?php endif ; ?>

                                <?php for( $i=1; $i<=$jumlahHalaman; $i++) : ?>
                                    <?php if ( $i == $halamanAktif ) : ?>
                                        <li class="page-item active"><a class="page-link" href="?halamanUser=<?= $i ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>"><?= $i ?></a></li>
                                    <?php else : ?>
                                        <li class="page-item"><a class="page-link" href="?halamanUser=<?= $i ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>"><?= $i ?></a></li>
                                    <?php endif ; ?>
                                <?php endfor ; ?>
                                
                                <?php if ( $halamanAktif < $jumlahHalaman ) : ?>
                                    <li class="page-item"><a class="page-link" href="?halamanUser=<?=$halamanAktif + 1 ?>&keyword=<?= $keyword ?>&urut=<?= $urut ?>">Next</a></li>
                                <?php endif ; ?>
                            <?php endif ; ?>
                        </ul>
                    </div>
                <!-- !SECTION pagination peminjaman-->
                    
                </div>
                <!-- AKHIR TABLE AKUN GURU -->
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