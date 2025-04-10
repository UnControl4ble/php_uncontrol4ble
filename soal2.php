<table>
    <form action="" method="POST">
        <tr>
            <td><label>Nama Anda:</label></td>
            <td>
                <input type="text" name="nama" required>
            </td>
        </tr>
        <tr>
            <td><label>Umur Anda:</label></td>
            <td>
                <input type="text" name="umur" required>
            </td>

        </tr>
        <tr>
            <td><label>Hobi Anda:</label></td>
            <td>
                <input type="text" name="hobi" required>
            </td>
        </tr>
        <tr>
            <td><button type="submit">Kirim</button></td>
        </tr>
    </form>
</table>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $hobi = $_POST['hobi'];
    echo "<table>";
    echo "<tr>";
    echo "<td>Nama : $nama </td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Umur : $umur </td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Hobi : $hobi </td>";
    echo "</tr>";
    echo "</table>";
}
?>