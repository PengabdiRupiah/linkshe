<?php
require 'dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM tb_1 WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $daya = $row['daya'];
        $notelp = $row['no_telp'];
        $instalasi = $row['instalasi'];

        $insertQuery = "INSERT INTO tb_2 (nama, alamat, daya, no_telp, instalasi) VALUES ('$nama', '$alamat', '$daya', '$notelp', '$instalasi')";
        mysqli_query($conn, $insertQuery);

        $deleteQuery = "DELETE FROM tb_1 WHERE id = $id";
        mysqli_query($conn, $deleteQuery);

        header("Location: menu22.php"); 
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tampil Data Survey</title>
</head>

<body>
    <div class="container-tbl">
        <h1>Tampil Data Survey</h1>
        <table>
            <thead>
                <tr>
                    <th class="id">No</th>
                    <th >Nama</th>
                    <th>Alamat</th>
                    <th>Daya</th>
                    <th>No.Telp</th>
                    <th>Instalasi</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tb_1";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    while ($pln = mysqli_fetch_assoc($query_run)) {
                        $instalasi = $pln['instalasi'];
                        $disabled = ($instalasi == 'tidak aman') ? 'disabled' : '';
                        $btn_class = ($disabled == 'disabled') ? 'red' : 'blue';
                ?>
                        <tr>
                            <td class="id"><?= $pln['id']; ?></td>
                            <td data-label="nama"><?= $pln['nama']; ?></td>
                            <td data-label="alamat"><?= $pln['alamat']; ?></td>
                            <td data-label="daya"><?= $pln['daya']; ?></td>
                            <td data-label="no_telp"><?= $pln['no_telp']; ?></td>
                            <td data-label="instalasi"><?= $instalasi; ?></td>
                            <td>
                            <?php if ($disabled == '') { ?>
                            <a class="next <?= $btn_class; ?>" href="insert_data.php?id=<?= $pln['id']; ?>&redirect=menu22.php">next</a><?php } ?>
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
    <!-- <button onclick="location.href='menu4.php'">TAMBAH</button><br> -->
    <button onclick="location.href='index.html'">BACK</button>

</body>

</html>
