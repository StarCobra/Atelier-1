<?php

namespace iutnc\mediaphotoapp\control;

use iutnc\mf\router\Router;
use iutnc\mediaphotoapp\model\User;
use iutnc\mf\control\AbstractController;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;



class DeleteAccountController extends AbstractController
{
    public function execute(): void
    {

        $id =  mediaphotoAuthentification::connectedUser();
        $user = User::find($id);
        $galleries = $user->galleries()->get();
        foreach ($galleries as $v) {
            $v->galleryToAccess()->detach();
            $v->galleryTags()->detach();
            $pictures = $v->pictures()->get();
            foreach ($pictures as $v1) {
                $v1->pictureTags()->detach();
            }
            $v->pictures()->delete();
        }
        $user->galleries()->delete();
        $user->galleriesAccess()->detach();
        $user->delete();
        mediaphotoAuthentification::logout();
        Router::executeRoute('list_galeriePub');
    }
}
