// kod od rozgrywki
let liczby = [];
let startCzas; // czas zaczęcia gry
let aktualnaLiczba = 1;
let startInterval; // odliczanie do startu gry
let timerInterval; // licznik czasu
let maximum = 0; // zakres gry od 1 do x

function rozpocznijGre(max) {
    let startButtons = document.getElementById("startButtons");
    startButtons.style.display = "none";
    maximum = max; // pobierz do zmiennej globalnej limit gry
    let liczbyDiv = document.getElementById("liczby");

    switch(maximum){ // ustaw ilość kolumn w zależności od limitu gry
        case 100: liczbyDiv.style.gridTemplateColumns = "repeat(10, 1fr)";break;
        case 50: liczbyDiv.style.gridTemplateColumns = "repeat(5, 1fr)";break;
        case 25: liczbyDiv.style.gridTemplateColumns = "repeat(5, 1fr)";break;
        case 10: liczbyDiv.style.gridTemplateColumns = "repeat(2, 1fr)";break;
    }

    let timerParagraf = document.getElementById("timer");
    timerParagraf.style.display = "block";

    // usuń poprzednie liczby
    if(liczby.length > 0){
        for (let i = 1; i <= max; i++) {
            liczby.pop(i);
        }
    }
    
    // Wygeneruj przyciski z liczbami od 1 do 100/50/25/10
    for (let i = 1; i <= max; i++) {
        liczby.push(i);
    }

    // Przetasuj tablicę liczb
    shuffleArray(liczby);

    // Rozpoczęcie odliczania czasu
    startCzas = new Date();
    updateTimer(timerParagraf);


    // dodaj przyciski do obszaru gry
    for (let i = 0; i < liczby.length; i++) {
        const button = document.createElement("button");
        button.textContent = liczby[i];
        button.addEventListener("click", sprawdzLiczbe);
        button.className = "liczba"; // daj każdemu przyciskowi klasę (w razie czego)
        liczbyDiv.appendChild(button);
    }
    liczbyDiv.style.display = "grid";
}

// zabezpieczenie przed ctrl + f oraz f12
window.addEventListener("keydown",function (e) {
    if (e.keyCode === 114 || (e.ctrlKey && e.keyCode === 70)) { 
        e.preventDefault();
    }
})

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

function sprawdzLiczbe(event) {
    const kliknietaLiczba = parseInt(event.target.textContent);
    if (kliknietaLiczba === aktualnaLiczba) {
        event.target.classList.add("klikniety");
        aktualnaLiczba++;
        if (aktualnaLiczba === maximum + 1) {
            clearInterval(timerInterval);
            zakonczGre();
        }
    }
}

function updateTimer(timerParagraf) {
    let czasTeraz = new Date();
    let czas = (czasTeraz - startCzas) / 1000; // Czas w sekundach
    timerParagraf.textContent = "Czas: " + czas.toFixed(2) + " s";
}

timerInterval = setInterval(() => {
    updateTimer(document.getElementById("timer"));
}, 1);

function zakonczGre() {
    const koniecCzas = new Date();
    const ekranWyniku = document.getElementById("wynik");
    const czas = (koniecCzas - startCzas) / 1000; // Czas w sekundach
    
    // zbuduj komunikat zakończenia
    const firstLine = document.createElement("p");
    firstLine.textContent = "Gratulacje!";
    firstLine.style.fontSize = "30px";
    const secondLine = document.createElement("p");
    secondLine.textContent = "Ukończyłeś grę w " + czas.toFixed(2) + " s.";
    secondLine.style.fontSize = "30px";
    const retryButton = document.createElement("button");
    retryButton.textContent = "Zagraj ponownie";
    retryButton.addEventListener("click", zagrajPonownie);
    ekranWyniku.appendChild(firstLine);
    ekranWyniku.appendChild(secondLine);
    ekranWyniku.appendChild(retryButton);
    ekranWyniku.style.display = "block";
}

