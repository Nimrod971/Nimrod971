<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../index.php");
    } else {
        include '../../src/database/database.php';
        include '../../src/php/composantPage/header.php';
        include '../../src/php/composantPage/includeCSS/projectCSS.php';
        global $db;
?>

<script src="../../src/js/scroll.js" charset="utf-8"></script>

<a href="home.php" class="returnMenu"><i class="fas fa-undo"></i></a>

<div class="header">
    <div class="header-content">
        <h1 class="header-title">Projets <blue>ESIEA</blue></h1>
    </div>
</div>

<?php
if ($_SESSION['promo'] > 0) {
    include 'projectMenu/student/student.php';
} else {
    include 'projectMenu/teacher/teacher.php';
}
?>


<?php
    include '../../src/php/composantPage/footer.php';
    }
 ?>
