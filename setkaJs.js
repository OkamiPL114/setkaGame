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
                case 100: liczbyDiv.style.gridTemplateColumns = "repeat(10, 1fr)";;break;
                case 50: liczbyDiv.style.gridTemplateColumns = "repeat(5, 1fr)";;break;
                case 25: liczbyDiv.style.gridTemplateColumns = "repeat(5, 1fr)";;break;
                case 10: liczbyDiv.style.gridTemplateColumns = "repeat(2, 1fr)";;break;
            }
            let czasParagraf = document.getElementById("czas");
            let timerParagraf = document.getElementById("timer");
            timerParagraf.style.display = "block";

            // Wygeneruj przyciski z liczbami od 1 do 100
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
                liczbyDiv.appendChild(button);
            }
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
            timerParagraf.textContent = "Czas: " + czas.toFixed(2) + " sekund";
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
            secondLine.textContent = "Ukończyłeś grę w " + czas.toFixed(2) + " sekund.";
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
            location.reload();
        }