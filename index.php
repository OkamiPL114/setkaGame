<!DOCTYPE html>
<html>
<head>
    <title>Setka game</title>
    <link rel="stylesheet" type="text/css" href="setkaCss.css" >
    <script src="./setkaJs.js"></script>
</head>
<body>
    <div id="topBar">
        <div id="leaderboardDiv" onclick="showLeaderboard()">
            <img src="./images/trophy.png" id="leaderboardIcon"></img>
            <p id="leaderboardText">Wyniki</p>
        </div>
        <h4 id="headerName">💯Setka game</h4>
        <div id="logInDiv" onclick="showAccount()">
            <p id="logInText">Konto</p>
            <img src="./images/user.png" id="logInIcon"></img>
        </div>
    </div>
    <p id="timer">Czas: 0 sekund</p>
    <div id="startButtons">
        <button class="startButton" onclick="rozpocznijGre(100)">Graj 1 - 100</button>
        <button class="startButton" onclick="rozpocznijGre(50)">Graj 1 - 50</button>
        <button class="startButton" onclick="rozpocznijGre(25)">Graj 1 - 25</button>
        <button class="startButton" onclick="rozpocznijGre(10)">Graj 1 - 10</button>
    </div>
    <div id="liczby"></div>
    <div id="wynik"></div>
    <div id="account"></div>
    <div id="leaderboard">
        <?php
            $db = new mysqli('localhost', 'root', '', 'setkaGame');
            if(mysqli_connect_error())
            {
                echo "Błąd bazy danych";
            }

            $q100 = "SELECT * FROM scores WHERE gameType=100 ORDER BY scoreTime";
            $q50 = "SELECT * FROM scores WHERE gameType=50 ORDER BY scoreTime";
            $q25 = "SELECT * FROM scores WHERE gameType=25 ORDER BY scoreTime";
            $q10 = "SELECT * FROM scores WHERE gameType=10 ORDER BY scoreTime";
            $result100 = $db->query($q100);
            $result50 = $db->query($q50);
            $result25 = $db->query($q25);
            $result10 = $db->query($q10);
        ?>
        <table>
            <tr>
                
            </tr>
        </table>
    </div>
</body>
</html>