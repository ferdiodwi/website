<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'db_template';

try {
    $conn = new mysqli($host, $user, $password, $dbname);
} catch (Exception $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>