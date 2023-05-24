<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HALO INI MENU 2</h1>

<?php
require 'dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id']; // Mengambil nilai id dari parameter URL
    // Query untuk mendapatkan data dengan id yang sesuai dari database
    $query = "SELECT * FROM survey_data WHERE id = $id";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $pln = mysqli_fetch_assoc($query_run);
        $dokumen = $pln['dokumen'];
        $kondisi = $pln['kondisi'];
        $p2tl = $pln['p2tl'];
        $tunggakan = $pln['tunggakan'];
        $disabled = ($dokumen == 'tidak aman' || $kondisi == 'tidak aman' || $p2tl == 'tidak aman' || $tunggakan == 'tidak aman') ? 'disabled' : '';
        $btn_class = ($disabled == 'disabled') ? 'red' : 'blue';
        ?>
        <tr>
            <td class="id"><?= $pln['id']; ?></td>
            <td data-label="nama"><?= $pln['nama']; ?></td>
            <td data-label="alamat"><?= $pln['alamat']; ?></td>
            <td data-label="dokumen"><?= $dokumen; ?></td>
            <td data-label="kondisi"><?= $kondisi; ?></td>
            <td data-label="p2tl"><?= $p2tl; ?></td>
            <td data-label="tunggakan"><?= $tunggakan; ?></td>
            <td>
                <a class="next <?= $btn_class; ?>" href="menu3.php?id=<?= $pln['id']; ?>" <?= $disabled; ?>>next</a>
            </td>
        </tr>
        <?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>

    <button onclick="location.href='index.html'">BACK</button>
</body>
</html>