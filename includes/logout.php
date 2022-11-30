<?php
    session_start();
    ?>
<?php
unset($_SESSION['logged_in']);
unset($_SESSION['user_id']);
unset($_SESSION['f_name']);
unset($_SESSION['u_name']);
unset($_SESSION['user_email']);
unset($_SESSION['ver_stat']);

session_destroy();

header ('location: ../index.php')

?>




not
$_SESSION['ve-status'] = 'true';          //This is for securing the verification page
                    $_SESSION['user_email'] = $e_mail;    //thissss..
                    $_SESSION['expected_code'] = $random_number;  