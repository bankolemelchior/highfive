<?php

/**
 * 
 */
class PictureController {
    
    public $picture_name;
    public $picture_tmpname;
    public $picture_size;
    public $picture_error;

    public function __construct($picture_name , $picture_tmpname , $picture_size , $picture_error) {
        $this->picture_name = $picture_name;
        $this->picture_tmpname = $picture_tmpname;
        $this->picture_size = $picture_size;
        $this->picture_error = $picture_error;
    }

    public function insertPicture() {

            $extension = strtolower(pathinfo($this->picture_name, PATHINFO_EXTENSION));
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 3000000;

            if(in_array($extension, $extensions) && $this->picture_size <= $maxSize && $this->picture_error == 0) {

                // uniqid génère un nom unique pour l'image
                $uniqueName = uniqid('pic_', true);
                //On ajoute l'extension au nom généré
                $file = $uniqueName.".".$extension;
                //On envoie le fichier dans un dossier qu'on spécifie
                move_uploaded_file($this->picture_tmpname, '../public/assets/'.$file);
                
                return $file;
                
            }
            else {
                header("Location: /pages/register?msg=erreu dans le téléchargement !");
            }
    }



}