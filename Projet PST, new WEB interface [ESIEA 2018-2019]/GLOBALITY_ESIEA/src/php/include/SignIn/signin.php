<?php
if(isset($_POST['formSignIn'])) {
    extract($_POST);
    $Susername  = htmlspecialchars($Susername);
    $Semail     = htmlspecialchars($Semail);
    $Spassword  = htmlspecialchars($Spassword);
    $SCpassword = htmlspecialchars($SCpassword);
    $Syear      = htmlspecialchars($Syear);
    $Sclass     =htmlspecialchars($Sclass);

    global $db;

    if (!empty($Susername) && !empty($Semail) && !empty($Spassword) && !empty($SCpassword)) {

        if ($Spassword == $SCpassword) {
            $options = ['cost' => 12];
            $hashPassword = password_hash($Spassword, PASSWORD_BCRYPT, $options);

            $checkUsernameSQL = "SELECT username FROM users WHERE username = :username";
            $checkUsername = $db->prepare($checkUsernameSQL);
            $checkUsername->execute(['username' => $Susername]);
            $cptUsername = $checkUsername->rowCount();

            $checkEmailSQL = "SELECT email FROM users WHERE email = :email";
            $checkEmail = $db->prepare($checkEmailSQL);
            $checkEmail->execute(['email' => $Semail]);
            $cptEmail = $checkEmail->rowCount();

            if ($cptUsername == 0 && $cptEmail == 0) {
                $addElementSQL = "INSERT INTO users(username, promo, class, email, password) VALUES(:username, :promo, :class, :email, :password)";
                $q = $db->prepare($addElementSQL);
                $q->execute([
                    'username' => $Susername,
                    'promo'    => $Syear,
                    'class'    => $Sclass,
                    'email'    => $Semail,
                    'password' => $hashPassword,
                ]);
                include '../src/php/include/SignIn/newAccount.php';
            } else {
                include '../src/php/include/SignIn/incorrectProfil.php';
            }

        } else {
            include '../src/php/include/SignIn/incorrectPassword.php';
        }
    } else {
        include '../src/php/include/SignIn/incorrectInput.php';
    }
}
 ?>
