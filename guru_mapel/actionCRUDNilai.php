<?php

require "../functions.php";

if (isset($_GET["hapusNilai"])){
  $idNilai = $_POST["idNilai"];

  $sqlHapusNilai = "DELETE FROM nilai WHERE id_nilai = $idNilai";
  $queryHapusNilai = mysqli_query($link, $sqlHapusNilai);

  header("Location: beranda.php?bHapus");
}