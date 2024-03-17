<!DOCTYPE html>
<html>
<head>
    <title>Setka game</title>
    <link rel="stylesheet" type="text/css" href="setkaCss.css" >
    <script src="./setkaJs.js"></script>
</head>
<body>
    <div id="topBar">
        <div id="leaderboardDiv" onclick="">
            <p id="leaderboardIcon">🏆</p>
            <p id="leaderboardText">Tabela najlepszych wyników</p>
        </div>
        <h4 id="headerName">💯Setka game</h4>
        <div id="logInDiv">
            <img src="./images/user.png" id="logInIcon"></img>
            <p id="logInButton">Zaloguj się</p>
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
</body>
</html>
<!--


        


        RESPONSYWNOŚĆ BEZ FLOAT:LEFT -ów !!!!!!!!!!!!!!!!!!!!!!!!!!!
        NA FLEXIE

        TODO:
        leaderboard, logowanie, faktyczny restart strony a nie zwykłe przeładowanie
    

        @font-face {font-family: 'nazwa'; src: url(link)}
        root{
            --font-family-nazwa: 'nazwa';
            --font-size-site: 18px;
            --font-size: clamp(1.2rem, 0.4vw, 2.2rem);
            --font-size-h6: clamp(1.21rem, 0.65vw, 1rem);
            --font-size-h5: clamp(1.25rem, 0.95vw, 1.2rem);
            --font-size-h4: clamp(1.3rem, 1.2vw, 1.4rem);
            --font-size-h3: clamp(1.4rem, 3.8vw, 1.8rem);
            --font-size-h2: clamp(1.6rem, 4.2vw, 2.66rem);
            --font-size-h1: clamp(2.1rem, 8.4vw, 7.73rem);
        }
        
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html{
            font-size: var(--font-size-site);
        }
        body{
            font-family: var(--font-family-nazwa);
            font-size: var(--font-size);
            display: flex;
        }
    
    
    
    -->