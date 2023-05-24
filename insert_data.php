<?php
require 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];

  $query = "SELECT * FROM tb_1 WHERE id = '$id'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $daya = $row['daya'];
    $notelp = $row['no_telp'];
    $instalasi = $row['instalasi'];

    $insertQuery = "INSERT INTO tb_2 (nama, alamat, daya, no_telp, instalasi) VALUES ('$nama', '$alamat', '$daya', '$notelp', '$instalasi')";

    if (mysqli_query($conn, $insertQuery)) {
      $deleteQuery = "DELETE FROM tb_1 WHERE id = '$id'";
      if (mysqli_query($conn, $deleteQuery)) {
        if (isset($_GET['redirect'])) {
          $redirect = $_GET['redirect'];
          mysqli_close($conn);
          header("Location: $redirect"); 
          exit();
        } else {
          echo "Data inserted and deleted successfully";
        }
      } else {
        echo "Error deleting data: " . mysqli_error($conn);
      }
    } else {
      echo "Error inserting data: " . mysqli_error($conn);
    }
  } else {
    echo "No data found with the given ID";
  }
}

mysqli_close($conn);
?>
