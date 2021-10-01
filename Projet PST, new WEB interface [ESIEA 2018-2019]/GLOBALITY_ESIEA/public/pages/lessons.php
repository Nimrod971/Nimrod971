<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../index.php");
    } else {
    include '../../src/database/database.php';
    include '../../src/php/composantPage/header.php';
    include '../../src/php/composantPage/includeCSS/lessonsCSS.php';
 ?>

 <script src="../../src/js/scroll.js" charset="utf-8"></script>

 <div class="header">
     <div class="header-content">
         <h2 class="header-title">Cours <blue>ESIEA</blue></h2>
     </div>
 </div>

 <div id="openMenuESIEA" class="openESIEA">
     <div class="subjects">
         <div class="subjects-content">
             <h2 class="title">1A</h2>
             <nav class="subjects-menu">
                 <a href="lessonsMenu/infoMaths.php?promo=1" class="subject-link">Mathématiques</a>
                 <a href="lessonsMenu/infoInformatic.php?promo=1" class="subject-link">Informatique</a>
                 <a href="lessonsMenu/infoElectronic.php?promo=1" class="subject-link">Electronique</a>
                 <a href="lessonsMenu/infoMecanic.php?promo=1" class="subject-link">Mécanique</a>
             </nav>
         </div>
     </div>

     <div class="subjects">
         <div class="subjects-content">
             <h2 class="title">2A</h2>
             <nav class="subjects-menu">
                 <a href="lessonsMenu/infoMaths.php?promo=2" class="subject-link">Mathématiques</a>
                 <a href="lessonsMenu/infoInformatic.php?promo=2" class="subject-link">Informatique</a>
                 <a href="lessonsMenu/infoElectronic.php?promo=2" class="subject-link">Electronique</a>
                 <a href="lessonsMenu/infoMecanic.php?promo=2" class="subject-link">Mécanique</a>
             </nav>
         </div>
     </div>

     <div class="subjects">
         <div class="subjects-content">
             <h2 class="title">3A</h2>
             <nav class="subjects-menu">
                 <a href="lessonsMenu/infoMaths.php?promo=3" class="subject-link">Mathématiques</a>
                 <a href="lessonsMenu/infoInformatic.php?promo=3" class="subject-link">Informatique</a>
                 <a href="lessonsMenu/infoElectronic.php?promo=3" class="subject-link">Electronique</a>
                 <a href="lessonsMenu/infoMecanic.php?promo=3" class="subject-link">Mécanique</a>
             </nav>
         </div>
     </div>
 </div>

 <a href="home.php" class="returnMenu"><i class="fas fa-undo"></i></a>

 <?php
    include '../../src/php/composantPage/footer.php';
    }
  ?>
