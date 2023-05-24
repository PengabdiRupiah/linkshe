<?php
require 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];

  $query = "SELECT * FROM tb_3 WHERE id = '$id'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $dokumen = $row['dokumen'];
    $kondisi = $row['kondisi'];
    $p2tl = $row['p2tl'];
    $tunggakan = $row['tunggakan'];

    $insertQuery = "INSERT INTO tb_4 (nama, alamat, dokumen, kondisi, p2tl, tunggakan) VALUES ('$nama', '$alamat', '$dokumen', '$kondisi', '$p2tl', '$tunggakan')";

    if (mysqli_query($conn, $insertQuery)) {
      $deleteQuery = "DELETE FROM tb_3 WHERE id = '$id'";
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
