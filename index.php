<?php
//definition de l'url de base pour acceder a toutes les resources de base du site
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/LivreController.php";
$livreController = new LivreController();

try {
    if (empty($_GET['page'])) {
        require "views/accueil.view.php";
    } else {
        // decoupe l'url en plusieurs elements et les met dans un tableau
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                require "views/accueil.view.php";
                break;
            case "livres":
                if (empty($url[1])) {
                    $livreController->showLivres();
                } else if ($url[1] === "l") {
                    $livreController->livreDetails($url[2]);
                } else if ($url[1] === "a") {
                    $livreController->addLivre();
                } else if ($url[1] === "sl") {
                    $livreController->savingLivre();
                } else if ($url[1] === "m") {
                    // $url[2] recuperer l'id du livre
                    $livreController->editLivre($url[2]);
                } else if ($url[1] === "ul") {
                    $livreController->updateLivre();
                } else if ($url[1] === "s") {
                    $livreController->deleteLivre($url[2]);
                } else {
                    throw new Exception("Page introuvable !");
                }
                break;
            default:
                require "views/accueil.view.php";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
