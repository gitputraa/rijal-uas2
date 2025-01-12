<?php
include 'db.php';
include 'auth.php';

require_login();

$id = $_GET['id'];
$conn->query("DELETE FROM barang WHERE id = $id");
header('Location: index.php');
?>
