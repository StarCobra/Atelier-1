<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\Gallery;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\view\UpdateTagsView;




 class UpdateTagsController extends AbstractController  
{
   public function execute(): void
   {
        $v = new UpdateTagsView();
        $v->makePage();
    
        if(isset($_POST["submit"])){
            $gallery = Gallery::find($_GET['id']);
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['confidentialite'];
        
        
            $gallery->name =$name;
            $gallery->description = $description;
            $gallery->status =$status;
            $gallery->save();
            Router::executeRoute('list_galeriePub');
      }
   }
}
