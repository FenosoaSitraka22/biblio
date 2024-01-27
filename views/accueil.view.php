<?php
    ob_start();
?>
 <!-- <?php //echo "sdfdsf".URL?> -->
<?php
    $content = ob_get_clean();
    $titre = "Bienvenu dans mdtq!";
    require_once "views/template.php";
?>