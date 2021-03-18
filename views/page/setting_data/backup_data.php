<?php

session_start();

include '../../../koneksi.php';
include '../../../app/login_cek_token.php';

// mengecek admin login atau tidak
if (!isset($_SESSION['username'])) {
?>
    <script>
        alert('Anda harus login untuk mengakses halaman ini!');
        window.location.href = '../../../index.php';
    </script>
<?php
    return false;
}

/* at the top of page */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: setting_data.php'));
}

include '../../../app/flash_message.php';

if (isset($_POST['backup'])) {
    $link = new mysqli("localhost", "root", "", "phpdasar");
    $tables = '*';

    if ($tables == '*') {
        $tables = array();
        $result = $link->query('SHOW TABLES');
        while ($row = $result->fetch_row()) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }
    foreach ($tables as $table) {
        $result = $link->query("SELECT * FROM {$table}");
        $num_fields = mysqli_num_fields($result);
        $return .= "DROP TABLE $table;";
        $result2 = $link->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();
        $return .= "\n\n" . $row2[1] . ";\n\n";
        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = $result->fetch_row()) {
                $return .= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = preg_replace("\n", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return .= '"' . $row[$j] . '"';
                    } else {
                        $return .= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return .= ',';
                    }
                }
                $return .= ");\n";
            }
        }
        $return .= "\n\n\n";
    }
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $handle = fopen('../../../backup/backup_' . date("d_m_Y") . '_' . date("H_i_s") . '.sql', 'w+');
    fwrite($handle, $return);
    fclose($handle);

	flash("msg_sukses_data", "Backup data berhasil, silahkan cek di folder backup!");
}
