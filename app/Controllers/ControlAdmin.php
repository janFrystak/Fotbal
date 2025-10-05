<?php

namespace App\Controllers;
use App\Models\Navbar;
use App\Controllers\BaseController;
use IonAuth\Libraries\IonAuth;

class ControlAdmin extends BaseController
{
    protected $ionAuth;
    var $navbar;
    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->navbar = new Navbar();
        $this->ionAuth = new IonAuth();
       
    }
    public function login()
    {
        $identity = $this->request->getPost('admin');
        $password = $this->request->getPost('password');

       
        if ($this->ionAuth->login($identity, $password)) {
            if ($this->ionAuth->login($identity, $password)) {
                //$redirectUrl = session()->get('redirect_url') ?? '/'
                $data = "Identity: "+$identity + " password: " + $password;
                return view( 'LogSuc', $data);
            }
        }

        return redirect()->back()->with('error', $this->ionAuth->errors() ?: 'Invalid login credentials.');
       
    }
}
