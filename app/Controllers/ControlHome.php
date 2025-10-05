<?php

namespace App\Controllers;
use App\Models\Navbar;
use App\Models\Article;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ControlHome extends BaseController
{
    var $navbar;
    var $article;
    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->navbar = new Navbar();
        $this->article = new Article();
       
    }
    
    public function loadHomepage()
    {
        $data['navbar'] = $this->navbar->findAll();
        $data['articles'] = $this->article->where('top', 1)->orderBy('date', 'desc')->findAll();
        return view('Homepage.php', $data);
    }
}
