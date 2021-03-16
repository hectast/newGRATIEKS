<?php

include 'app/flash_message.php';
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $nip = $_POST['nip'];
    $pass = $_POST['password'];
    $konfir_pass = $_POST['konfir_password'];

    if (!empty($username) && !empty($nip) && !empty($pass) && !empty($konfir_pass)) {
        // username
        $query2 = "SELECT* FROM user WHERE username='{$username}'";
        $to_query2 = $mysqli->prepare($query2);
        $to_query2->execute();
        $result_query2 = $to_query2->get_result();

        // nip
        $query3 = "SELECT* FROM user WHERE nip='{$nip}'";
        $to_query3 = $mysqli->prepare($query3);
        $to_query3->execute();
        $result_query3 = $to_query3->get_result();

        // cek username dan nip
        if (mysqli_num_rows($result_query2) > 0 && mysqli_num_rows($result_query3) > 0) {
            flash("msg_gagal_data", "Username dan NIP yang anda masukkan sudah ada!");
            return false;
            // cek username
        } else if (mysqli_num_rows($result_query2) > 0) {
            flash("msg_gagal_data", "Username yang anda masukkan sudah ada!");
            return false;
            // cek nip
        } else if (mysqli_num_rows($result_query3) > 0) {
            flash("msg_gagal_data", "NIP yang anda masukkan sudah ada!");
            return false;
        }

        // konfirmasi password
        if ($konfir_pass !== $pass) {
            flash("msg_gagal_data", "Konfirmasi Password anda salah!");
            return false;
        }

        $hash_password = password_hash($konfir_pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (nama,nip,username,password) VALUES ('{$nama}', '{$nip}', '{$username}', '{$hash_password}')";
        $to_query = $mysqli->prepare($query);
        $to_query->execute();

        flash("msg_berhasil_data", "Registrasi berhasil!");
    } else {
        flash("msg_gagal_data", "Mohon lengkapi data terlebih dahulu!");
        return false;
    }
}
