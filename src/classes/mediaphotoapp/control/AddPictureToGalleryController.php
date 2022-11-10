<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mediaphotoapp\model\Picture;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\model\GalleryPicture;
use iutnc\mediaphotoapp\view\UpdateGalleryView;
use iutnc\mediaphotoapp\view\AddPictureToGalleryView;




 class AddPictureToGalleryController extends AbstractController  
{
   public function execute(): void
   {
    if ($this->request->method === "GET"){
        // $gallery = Gallery::find($_GET['id']);

        $v = new AddPictureToGalleryView();
        $v->makePage();
    }
        else{
            $gallery = Gallery::find($_GET['id']);
           $galleryId =  $gallery->gallery_id;
            if(isset($_FILES['file'])){
             
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];
            
                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));
            
                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                $maxSize = 25000000;
             
               
                if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
    
                    move_uploaded_file($tmpName, 'upload/'.$name);
            
                    $req = new Picture();        
                    $req->file = $name;
                    $req->type = $extension;
                    $req->gallery_id=$galleryId;
                    $req->save();

                    Router::executeRoute('list_galeriePub');
                }
                else{
                    echo "Une erreur est survenue";
                }
            }

       
      }
   }
}