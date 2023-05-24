<?php
require 'dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM repo WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $dokumen = $row['dokumen'];
        $kondisi = $row['kondisi'];
        $p2tl = $row['p2tl'];
        $tunggakan = $row['tunggakan'];

        $insertQuery = "INSERT INTO tb_3 (nama, alamat, dokumen, kondisi, p2tl, tunggakan) VALUES ('$nama', '$alamat', '$dokumen', '$kondisi', '$p2tl', '$tunggakan')";
        mysqli_query($conn, $insertQuery);

        $deleteQuery = "DELETE FROM repo WHERE id = $id";
        mysqli_query($conn, $deleteQuery);

        header("Location: daftar.php"); 
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Tampil Data Survey</title>
</head>

<body>
    <div class="container-tbl">
        <h1>Tampil Data Survey</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Dokumen</th>
                    <th>Kondisi</th>
                    <th>P2TL</th>
                    <th>Tunggakan</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM repo";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    while ($pln = mysqli_fetch_assoc($query_run)) {
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
                                <?php if ($disabled == '') { ?>
                            <a class="next <?= $btn_class; ?>" href="insert_data2.php?id=<?= $pln['id']; ?>&redirect=daftar.php">next</a><?php } ?>
                            </td>
                        </tr>
            <?php
                 }
             }
            ?>      
        </tbody>
    </table>
</div>
<script src="func.js"></script>
<button onclick="location.href='index.html'">BACK</button>
</body>
</html>
