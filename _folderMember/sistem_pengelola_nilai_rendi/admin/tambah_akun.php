<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body{
            background: url(../../bg/bg6.jpg);
            background-size: cover;
            background-attachment: fixed;
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
    
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
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
                <a class="nav-link active fw-bold text-dark" aria-current="page" href="beranda.html">
                    <img src="../icon/lease.png" class="ms-2" width="40rem" alt=""><br>
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-dark text-decoration-underline" href="tambah_akun.html">
                    <img src="../icon/add-user.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Akun
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-dark" href="tambah_mapel.html">
                    <img src="../icon/lesson.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Mapel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-dark" href="tambah_kelas_jurusan.html">
                    <img src="../icon/presentation.png" class="ms-5" width="40rem" alt=""><br>
                    Tambah Kelas & Jurusan
                </a>
            </li>
        </ul>
        <div class="row container-fluid">
            <div class="col">
                <div class="container bg-secondary mt-5 p-4 rounded-3 border border-2 border-white">
                    <form action="">
                        <div class="mb-3">
                            <h3 class="text-white">Tambah Akun Guru</h3>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kode" class="form-label text-white">Kode Guru :</label>
                                    <input type="text" class="form-control" id="kode">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label text-white">Username :</label>
                                    <input type="text" class="form-control" id="username">
                                </div>
                            </div>
                            <div class="col">
                                <div class="col mb-3">
                                    <label for="kelas" class="form-label text-white">Status :</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="1">Guru Mapel</option>
                                        <option value="2">Wali Kelas</option>
                                    </select>
                                  </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label text-white">Password :</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-warning">
                                <img src="../icon/cancel.png" width="20rem" alt="">
                                Batal
                            </button>
                            <button class="btn btn-info">
                                <img src="../icon/add.png" width="20rem" alt="">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="container bg-secondary mt-5 p-4 rounded-3 border border-2 border-white">
                    <form action="">
                        <div class="mb-3">
                            <h3 class="text-white">Tambah Akun Murid</h3>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="username" class="form-label text-white">Username :</label>
                                    <input type="text" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="kontak" class="form-label text-white">Kontak :</label>
                                    <input type="number" class="form-control" id="kontak">
                                </div>
                            </div>
                            <div class="col">
                                <div class="col mb-3">
                                    <label for="kelas" class="form-label text-white">Kelas:</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="1">X</option>
                                        <option value="2">XI</option>
                                        <option value="3">XII</option>
                                        <option value="4">XIII</option>
                                    </select>
                                  </div>
                                  <div class="col mb-3">
                                    <label for="jurusan" class="form-label text-white">Jururan :</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="1">PPLG 1</option>
                                        <option value="2">PPLG 2</option>
                                        <option value="3">RPL 1</option>
                                        <option value="4">RPL 2</option>
                                    </select>
                                  </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-warning">
                                <img src="../icon/cancel.png" width="20rem" alt="">
                                Batal
                            </button>
                            <button class="btn btn-info">
                                <img src="../icon/add.png" width="20rem" alt="">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>