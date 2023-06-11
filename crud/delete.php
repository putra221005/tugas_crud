<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM peserta WHERE id = $id";
if (mysqli_query($koneksi, $query)) {
  echo "Data berhasil dihapus";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
header("Location: data.php");
?>
