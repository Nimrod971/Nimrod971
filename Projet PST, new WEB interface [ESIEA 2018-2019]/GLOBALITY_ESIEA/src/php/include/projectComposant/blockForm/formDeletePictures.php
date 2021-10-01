<div class="pop" id="pop" style="display: block">
    <h3 class="title">Supprimer Images</h3>
    <button type="button" class="clsMenu" name="button" onclick="clsPop()">+</button>
    <form class="deleteFiles" action="#" method="post" enctype="multipart/form-data">
        <?php
            $pathToFiles = '../../../../src/data/projects/'.$project['name'].'/';
            // echo 'path : '.$pathToFiles.'</br>';


            $allPictures = scandir($pathToFiles.'pictures/');
            // var_dump($allDocuments);

            if ($cptPictures == 0)  {
                echo '<p class="information">Aucun documents disponible </br></p>';
            } else {
                for($i = 2; $i <= $cptPictures+1; $i++) {
                    printDeleteElement('Picture', $allPictures[$i], $i);
                }
            }
         ?>
    </form>
</div>
