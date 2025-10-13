<?php

namespace App\Controllers;
use App\Models\Navbar;
use App\Models\Article;
use IonAuth\Libraries\IonAuth;
use App\Controllers\BaseController;


class ControlHome extends BaseController
{
    var $article;
    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->article = new Article();
    }
    
    public function loadHomepage()
    {
      
        $data = [
            'loggedIn' => $this->ionAuth->loggedIn(),
            'currentUser' => $this->ionAuth->loggedIn() ? $this->ionAuth->user()->row() : null,
            'navbar' => $this->navbar->findAll(),
            'articles' => $this->article->where('published', 1)->orderBy('date', 'desc')->findAll()
        ];
        return view('Homepage.php', $data);
    }
}
