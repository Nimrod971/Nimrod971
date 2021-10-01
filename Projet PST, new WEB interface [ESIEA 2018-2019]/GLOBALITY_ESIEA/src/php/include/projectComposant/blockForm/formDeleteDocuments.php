<div class="pop" id="pop" style="display: block">
    <h3 class="title">Supprimer Document</h3>
    <button type="button" class="clsMenu" name="button" onclick="clsPop()">+</button>
    <form class="deleteFiles" action="#" method="post" enctype="multipart/form-data">
        <?php
            $pathToFiles = '../../../../src/data/projects/'.$project['name'].'/';
            // echo 'path : '.$pathToFiles.'</br>';


            $allDocuments = scandir($pathToFiles.'files/');
            // var_dump($allDocuments);

            if ($cptDocuments == 0)  {
                echo '<p class="information">Aucun documents disponible </br></p>';
            } else {
                for($i = 2; $i <= $cptDocuments+1; $i++) {
                    printDeleteElement('Document', $allDocuments[$i], $i);
                }
            }
         ?>
    </form>
</div>
