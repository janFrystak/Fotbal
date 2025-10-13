<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Navbar;
use IonAuth\Libraries\IonAuth;

class ControlTeam extends BaseController
{

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
    }
    public function load(){
        $data = [
            'navbar' => $this->navbar->findAll(),
            'loggedIn' => $this->ionAuth->loggedIn(),
        ];
        return view('Teams', $data);
    }
}
