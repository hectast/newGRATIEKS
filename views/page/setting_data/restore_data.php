<?php
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
include '../../../koneksi.php';
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
            $namefile = $_FILES["file_sql"]["name"];
            $uploaddir = '../../../restore/';
            $alamatfile = $uploaddir.$namefile;
            if (is_uploaded_file($_FILES["file_sql"]["tmp_name"])) {
                move_uploaded_file($_FILES["file_sql"]["tmp_name"], $alamatfile);
                $response = restoreMysqlDB($alamatfile, $mysqli);
                unlink($alamatfile);

                flash("msg_sukses_data", "Restore data berhasil!");
            }
        }
    }
}
