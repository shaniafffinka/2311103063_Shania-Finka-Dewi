<?php
include 'config.php'; // memanggil koneksi database

// form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $mobil = $_POST['mobil'];
    $alamat = $_POST['alamat'];

    // Validasi nomor telepon hanya boleh angka
    if (!ctype_digit($nomor_telepon)) {
        echo "<script>alert('Please use numbers');</script>";
    } else {
        // Query untuk memasukkan data ke database
        $sql = "INSERT INTO pembelian (nama, email, nomor_telepon, mobil, alamat) 
                VALUES ('$nama', '$email', '$nomor_telepon', '$mobil', '$alamat')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Pembelian berhasil!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Mobil</title>
    <link rel="stylesheet" href="style.css"> <!-- Memanggil file CSS -->
</head>
<body>
    <div class="container">
        <h2>Form Pembelian Mobil</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" required pattern="[0-9]+" title="Please use numbers">
            </div>

            <div class="form-group">
                <label for="mobil">Pilih Mobil:</label>
                <select id="mobil" name="mobil" required>
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Truck">Truck</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Pengiriman:</label>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>

            <div class="button-container">
                <button type="submit">Beli Mobil</button>
            </div>
        </form>
    </div>

    <div class="container">
        <h3>Data Pembelian:</h3>
        <div class="table-container">
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Mobil</th>
                    <th>Alamat Pengiriman</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM pembelian");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['nomor_telepon']}</td>
                            <td>{$row['mobil']}</td>
                            <td>{$row['alamat']}</td>
                          </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
