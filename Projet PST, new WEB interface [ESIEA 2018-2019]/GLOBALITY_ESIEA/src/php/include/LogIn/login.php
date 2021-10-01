<?php
    global $db;
    if (isset($_POST['formLogIn'])) {
        extract($_POST);
        if (!empty($Lusername) && !empty($Lpassword)) {
            $Lusername = htmlspecialchars($Lusername);
            $Lpassword = htmlspecialchars($Lpassword);
            $searchUserSQL = "SELECT * FROM users WHERE username = :username";
            $searchUser = $db->prepare($searchUserSQL);
            $searchUser->execute(['username' => $Lusername]);
            $userExist = $searchUser->fetch();

            if ($userExist == true) {
                $hashPassword = $userExist['password'];
                if (password_verify($Lpassword, $hashPassword)) {
                    session_start();
                    $_SESSION['id']        = $userExist['id'];
                    $_SESSION['username']  = $userExist['username'];
                    $_SESSION['promo']     = $userExist['promo'];
                    $_SESSION['email']     = $userExist['email'];
                    $_SESSION['theme']     = $userExist['theme'];
                    $_SESSION['connected'] = 0;
                    ob_start();
                    header("Location: pages/home.php");
                } else {
                    include '../src/php/include/LogIn/incorrectPassword.php';
                }

            } else {
                include '../src/php/include/LogIn/incorrectAccount.php';
            }
        } else {
            include '../src/php/include/LogIn/incorrectConnexion.php';
        }
    }
 ?>
