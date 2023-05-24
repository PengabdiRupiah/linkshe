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
// Kode koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM apa WHERE id = :id";
    $statement = $dbh->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();

    $data = $statement->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        echo "Nama: " . $data['nama'] . "<br>";
        echo "Email: " . $data['email'] . "<br>";
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "Parameter ID tidak ditemukan.";
}
?>
