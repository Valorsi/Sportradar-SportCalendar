<?php

class Event {

    public $eventId = null;
    public $startDate = null;
    public $endDate = null;
    public $name = null;
    public $description = null;

    public function __construct($eventId, $startDate, $endDate, $name, $description) {
        $this->eventId = $eventId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->name = $name;
        $this->description = $description;
    }

}


class Game {

    public $gameId = null;
    public $gameDate = null;
    public $sport = null;
    public $teams = null;
    public $location = null;
    public $_event = null;

    public function __construct($gameId, $gameDate, $sport, $teams, $location, $_event) {
        $this->gameId = $gameId;
        $this->gameDate = $gameDate;
        $this->sport = $sport;
        $this->teams = $teams;
        $this->location = $location;
        $this->_event = $_event;
    }

}


class DB {

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "sportscalendar";
    private $conn = null;

    public function __construct() {
        $this->doConnect();
    }

    public function doConnect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->dbname);
    }

    public function getAllGames() {

        $sql = "SELECT `date`, `sport`, `teams`, `location`, `name`, `description`, `start_date`, `end_date` 
        FROM `game`
        INNER JOIN `event` ON `_event` = `event_id`
        ORDER BY `date` ASC";
        $query = mysqli_query($this->conn, $sql);
        $gameArray = $query->fetch_all(MYSQLI_ASSOC);

        return $gameArray;
        
        
    }

    public function getAllSports() {

        $sql = "SELECT DISTINCT `sport` FROM `game`";
        $query = mysqli_query($this->conn, $sql);
        $sportArray = $query->fetch_all(MYSQLI_ASSOC);
        return $sportArray;


    }

    public function displayGames($games) {
    
        $displayGames = '';
        
        foreach($games as $g) {
            $displayGames .= '<tr class="sport-calendar-row">
                <td class="sport-calendar-detail">'.str_replace(":00.000000", "", $g['date']).'</td>
                <td class="sport-calendar-detail">'.$g['sport'].'</td>
                <td class="sport-calendar-detail">'.$g['teams'].'</td>
                <td class="sport-calendar-detail">'.$g['name'].'</td>
                <td class="sport-calendar-detail">'.$g['location'].'</td>
                </tr>
            ';
        }

        return $displayGames;
     
    }

    public function displaySports($sports) {

        $sportsHtml = "";

        foreach($sports as $s ) {
            $sportsHtml .= '<option value="'.$s['sport'].'">'.$s['sport'].'</option>';
        }

        return $sportsHtml;

    }

    public function filterSports($sport) {

        $sql = "SELECT `date`, `sport`, `teams`, `location`, `name`, `description`, `start_date`, `end_date` 
        FROM `game`
        INNER JOIN `event` ON `_event` = `event_id`
        WHERE `sport` = '".$sport."'
        ORDER BY `date` ASC";
        
        $query = mysqli_query($this->conn, $sql);
        $gameArray = $query->fetch_all(MYSQLI_ASSOC);

        return $gameArray;

    }

}

?>