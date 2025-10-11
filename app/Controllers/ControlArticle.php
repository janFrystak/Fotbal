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

    public function edit($id){
        $data['article'] = $this->article->find($id);
        return view('EditArticle', $data);
    }

    public function update($id){
        $postData = $this->request->getPost();
        $this->article->update($id, [
            'title'=> $postData['title'],
            'text'=> $postData['text'],
            'top'=> $postData['top'],
            'published'=> $postData['published'],
            'photo'=> $postData['photo'],
        ]);
        return redirect()->to('article/. $id');
    }

    public function delete($id){
        $this->article->where('id', $id)->delete();
        return redirect()->to('/');
    }
    public function createArticle(){
        $postData = $this->request->getPost();
        $this->article->insert([
            'title'=> $postData['title'],
            'text'=> $postData['text'],
            'top'=> $postData['top'],
            'published'=> $postData['published'],
            'photo'=> $postData['photo'],
            'link'=> "article/".$postData['photo'],
            'date'=> $postData['date'],
        ], true);
        return redirect()->to('/');
    }
}
