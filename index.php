<!DOCTYPE html>
<html>
<head>
    <title>Setka game</title>
    <link rel="stylesheet" type="text/css" href="setkaCss.css">
    <script src="./setkaJs.js"></script>
</head>
<body>
    <div id="topBar">
        <a id="leaderboardDiv" href="leaderboard.php" rel="noopener norefferer">
            <img src="./images/trophy.png" id="leaderboardIcon" alt="Leadernoard icon"></img>
            <p id="leaderboardText">Wyniki</p>
        </a>
        <h4 id="headerName">💯Setka game</h4>
        <div id="logInDiv" onclick="showAccount()">
            <p id="logInText">Konto</p>
            <img src="./images/user.png" id="logInIcon" alt="Login icon"></img>
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
</body>
</html>