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


if (isset($_POST['submit_restore'])) {
    function restoreMysqlDB($filePath, $mysqli)
    {
        $sql = '';
        $error = '';

        if (file_exists($filePath)) {
            $lines = file($filePath);

            foreach ($lines as $line) {

                // Ignoring comments from the SQL script
                if (substr($line, 0, 2) == '--' || $line == '') {
                    continue;
                }

                $sql .= $line;

                if (substr(trim($line), -1, 1) == ';') {
                    $result = $mysqli->query($sql);
                    if (!$result) {
                        $error .= mysqli_error($mysqli) . "\n";
                    }
                    $sql = '';
                }
            } // end foreach

            if ($error) {
                $response = array(
                    "type" => "error",
                    "message" => $error
                );
            } else {
                $response = array(
                    "type" => "success",
                    "message" => "Restore Data Berhasil."
                );
            }
        } // end if file exists
        return $response;
    }

    if (!empty($_FILES)) {
        // Validating SQL file type by extensions
        if (!in_array(strtolower(pathinfo($_FILES["file_sql"]["name"], PATHINFO_EXTENSION)), array(
            "sql"
        ))) {
            $response = array(
                "type" => "error",
                "message" => "Invalid File Type"
            );
        } else {
            $uploaddir = '../../../restore/';
            $alamatfile = $uploaddir . $_FILES["file_sql"]["name"];
            if (is_uploaded_file($_FILES["file_sql"]["tmp_name"])) {
                move_uploaded_file($_FILES["file_sql"]["tmp_name"], $alamatfile);
                $response = restoreMysqlDB($_FILES["file_sql"]["name"], $mysqli);

                flash("msg_sukses_data", "Restore data berhasil!");
            }
        }
    }
}
