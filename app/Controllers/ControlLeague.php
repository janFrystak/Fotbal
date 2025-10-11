<?php

namespace App\Controllers;
use App\Models\Navbar;
use App\Models\LeagueSeason;
use App\Models\League;
use App\Models\Game;
use App\Controllers\BaseController;
use IonAuth\Libraries\IonAuth;
use App\Models\Season;

class ControlLeague extends BaseController
{
    var $navbar;
    var $game;
    var $ionAuth;
    var $leagueSeason;
    var $league;
    var $season;
    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->navbar = new Navbar();
        $this->game = new Game();
        $this->ionAuth = new IonAuth();
        $this->leagueSeason = new LeagueSeason();
        $this->league = new League();
        $this->season = new Season();
       
    }
    public function loadGames($seasonId, $leagueId){
        $league_season = $this->leagueSeason
        ->where('id_season', $seasonId)
        ->where('id_league', $leagueId)
        ->first();

        $games = $this->game
        ->select('
            game.id,
            game.goals_home,
            game.goals_away,
            game.date,
            game.stadium,
            game.attendance,
            game.ht_goals_home,
            game.ht_goals_away,
            home.name AS home_name,
            home.logo AS home_logo,
            away.name AS away_name,
            away.logo AS away_logo
            ')
        ->join('team AS home', 'home.id = game.home')
        ->join('team AS away', 'away.id = game.away')
        ->where('id_league_season', $league_season['id'])
        ->findAll();

        $data = [
            'games'=> $games,
            'loggedIn' => $this->ionAuth->loggedIn(),
            'navbar' => $this->navbar->findAll(),
            'league' => $this->league->find($leagueId),
            'season' => $this->season->find($seasonId),
        ];
        return view('Game', $data);
    }
}
