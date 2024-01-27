<?php
class FileService
{

    public function saveImage($file, $dir)
    {
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquez une image");
        // On verifie si le dossier exist
        if (!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        //creation du nouveau nom du fichier
        $target_file = $dir . $random . "_" . $file['name'];

        if (!getimagesize($file["tmp_name"]))
            throw new Exception('le fichier n\'est pas une image');
        if ($extension !== "jpg" && $extension !== "png" && $extension !== "jpeg" && $extension !== "gif") throw new Exception("L'extension n'est pas reconue");

        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        //tester la taille si c'est plus grand
        if ($file['size'] > 500000)
            throw new Exception("Fichier trops volumineux");

        //tester si le fichier est bien deplace à $dir

        if (!move_uploaded_file($file["tmp_name"], $target_file))
            throw new Exception("L'ajout de l'iamge n'a pas fonctionné");
        else return $random . "_" . $file['name'];
    }

    public function replaceFile($newFile, $oldFileName)
    {
        $emplacement = "public/images/" . $oldFileName;
        if (file_exists(($emplacement)))
            unlink($emplacement);
        return $this->saveImage($newFile, "public/images/");
    }

    public function deleteImage($imageName)
    {
        $emplacement = "public/images/" . $imageName;
        if (file_exists($emplacement))
            unlink($emplacement);
    }
}
