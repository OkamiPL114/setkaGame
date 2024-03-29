<?php
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content);
    if (!is_array($decoded)) {
        http_response_code(500);
    };
    if($decoded->name !== "") {
        $db = new mysqli('localhost', 'root', '', 'setkaGame');
        if(mysqli_connect_error()) {
            echo "Błąd bazy danych";
        }
        $q = "INSERT INTO `scores` (`playerName`, `gameType`, `gameScore`) VALUES (\"$decoded->name\", $decoded->gameType, $decoded->score);";
        $result = $db->query($q);
        $db -> close();
        http_response_code(200);
    };