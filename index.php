<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportradar Calendar</title>
    <link href="style/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<?php include("utility/DB.class.php") ?>

<?php 
    $db = new DB;
    $games = $db->getAllGames();
    $displayGames = $db->displayGames($games);
    $sports = $db->getAllSports();
    $sportList = $db->displaySports($sports);
    
?>

<div class="navbar">
    <a href="#" class="nav-link"><h1 class="logo">Betting101.com</h1></a>
    <a href="#" class="nav-link"><h1>Home</h1></a>
    <a href="#" class="nav-link"><h1>Sports Calendar</h1></a>
    <a href="#" class="nav-link"><h1>Events</h1></a>
</div>

<div class="check"></div>
<div class="content-wrapper">
    <div class="content">
        <div class="content-inner">
            <div class="calendar-header">
                <h2>Sports Calendar</h2>
            </div>
            <div class="filter-wrapper">
                <h3>Filter by Sport:</h3>
                <select name="sport" id="filter">
                    <option value="default">-</option>
                    <?= $sportList ?>
                </select>
                <button onclick="filterSport()">Select</button>
            </div>
        </div>
        <table class="sport-calendar-table">
            <tbody>
            <tr>
                <th class="sport-calendar-header">Date</th>
                <th class="sport-calendar-header">Sport</th>
                <th class="sport-calendar-header">Teams</th>
                <th class="sport-calendar-header">Event</th>
                <th class="sport-calendar-header">Location</th>
            </tr>
            
            <?= $displayGames ?>

            </tbody>
        </table>
    </div>


</div>

<script src="script/script.js"></script>
</body>
</html>