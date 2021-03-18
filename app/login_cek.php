<?php
    
    include 'login_function.php';
    include 'app/flash_message.php';


    if (isset($_POST['login'])) {
        $username = anti_injection($_POST['username']);
        $pass = anti_injection($_POST['password']);

            if (!empty($username) && !empty($pass)) {
                $sql_query = "SELECT * FROM user WHERE username='$username'";
                $result = mysqli_query($mysqli, $sql_query);
                $row = mysqli_num_rows($result);

                if ($row === 1 ) {
                    $q = mysqli_fetch_assoc($result);
                    if (password_verify($pass, $q["password"])) {
                        $token = getToken(10);
                        $_SESSION['username'] = $username;
                        $_SESSION['nama'] = $q['nama'];
                        $_SESSION['token'] = $token;
    
                        $result_token = mysqli_query($mysqli, "SELECT * FROM tbl_token");
                        $row_token = mysqli_num_rows($result_token);
    
                        if ($row_token > 0) {
                            mysqli_query($mysqli, "UPDATE tbl_token SET token='$token' WHERE username='$username'");
                        } else {
                            mysqli_query($mysqli, "INSERT INTO tbl_token (username,token) VALUES ('$username','$token')");
                        }
                        
                        header('Location: main.php');
                        exit;
                    } else {
                        flash("msg_gagal_data", "Password yang anda masukkan salah!");
                        return false;
                    }
                } else {
                    flash("msg_gagal_data", "Username yang anda masukkan salah!");
                    return false;
                }
            } else {
                flash("msg_gagal_data", "Mohon masukkan username dan password anda!");
                return false;
            }
    }