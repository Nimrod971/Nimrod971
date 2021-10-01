<div class="pop" id="pop" style="display: block">
    <h3 class="title">Ajouter un fichier</h3>
    <button type="button" class="clsMenu" name="button" onclick="clsPop()">+</button>
    <form class="addFiles" action="#" method="post" enctype="multipart/form-data">
        <div class="leftSide">
            <select name="type" required>
                <option value="default">Catégorie</option>
                <option value="files">Documents</option>
                <option value="pictures">Images</option>
            </select> </br>
            <input type="file" name="addNewFile[]" id="addNewFile" value="Ajouter" multiple="">
            <label for="addNewFile">Ajouter le fichier</label>
        </div>
        <div class="rightSide">
            <input type="submit" name="formUploadFiles" value="Upload">
        </div>
    </form>
</div>
