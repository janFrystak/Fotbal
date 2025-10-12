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
        $data = [
            'article' => $this->article->find($id),
            'navbar' => $this->navbar->findAll(),
            'loggedIn' => $this->ionAuth->loggedIn()
        ];

        return view('Article', $data);
    }
    public function loadCreate(){
        $data = [
            'navbar' => $this->navbar->findAll(),
            'loggedIn' => $this->ionAuth->loggedIn(),
        ];
        return view('ArticleCreate', $data);
    }

    public function loadEdit($id){
        $data = [
            'article' => $this->article->find($id),
            'navbar' => $this->navbar->findAll(),
            'loggedIn' => $this->ionAuth->loggedIn(),
        ];
        return view('ArticleEdit', $data);
    }

    public function edit($id){
        $postData = $this->request->getPost();
        $file =$this->request->getFile('photo_file');
        $data = [
            'title'=> $postData['title'],
            'text'=> $postData['text'],
            'top'=> $postData['top'],
            'published'=> $postData['published'],
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $name = $file->getClientName();
            $file->move(FCPATH . 'assets/articles', $name);
            $data['photo'] = $name;
        }

        $this->article->update($id, $data);

        return redirect()->to('article/'. $id);
    }

    public function remove($id){
        $this->article->where('id', $id)->delete();
        return redirect()->to('/');
    }
    public function create() {
    $postData = $this->request->getPost();
    $name = null; // default if no file is uploaded

    if ($file = $this->request->getFile('photo_file')) {
        if ($file->isValid() && !$file->hasMoved()) {
            $name = $file->getClientName(); // or use $file->getRandomName() for uniqueness
            $file->move(FCPATH . 'assets/articles', $name);
        }
    }

    $this->article->insert([
        'title' => $postData['title'],
        'text'=> $postData['text'],
        'top'=> $postData['top'],
        'published' => $postData['published'],
        'photo'=> $name,
        'date'=> $postData['date'],
    ]);

    return redirect()->to('/');
}

    public function loadOverview() {
        $data = [
            'navbar' => $this->navbar->findAll(),
            'loggedIn' => $this->ionAuth->loggedIn(),
            'articles'=> $this->article->findAll(),
        ];
        return view('ArticleOverview', $data);
    }
}
