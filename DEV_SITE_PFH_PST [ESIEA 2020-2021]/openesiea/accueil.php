
<!doctype html>
<title>SALON PST & PFH</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no">
<link rel=icon type=image/png href=images/favicon.png>
<meta name=title content="OpenESIEA — Salon des projets étudiants de l'ESIEA Laval">
<meta name=description content="L'OpenESIEA est un salon en accès libre exposant des Projets Scientifiques et Techniques d'étudiants portant sur les thèmes de l'IA, hacking, VR et plein d'autres encore.">
<meta property="og:type" content="website">
<meta property="og:title" content="OpenESIEA">
<meta property="og:description" content="L'OpenESIEA est un salon en accès libre exposant des projets scientifiques et techniques d'étudiants portant sur les thèmes de l'ia, hacking, vr et plein d'autres encore.">
<meta property="og:url" content="http://open.esiea.fr">

<link rel=stylesheet href=assets/css/main.css>
<link rel=stylesheet href=assets/custom.css><noscript>
<link rel=stylesheet href=assets/css/noscript.css></noscript>


<?php  


try {
    $bdd=new pdo("mysql:host=localhost;dbname=salon_pst_pfh;charset=utf8", "root", "");
    
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
    ($e->getMessage());
}

$req=$bdd->prepare("SELECT * FROM pst3a  ORDER BY id_EquipePST ");

$req->execute();

$data = $req->fetchAll(PDO::FETCH_OBJ);


$req->closeCursor();



?>


<body class=is-preload  >
    <nav id=menu>
        <div class=inner>
            <h2>Salon PST & PFH</h2>
            <ul class=links>
                <li><a href=pst.php#section-projects2A>PST 2A</a>
                <li><a href=pst.php#section-projects3A>PST 3A</a>

                <li><a href=pfh.php>PFH</a>

                <li><a href=organisation.html>À PROPOS</a>
                <li><a href=equipe_salon.html>REMERCIEMENT</a> 

            </ul><a href=# class=close>Close</a>
        </div>
    </nav>
    <div id=page-wrapper>
        <header id=header class=alt>
            <div>
                <nav><a href=#menu>Menu</a></nav>
                <div id=header-buttons>
                    <a href=pst.php#section-projects2A class="button small">PST 2A</a>
                    <a href=pst.php#section-projects3A class="button small">PST 3A</a>


                    <a href=pfh.php class="button small">PFH</a>

                    <a href=organisation.html class="button small">À PROPOS</a>
					<a href=equipe_salon.html class="button small">REMERCIEMENT</a>

				</div>

            </div>
            <div><a id=header-title href=accueil.php><img src=images/esiea-white.svg></a></div>
            
        </header>
        

        <section id=banner>
      
          <!--  <div class=inner><img id=front-openesiea-logo src=images/esiea-white.svg> -->

            <br> <br> <br>

            <h2>  LE RENDEZ-VOUS <br>DES PROJETS D'UN MONDE NUMERIQUE UTILE <br><br> ESIEA Inclusive Engineering Days </h2>

            

            <br> <br><br>

            <h2>Mardi 15 Juin 2021  <br> PROJETS SCIENTIFIQUES ET TECHNIQUES (PST) </h2> 
            <h3>  </h3>
             
             <br> <br><br>
           
             <h2>Jeudi 17 Juin 2021  <br>  PROJETS DE FORMATION HUMAINE (PFH)</h2> 



                <br> <br>

                <p >de 10h30 - 12H30 puis de 14H30 - 16H30</p>
               <!-- <h1>de 10h30 - 12H30 puis de 14H30 - 16H30</h1> -->      
            
            
            
            </div>

            <div>
            
        </section>


       




        
        <section id=footer>
            <div class=inner>
                
                           <!-- <a id=esiea-logo href=https://www.esiea.fr><img src=images/esiea-white.svg styl></a> -->
                            
                         
            </div>
            
            <ul class=contact > <!-- centrer-->
                                <li class="icon solid fa-home"><a href="https://www.google.com/maps/place/74+Avenue+Maurice+Thorez,+94200+Ivry-sur-Seine/">ESIEA PARIS, 74 bis Avenue Maurice Thorez, 94200 Ivry-sur-Seine</a>
                                <li class="icon solid fa-envelope"><a href=mailto:pfh-paris@esiea.fr>pfh-paris@esiea.fr</a> 
                                <li class="icon brands fa-facebook-f"><a href=https://www.facebook.com/ESIEA />ESIEA</a>
                                <li class="icon brands fa-instagram"><a href=https://www.instagram.com/esiea_groupe/ />esiea_groupe</a>
                                <li class="icon brands fa-twitter"><a href=https://twitter.com/GroupeESIEA>Groupe ESIEA</a>
                            </ul>

        </section>
    </div>


    <script src=assets/js/jquery.min.js></script>
    <script src=assets/js/jquery.scrollex.min.js></script>
     <script src=assets/js/browser.min.js></script>
    <script src=assets/js/breakpoints.min.js></script>
   <script src=assets/js/util.js></script> 
     <script src=assets/js/main.js></script>

 </body>