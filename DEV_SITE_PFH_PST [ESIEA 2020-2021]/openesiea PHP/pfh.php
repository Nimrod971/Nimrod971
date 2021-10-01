
<!doctype html>
<title>SALON Projets de Formation Humaine</title>
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

$req=$bdd->prepare("SELECT * FROM pst3a  ORDER BY horraire  ");

$req->execute();

$data = $req->fetchAll(PDO::FETCH_OBJ);


$req->closeCursor();



?>


<body class=is-preload>
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
            
            <div class=inner>
               
                <h2>Projets de Formation Humaine</h2>
                <p> L’équipe PFH Salon a le plaisir de vous présenter l’édition 2021.
                    Les équipes vous accueilleront pour vous présenter leur projet traitant de 
                    différents thèmes tels que la science, l’environnement, le social, le business,
                    la culture, l’éducation.</p>
                    <p class=team>Nous vous souhaitons bonne visite !
                        <br>Equipe Salon 2A et 3A</p>


            
            </div>

           
            
        </section>


       



        <section id=wrapper>

            <section id=section-projects class="wrapper alt style2"> 
                <div class=inner>
                   <div class=content> 
                       <h2 class=major>Projets de Formation Humaine</h2>
                      
                      
                       <p> L’équipe PFH Salon a le plaisir de vous présenter l’édition 2021.
                    Les équipes vous accueilleront pour vous présenter leur projet traitant de 
                    différents thèmes tels que la science, l’environnement, le social, le business,
                    la culture, l’éducation.</p>


                    <p class=team>Nous vous souhaitons bonne visite !
                                 <br>Equipe Salon 2A et 3A</p>


                                
                 </div>
                 <br>
                 <br>
                
             </section>
          
            <section id=section-projects2A class="wrapper alt style3">
                <div class=inner>
                    <div class=content>
                        <br>
                        
                            <br>
                            
                            <section class=features>
                                   
                                   
                            <?php foreach($data as $produit):  ?> 
                                <article id=pst-yukelec><a class=image><img src="<?= $produit->image_PST ?>"></a>
                                    <h3 class=pst-no>PST <?= $produit->id_EquipePST ?></h3>
                                    <h2 class=major><?= $produit->nom_PST ?></h2>
                                    <h1 class=major><?= $produit->phrase_acroche ?></h1>
                                    <p><?= $produit->descriptif_PST ?> </p>
                                        <p class=team><?= $produit->equipe_PST ?> </p>
                                        <p class=team>TUTEUR / TUTRICE : <?= $produit->tutor_PST ?> </p>
                                </article>
                                <?php endforeach; ?>


                                    
                                </section>
                    </div>
                </div>
            </section>

            <section id=section-projects3A class="wrapper alt style3">
                <div class=inner>
                    <div class=content>
                        <br>
                        <h2 class=major>Projet Scientifiques et Techniques de 3ème Année (PST 3A) !</h2>
                        <p>Les étudiants en 3ème de l'ESIEA ont le plaisir de vous présenter leurs projets. Ces étudiants sont dans le cycle ingénieur
                           et effecuteront pour leur première expérience profesionnelle l'année prochaine afin de mener vers la réussite un projet Entreprise. <p><strong>Revenez en 2022 pour de nouveaux projets et de nouveaux étudiants.</strong>
                            
                            <section class=features>
                                
                            <?php foreach($data as $produit):  ?> 
                                <article id=pst-yukelec><a class=image><img src="<?= $produit->image_PST ?>"></a>
                                    <h3 class=pst-no>PST <?= $produit->id_EquipePST ?></h3>
                                    <h2 class=major><?= $produit->nom_PST ?></h2>
                                    <h1 class=major><?= $produit->phrase_acroche ?></h1>
                                    <p><?= $produit->descriptif_PST ?> </p>
                                        <p class=team><?= $produit->equipe_PST ?> </p>
                                        <p class=team>TUTEUR / TUTRICE : <?= $produit->tutor_PST ?> </p>
                                </article>
                                <?php endforeach; ?>

                            </section>
                    </div>
            </section>
        </section>


        </section>
        <section id=section-conference class="wrapper spotlight style1">
            <div class=inner><a class=image><img src=images/conf-turing-machine.jpg></a>
                <div class=content>
                    <h2 class=major>Conférence &mdash; De l'origine de vos ordinateurs&nbsp;: la machine&nbsp;de&nbsp;Turing</h2>
                    <p><a target=_blank class=button style=opacity:.5;background:grey>Conférence terminée</a>
                        <p>Nous avons l'honneur d'accueillir <strong>Marc Raynaud</strong> pour une conférence portant sur la <strong>Machine de Turing</strong>. Elle a posé les bases de l'informatique moderne. Cet ancien professeur de mathématique
                            en a fabriqué une avec des technologies simples et même des LEGO®. Il vous présentera le principe de la machine de Turing, la théorie derrière ses concepts ainsi que sa propre version de la machine de Turing avec des
                            démonstrations.<h3 class=team>Conférence en ligne de 15H à 16H.</h3>
                </div>
            </div>
        </section>
        <section id=footer>
            <div class=inner>
                
            <ul class=contact>

				<li class="icon solid fa-home"><a href="https://www.google.com/maps/place/74+Avenue+Maurice+Thorez,+94200+Ivry-sur-Seine/">ESIEA PARIS, 74 bis Avenue Maurice Thorez, 94200 Ivry-sur-Seine</a>
				<li class="icon solid fa-envelope"><a href=mailto:pfh-paris@esiea.fr>pfh-paris@esiea.fr</a> 
				<li class="icon brands fa-facebook-f"><a href=https://www.facebook.com/ESIEA />ESIEA</a>
				<li class="icon brands fa-instagram"><a href=https://www.instagram.com/esiea_groupe/ />esiea_groupe</a>
				<li class="icon brands fa-twitter"><a href=https://twitter.com/GroupeESIEA>Groupe ESIEA</a>
			</ul><a id=esiea-logo href=https://www.esiea.fr><img src=images/esiea-white.svg styl></a>
			<ul class=copyright>
				<li>Design: <a href=http://html5up.net>HTML5 UP</a>
			</ul>
            </div>
        </section>
    </div>


    <script src=assets/js/jquery.min.js></script>
    <script src=assets/js/jquery.scrollex.min.js></script>
     <script src=assets/js/browser.min.js></script>
    <script src=assets/js/breakpoints.min.js></script>
   <script src=assets/js/util.js></script> 
     <script src=assets/js/main.js></script>

 </body>