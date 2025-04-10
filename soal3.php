<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "testdb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hobi = $_POST['hobi'];

    $person = "SELECT * FROM person 
    LEFT JOIN hobi 
    ON person.id = hobi.person_id 
    WHERE
    ('$nama' != '' AND person.nama LIKE '%$nama%')
    OR ('$alamat' != '' AND person.alamat LIKE '%$alamat%')
    OR ('$hobi' != '' AND hobi.hobi LIKE '%$hobi%')";

    $result = $conn->query($person);
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" style="margin-bottom:20px;">
        <thead>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['hobi'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Tidak ada data ditemukan.";
            } ?>

        </tbody>
    </table>
    <table>
        <form action="" method="POST">
            <tr>
                <td><label>Nama</label></td>
                <td>
                    <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td><label>Alamat</label></td>
                <td>
                    <input type="text" name="alamat">
                </td>

            </tr>
            <tr>
                <td><label>Hobi</label></td>
                <td>
                    <input type="text" name="hobi">
                </td>
            </tr>
            <tr>
                <td><button type="submit">Kirim</button></td>
            </tr>
        </form>
    </table>
</body>

</html>