function zagrajPonownie(){
    // zniknij ekran wyniku i wyczyść go
    const ekranWyniku = document.getElementById("wynik"); 
    ekranWyniku.style.display = "none";
    while(ekranWyniku.firstChild) {
        ekranWyniku.removeChild(ekranWyniku.lastChild);
    }

    //usuń poprzednie przyciski liczb
    let liczbyDiv = document.getElementById("liczby");
    while(liczbyDiv.firstChild) {
        liczbyDiv.removeChild(liczbyDiv.lastChild);
    }

    // zniknij czas
    let timerParagraf = document.getElementById("timer");
    timerParagraf.style.display = "none";

    // pokaż przyciski Graj
    let startButtons = document.getElementById("startButtons");
    startButtons.style.display = "flex";
    
    // rozpocznij na nowo odliczanie
    timerInterval = setInterval(() => {
        updateTimer(document.getElementById("timer"));
    }, 1);

    // zacznij liczyć od nowa
    aktualnaLiczba = 1;
}

// kod od konta i leaderboarda
let playerName = "";

function setPlayerName(){
    // przypisz nowy nick graczowi
    const newName = document.getElementById("newPlayerName");
    playerName = newName.value.trim();
    
    // wyczyść formularz zmiany nicku
    const accountScreen = document.getElementById("account");
    accountScreen.style.display = "none";
    while(accountScreen.firstChild) {
        accountScreen.removeChild(accountScreen.lastChild);
    }
}
function closePlayerProfile(){
    // zniknij ekran profilu
    const accountScreen = document.getElementById("account");
    accountScreen.style.display = "none";
    while(accountScreen.firstChild) {
        accountScreen.removeChild(accountScreen.lastChild);
    }
}
function logOut(){
    // wyloguj i zniknij ekran profilu
    playerName = "";
    closePlayerProfile();
}
function showAccount(){
    if(playerName.length > 0){
        // stwórz stronę profilu
        const firstLine = document.createElement("p");
        firstLine.textContent = "Aktualny gracz: " + playerName;
        firstLine.style.fontSize = "calc(0.5rem + 1 vw)";

        const secondLine = document.createElement("button");
        secondLine.textContent = "Zamknij";
        secondLine.addEventListener("click", closePlayerProfile);

        const thirdLine = document.createElement("button");
        thirdLine.textContent = "Wyloguj";
        thirdLine.addEventListener("click", logOut);

        const accountScreen = document.getElementById("account");
        accountScreen.appendChild(firstLine);
        accountScreen.appendChild(secondLine);
        accountScreen.appendChild(thirdLine);
        accountScreen.style.display = "block";
    }
    else {
        // stwórz formularz do podania nicku
        const firstLine = document.createElement("p");
        firstLine.textContent = "Podaj swój nick:";
        firstLine.style.fontSize = "calc(0.5rem + 1 vw)";
        
        const secondLine = document.createElement("input");
        secondLine.id = "newPlayerName";
        secondLine.type = "text";
        secondLine.style.fontSize = "calc(0.5rem + 1 vw)";

        const thirdLine = document.createElement("button");
        thirdLine.textContent = "Zapisz";
        thirdLine.addEventListener("click", setPlayerName);

        const accountScreen = document.getElementById("account");
        accountScreen.appendChild(firstLine);
        accountScreen.appendChild(secondLine);
        accountScreen.appendChild(thirdLine);
        accountScreen.style.display = "block";
    }
/*
    firstLine.textContent = "Gratulacje!";
    firstLine.style.fontSize = "30px";
    const secondLine = document.createElement("p");
    secondLine.textContent = "Ukończyłeś grę w " + czas.toFixed(2) + " s.";
    secondLine.style.fontSize = "30px";
    const retryButton = document.createElement("button");
    retryButton.textContent = "Zagraj ponownie";
    retryButton.addEventListener("click", zagrajPonownie);
    ekranWyniku.appendChild(firstLine);
    ekranWyniku.appendChild(secondLine);
    ekranWyniku.appendChild(retryButton);
    ekranWyniku.style.display = "block";*/
}