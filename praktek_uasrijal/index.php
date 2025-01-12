<?php
include 'db.php';
include 'auth.php';

require_login();

$result = $conn->query("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inventaris</title>
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
            max-width: 1000px;
            margin: 20px auto;
            background-color: #efebe9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .welcome {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #8d6e63;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        a.button:hover {
            background-color: #6d4c41;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            border: 1px solid #8d6e63;
        }

        th {
            background-color: #5d4037;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #d7ccc8;
        }

        tr:nth-child(odd) {
            background-color: #efebe9;
        }

        td {
            padding: 10px;
            text-align: left;
            color: #5d4037;
            font-size: 14px;
            border: 1px solid #8d6e63;
        }

        td a {
            color: #5d4037;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        .center {
            text-align: center;
        }

        .actions a {
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
<header>
    Data Inventaris
</header>
<div class="container">
    <div class="welcome">
        Selamat datang, <?= $_SESSION['username'] ?>!
    </div>
    <div class="actions">
        <a href="logout.php" class="button">Logout</a>
        <a href="add.php" class="button">Tambah Barang</a>
    </div>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal Masuk</th>
            <th class="center">Aksi</th>
        </tr>
        <?php $no = 1; while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_barang']) ?></td>
            <td><?= htmlspecialchars($row['jumlah']) ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td><?= htmlspecialchars($row['tanggal_masuk']) ?></td>
            <td class="center">
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
