<link rel="stylesheet" type="text/css" href="setkaCss.css" >
<div id="topBar">
    <h4 id="headerName">💯Setka game</h4>
</div>
<div id="goBackDiv">
    <button id="backToMain" onclick="goBack()">Wróc do strony głównej</button>
</div>
<script>
    function goBack(){
        window.location.href = "index.php";
    };
</script>
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

    echo "<div id=\"results\">";
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
        echo "<table><tr><th colspan=2>Wyniki 1 - 50</th></tr>";
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
        echo "<table><tr><th colspan=2>Wyniki 1 - 25</th></tr>";
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
        echo "<table><tr><th colspan=2>Wyniki 1 - 10</th></tr>";
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
    echo "</div>";
    ?>