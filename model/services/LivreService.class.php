<?php
require "DbConnection.class.php";
require "model/entities/Livre.class.php";
class LivreService extends DbConnection
{

    private $livres;

    // n'est pas neccessaire si aucun parametre
    // public function __construct(){
    // }

    private function addLivre($livre)
    {
        $this->livres[] = $livre;
    }
    public function saveLivre($titre, $nbrPages, $image)
    {
        $req =  "INSERT INTO livre (titre, nbr_pages, img) VALUES (:titre, :nbrPage, :img)";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbrPage", $nbrPages, PDO::PARAM_INT);
        $stmt->bindValue(":img", $image, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if ($result > 0) {
            $this->addLivre(new Livre($this->getBdd()->lastInsertId(), $titre, $nbrPages, $image));
        }
    }

    public function updateLivre($id, $titre, $nbrPages, $image)
    {
        $req = "UPDATE livre SET id= :id, titre = :titre, nbr_pages= :nbrPages, img = :img WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbrPages", $nbrPages, PDO::PARAM_INT);
        $stmt->bindValue(":img", $image, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->closeCursor();
        if ($result > 0) {
            //method to find in array mila hay
            $livre = $this->getLivreById($id);
            $livre->setTitre($titre);
            $livre->setNbrPages($nbrPages);
            $livre->setImage($image);
            echo "<pre>";
            print_r($livre);
            echo "</pre>";
        }
    }
    public function getLivres()
    {
        return $this->livres;
    }

    public function getLivreById($id)
    {
        foreach ($this->livres as $livre) {
            if ($livre->getId() === $id) {
                return $livre;
            }
        }
    }
    public function loadLivres()
    {
        $req = $this->getBdd()->prepare("SELECT*FROM livre"); // ORDERED BY id DESC");
        $req->execute();
        $listLivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($listLivres as $livre) {
            $l  = new Livre($livre["id"], $livre["titre"], $livre["nbr_pages"], $livre["img"]);
            $this->addLivre($l);
        }
    }

    public function deleteLivreById($id)
    {
        $request = "DELETE FROM livre WHERE id = :id";
        $stmt = $this->getBdd()->prepare($request);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->closeCursor();
        if ($result > 0)
            foreach ($this->livres  as $key => $value) {
                if ($value->getId() === $id) {
                    unset($this->livres[$key]);
                }
            }
        return $this->livres;
    }
}
