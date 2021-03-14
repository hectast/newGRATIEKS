<?php

$mysqli = new mysqli("localhost", "root", "", "phpdasar");

if ($mysqli->connect_error) {
    die("Koneksi Gagal: " . $mysqli->connect_error);
}