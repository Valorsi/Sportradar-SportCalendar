<?php

include('utility/DB.class.php');
if ($_POST) {

    if($_POST['sport'] == 'default') {
        $db = new DB;
        $games = $db->getAllGames();
        $displayGames = $db->displayGames($games);
        echo $displayGames;
    } else {
        $db = new DB;
        $filteredArray = $db->filterSports($_POST['sport']);
        $displayArray = $db->displayGames($filteredArray);
        echo $displayArray;
    }

}

?>