<?php
$host = 'localhost'; // Ganti dengan nama host database Anda
$dbname = 'test'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan nama pengguna database Anda
$password = ''; // Ganti dengan kata sandi database Anda

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Koneksi ke database berhasil!";
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
}
?>

<?php
// ...
// Kode koneksi ke database

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "INSERT INTO apa (nama, email) VALUES (:nama, :email)";
    $statement = $dbh->prepare($query);

    $statement->bindParam(':nama', $nama);
    $statement->bindParam(':email', $email);

    if ($statement->execute()) {
        $id_terakhir = $dbh->lastInsertId();
        header("Location: index2.php?id=" . $id_terakhir);
        exit();
    } else {
        echo "Gagal memasukkan data ke dalam database.";
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contoh Form</title>
</head>
<body>
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>

