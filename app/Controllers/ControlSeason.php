<?php

namespace App\Controllers;

namespace App\Controllers;
use App\Models\Navbar;
use App\Models\Season;
use App\Models\League;
use App\Models\LeagueSeason;
use App\Controllers\BaseController;
use IonAuth\Libraries\IonAuth;


class ControlSeason extends BaseController
{
    var $navbar;
    var $season;
    var $league;
    var $league_season;
     public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->navbar = new Navbar();
        $this->season = new Season();
        $this->league = new League();
        $this->league_season = new LeagueSeason();
       
    }
    public function loadSeasons()
    {
        $perPage = 25;
        $page = (int) ($this->request->getVar('page') ?? 1);
        $rows= $this
        ->season
        ->select('season.*, league.name AS league_name, league.level AS league_level')
        ->join('league_season', 'league_season.id_season = season.id')
        ->join('league', 'league.id = league_season.id_league')
        ->orderBy('season.start','DESC')
        ->findAll();

        $seasons = [];
        foreach($rows as $row){
            $sid = $row['id'];

            if (!isset($seasons[$sid])) {
                $seasons[$sid] = [
                    'id'=> $sid,
                    'start'=> $row['start'],
                    'end'=> $row['finish'],
                    'leagues'=> [],
                ];
            }
            $seasons[$sid]['leagues'][] = [
                'id'=> $row['league_id'],
                'name' => $row['name'],
                'logo'=> $row['logo'],
                'level'=> $row['level'],
            ];
        }
        $seasons = array_values($seasons);

        $total = count($seasons);
        $start = ($page - 1) * $perPage;
        $pagedSeasons = array_slice($seasons, $start, $perPage);
        $data = [
            'seasons'=> $pagedSeasons,
            'currentPage'=> $page,
            'totalPages'=> ceil($total/ $perPage)
        ];
        
        return view("Seasons", $data);
    }
}
