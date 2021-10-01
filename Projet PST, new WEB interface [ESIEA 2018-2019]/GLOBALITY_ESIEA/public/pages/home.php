<?php
session_start();
// echo $_SESSION;
if (!empty($_SESSION)) {
    include('../../src/php/composantPage/header.php');
    include('../../src/php/composantPage/includeCSS/homeCSS.php');
    include('../../src/php/include/accessGaranted.php');
    include('../../src/php/composantPage/footer.php');
} else {
    header("Location: ../index.php");
}

 ?>
