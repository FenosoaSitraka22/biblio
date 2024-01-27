<?php
ob_start();
?>
<h1><?= $livre->getTitre() ?></h1>
<img src="<?= URL ?>/public/images/<?= $livre->getImage(); ?>" alt="Livre1"></td>
<?php
$content = ob_get_clean();
$titre = "Details livre";
require_once "template.php";
?>