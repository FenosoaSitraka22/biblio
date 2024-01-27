<?php
ob_start();
?>
<form action="<?= URL ?>livres/sl" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?= !empty($livre) ? $livre->getId() : '' ?>">
    <label for="">Titre</label>
    <input type="text" name="titre" value="<?= !empty($livre) ? $livre->getTitre() : '' ?>"> <br>
    <label for="">Nombre de pages</label>
    <input type="number" name="nbrPages" value="<?= !empty($livre) ? $livre->getNbrPages() : '' ?>"><br>
    <label for="">Image</label>
    <input type="file" name="image" id="image"><br>
    <button type="submit">Save</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Ajout de livre";
require "template.php";
?>