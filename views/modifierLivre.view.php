<?php
ob_start();
?>
<form action="<?= URL ?>livres/ul" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?= $livre->getId() ?>" name="id">
    <label for="">Titre</label>
    <input type="text" name="titre" value="<?= $livre->getTitre() ?>"> <br>
    <label for="">Nombre de pages</label>
    <input type="number" name="nbrPages" value="<?= $livre->getNbrPages() ?>"><br>
    <label for="">Image</label>
    <input type="file" name="image" id="image"><br>
    <button type="submit">Save</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Modification de livre";
require "template.php";
?>