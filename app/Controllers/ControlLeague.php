<?php

namespace App\Controllers;
use App\Models\Navbar;
use App\Models\LeagueSeason;
use App\Models\Game;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ControlHome extends BaseController
{
    var $navbar;
    var $game;
    var $leagueSeason;
    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->navbar = new Navbar();
        $this->game = new Game();
        $this->leagueSeason = new LeagueSeason();
       
    }
    public function load($id){
        
    }
}
