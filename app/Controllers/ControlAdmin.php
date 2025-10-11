<?php

namespace App\Controllers;
use App\Models\Navbar;
use App\Controllers\BaseController;
use Config\Services;
use IonAuth\Libraries\IonAuth;

class ControlAdmin extends BaseController
{
    var $ionAuth;
    var $navbar;
    var $session;
    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->navbar = new Navbar();
        $this->ionAuth = new IonAuth();
        $this->session = service("session");
       
    }
    public function login()
    {
        $identity = $this->request->getPost('admin');
        $password = $this->request->getPost('password');

       
         if ($this->ionAuth->login($identity, $password)) {
            log_message('debug', 'User logged in: ' . print_r($this->ionAuth->user()->row(), true));
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', $this->ionAuth->errors() ?: 'Invalid login credentials.');
        }

       

    }
    public function logout()
    {
        $this->ionAuth->logout();
        return redirect()->to('/');
    }

    public function register(){
        $identity = $this->request->getPost('identity');
        $password = $this->request->getPost('password1');
        $email = "admin@admin.cz";
        $additional_data = [];
        $group = ['1'];

        $registered = $this->ionAuth->register($identity, $password, $email, $additional_data, $group);

        if ($registered) {
             return redirect()->to('/');
        }

        return redirect()->back()->with('error', $this->ionAuth->errors());
    }
}
