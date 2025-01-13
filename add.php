<?php
include 'db.php';
include 'auth.php';

require_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $conn->query("INSERT INTO barang (nama_barang, jumlah, harga, tanggal_masuk) VALUES ('$nama_barang', $jumlah, $harga, '$tanggal_masuk')");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fbe9e7;
            color: #5d4037;
        }

        header {
            background-color: #8d6e63;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 500px;
            margin: 30px auto;
            background-color: #efebe9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #a1887f;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            padding: 10px;
            background-color: #8d6e63;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #6d4c41;
        }

        a {
            text-decoration: none;
            color: #8d6e63;
            font-size: 14px;
            display: inline-block;
            margin-top: 10px;
        }

        a:hover {
            color: #5d4037;
        }
    </style>
</head>
<body>
<header>
    Tambah Barang
</header>
<div class="container">
    <form action="" method="POST">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required>

        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" required>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" required>

        <label for="tanggal_masuk">Tanggal Masuk:</label>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" required>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</div>
</body>
</html>
