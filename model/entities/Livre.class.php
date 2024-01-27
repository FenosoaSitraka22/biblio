<?php
class Livre
{
  private $id;
  private $titre;
  private $nbrPages;
  private $image;

  //  public static $livres;
  public function __construct($id, $titre, $nbrPages, $image)
  {
    $this->id = $id;
    $this->titre = $titre;
    $this->nbrPages = $nbrPages;
    $this->image = $image;
    //  self::$livres[]=$this; //mettre l'objet en cours de creation dans la list livre
  }

  public function getId()
  {
    return $this->id;
  }
  public function getTitre()
  {
    return $this->titre;
  }
  public function getNbrPages()
  {
    return $this->nbrPages;
  }
  public function getImage()
  {
    return $this->image;
  }

  public function setId($id)
  {
    $this->id = $id;
  }
  public function setTitre($titre)
  {
    $this->titre = $titre;
  }
  public function setNbrPages($nbrPages)
  {
    $this->nbrPages = $nbrPages;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
}
