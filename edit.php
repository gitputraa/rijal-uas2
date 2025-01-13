<?php
include 'db.php';
include 'auth.php';

require_login();

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM barang WHERE id = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $conn->query("UPDATE barang SET nama_barang = '$nama_barang', jumlah = $jumlah, harga = $harga, tanggal_masuk = '$tanggal_masuk' WHERE id = $id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fbe9e7;
            color: #5d4037;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #efebe9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #8d6e63;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #6d4c41;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #a1887f;
            border-radius: 5px;
            font-size: 14px;
            color: #5d4037;
            background-color: #fff;
        }

        button {
            padding: 10px;
            background-color: #8d6e63;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #6d4c41;
        }

        a {
            display: inline-block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #8d6e63;
            font-size: 14px;
        }

        a:hover {
            color: #6d4c41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Barang</h1>
        <form action="" method="POST">
            <label>Nama Barang:</label>
            <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" required>

            <label>Jumlah:</label>
            <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" required>

            <label>Harga:</label>
            <input type="number" step="0.01" name="harga" value="<?= $data['harga'] ?>" required>

            <label>Tanggal Masuk:</label>
            <input type="date" name="tanggal_masuk" value="<?= $data['tanggal_masuk'] ?>" required>

            <button type="submit">Update</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
