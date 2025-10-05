<?php

namespace App\Controllers;
use App\Models\Navbar;
use App\Models\Article;
use App\Controllers\BaseController;
use IonAuth\Libraries\IonAuth;
class ControlArticle extends BaseController
{
    var $ionAuth;
    var $navbar;
    var $article;
    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->navbar = new Navbar();
        $this->ionAuth = new IonAuth();
        $this->article = new Article();
       
    }
    public function load($id){
        $data['article'] = $this->article->find($id);
        return view('Article', $data);
    }
}
