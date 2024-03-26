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
    <div id="leaderboard" onclick="showLeaderboard()">
        <?php
            $db = new mysqli('localhost', 'root', '', 'setkaGame');
            if(mysqli_connect_error())
            {
                echo "Błąd bazy danych";
            }

            $q100 = "SELECT playerName, gameScore FROM scores WHERE gameType=100 ORDER BY gameScore";
            $q50 = "SELECT playerName, gameScore FROM scores WHERE gameType=50 ORDER BY gameScore";
            $q25 = "SELECT playerName, gameScore FROM scores WHERE gameType=25 ORDER BY gameScore";
            $q10 = "SELECT playerName, gameScore FROM scores WHERE gameType=10 ORDER BY gameScore";
            $result100 = $db->query($q100);
            $result50 = $db->query($q50);
            $result25 = $db->query($q25);
            $result10 = $db->query($q10);
            $db -> close();

            if(mysqli_num_rows($result100) > 0){
                echo "<table><tr><th colspan=2>Wyniki 1 - 100</th></tr>";
                while($row = $result100->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["playerName"]."</td>";
                    echo "<td>".$row["gameScore"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "<p>Brak wyników dla gry 1 - 100</p>";
            }
            if(mysqli_num_rows($result50) > 0){
                echo "<table><tr><th>Gracz</th><th>Wynik 100</th></tr>";
                while($row = $result50->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["playerName"]."</td>";
                    echo "<td>".$row["gameScore"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "<p>Brak wyników dla gry 1 - 50</p>";
            }
            if(mysqli_num_rows($result25) > 0){
                echo "<table><tr><th>Gracz</th><th>Wynik 100</th></tr>";
                while($row = $result25->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["playerName"]."</td>";
                    echo "<td>".$row["gameScore"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "<p>Brak wyników dla gry 1 - 25</p>";
            }
            if(mysqli_num_rows($result10) > 0){
                echo "<table><tr><th>Gracz</th><th>Wynik 100</th></tr>";
                while($row = $result10->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["playerName"]."</td>";
                    echo "<td>".$row["gameScore"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "<p>Brak wyników dla gry 1 - 10</p>";
            }
        ?>
    </div>
</body>
</html>