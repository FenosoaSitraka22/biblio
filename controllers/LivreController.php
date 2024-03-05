<?php
require "model/services/LivreService.class.php";
require_once "model/services/FileService.class.php";
class LivreController
{

    private $livreService;
    private $imageService;

    public function __construct()
    {
        $this->livreService = new LivreService;
        $this->imageService = new FileService;
        $this->livreService->loadLivres();
    }

    public function showLivres()
    {
        $livres = $this->livreService->getLivres();
        require "views/livres.view.php";
    }

    public function livreDetails($id)
    {

        $livre = $this->livreService->getLivreById($id);
        // echo $livre;
        require "views/livre.view.php";
    }

    public function addLivre()
    {
        require "views/ajoutLivre.view.php";
    }

    public function editLivre($id)
    {
        $livre = $this->livreService->getLivreById($id);
        require "views/modifierLivre.view.php";
    }
    public function savingLivre()
    {
        $file = $_FILES['image'];
        $fileName = $this->imageService->saveImage($file, "public/images/");
        $this->livreService->saveLivre($_POST['titre'], $_POST['nbrPages'], $fileName);

        $this->showLivres();
    }

    public function updateLivre()
    {
        // recuperation de l'ancien nom de l'image 
        $oldFileName = $this->livreService->getLivreById($_POST['id'])->getImage();
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $oldFileName = $this->imageService->replaceFile($file, $oldFileName);
        }
        $this->livreService->updateLivre($_POST['id'], $_POST['titre'], $_POST['nbrPages'], $oldFileName);
        $this->showLivres();
    }
    public function deleteLivre($id)
    {
        $this->imageService->deleteImage($this->livreService->getLivreById($id)->getImage());
        $livres = $this->livreService->deleteLivreById($id);

        require "views/livres.view.php";
    }

    public function ajout(){

    }
    public function del(){
        
    }
}
