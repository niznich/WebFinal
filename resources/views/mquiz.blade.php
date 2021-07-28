<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Maths Quiz</title>
</head>

<body>
    <div class="container">
        <div id="start-game">
            <h1>Welcome to Maths Quiz game.</h1>
            <p>Press the button below to start the game</p>
            <a id="start-btn" onclick="restart()">LET'S PLAY</a>
            <x-nav-link :href="route('dashboard.quiz')" :active="request()->routeIs('dashboard.quiz')">
                        {{ __('Click here to go back!') }}
            </x-nav-link>
        </div>
        <div id="in-game">
            <div class="top-section">
                <h1>Maths Game</h1>
                <div class="game-data">
                    <p>Question :
                        <span id="Qno">0</span>/10
                    </p>
                    <p>Score: <span id="score">0</span></p>
                </div>
                <div id="timer">
                    <div id="progress"></div>
                </div>
            </div>
            <div class="question-card">
                <h1 id="question">This is question</h1>
            </div>
            <h3>Choose correct one: </h3>
            <div class="answer-card">
                <button>Option A</button>
                <button>Option B</button>
                <button>Option C</button>
                <button>Option D</button>
            </div>
        </div>
        <div id="end-game">
            <h1>&#128515</h1>
            <h1>Your total score was : <span id="final-score">0</span> / 1000</h1>
            <p id="message"></p>
            <a id="restart-btn" onclick="restart()">PLAY AGAIN</a>
            <x-nav-link :href="route('dashboard.quiz')" :active="request()->routeIs('dashboard.quiz')">
                        {{ __('Click here to go back!') }}
            </x-nav-link>
        </div>
    </div>
</body>

</html>


<script>
let n1;
let n2;
let opSelector;
let ansOpt;
let answer;
let qNo = document.getElementById("Qno");
let score = document.getElementById("score");
let question = document.getElementById("question");
let buttons = document.getElementsByTagName("button");
let start = document.getElementById("start-btn");
let fScore = document.getElementById("final-score");
let startBox = document.getElementById("start-game");
let gameBox = document.getElementById("in-game");
let endBox = document.getElementById("end-game");
let progress = document.getElementById("progress");
let message = document.getElementById("message");
let operator = ['+', '-', '*', '/'];
let t;

function restart() {
    score.innerHTML = "0";
    qNo.innerHTML = "0";
    nextQuestion();

    gameBox.style.display = "block"
    startBox.style.display = "none";
    endBox.style.display = "none";
    timer.style.display = "block";
}

function whenFinished() {
    console.log("Finished.")
    gameBox.style.display = "none"
    startBox.style.display = "none";
    endBox.style.display = "flex";
    lastmessage();
}

function nextQuestion() {

    progress.style.width = "100%";
    timed();
    // timed();
    fScore.innerHTML = score.innerHTML;
    if (qNo.innerText == "10") {
        whenFinished();
    }
    n1 = Math.floor(Math.random() * 100);
    n2 = Math.floor(Math.random() * 100);
    opSelector = operator[Math.floor(Math.random() * 4)];

    if (opSelector == "/") {
        for (let i = 0; i < 200; i++) {
            if (n1 % n2 == 0 && n1 != 0 && n2 != 0 && n2 != 1 && n1 != n2) {
                break;
            }
            n1 = Math.floor(Math.random() * 100);
            n2 = Math.floor(Math.random() * 100);
        }
    }

    if (opSelector == "*") {
        for (let i = 0; i < 100; i++) {
            if (n1 * n2 <= 1000) {
                break;
            }
            n1 = Math.floor(Math.random() * 50);
            n2 = Math.floor(Math.random() * 50);
        }
    }
    question.innerHTML = n1 + opSelector + n2;
    answer = eval(question.innerHTML);
    question.innerHTML = question.innerHTML + " = ?";

    // console.log("answer: " + answer);
    getOptions();
    getQNo();

}

function getOptions() {

    for (let i = 0; i < 4; i++ && i != ansOpt) {
        if (answer > 100) {
            buttons[i].innerHTML = answer + Math.floor(Math.random() * answer * 0.4);
        } else if (answer > 30 && answer < 100) {
            buttons[i].innerHTML = answer + Math.floor(Math.random() * answer * 0.6);
        } else {
            buttons[i].innerHTML = Math.floor(Math.random() * 100);
        }

        if (answer < 0) {
            buttons[i].innerHTML = "-" + buttons[i].innerHTML;
        }
    }
    ansOpt = Math.floor(Math.random() * 4);
    buttons[ansOpt].innerHTML = answer;
}

function getQNo() {
    qNo.innerHTML = parseInt(qNo.innerHTML) + 1;
    // console.log("Q no: " + qNo.innerHTML);
}

function getScore() {
    score.innerHTML = parseInt(score.innerHTML) + parseInt(progress.style.width);
    // console.log(score.innerHTML);
}

function doWhenCorrect(i) {
    buttons[i].style.color = "#fff";
    buttons[i].style.backgroundColor = "green";
    getScore();
}

function doWhenIncorrect(i) {
    buttons[i].style.color = "#fff";
    buttons[i].style.backgroundColor = "#fb3640";
    // console.log("wrong");
}

function outro(i) {
    setTimeout(() => {
        nextQuestion();
        buttons[i].style.color = "#000";
        buttons[i].style.backgroundColor = "rgba(0, 0, 0, 0.1)";
    }, 500);
}

function lastmessage() {
    clearInterval(t);
    if (fScore.innerText >= 800) {
        let emoji = "&#128525";
        message.innerHTML = "WOW !! UNBELIEVABLE !!" + emoji;
    } else if (fScore.innerText >= 500) {
        let emoji = "&#128531";
        message.innerHTML = "TOO CLOSE !!" + emoji;
    } else if (fScore.innerText >= 100) {
        let emoji = "&#128549";
        message.innerHTML = "Better luck next time " + emoji;
    } else {
        let emoji = "&#128577";
        message.innerHTML = "Bad Luck " + emoji;
    }
}

function timed() {
    t = setInterval(() => {
        progress.style.width = (parseInt(progress.style.width) - 1) + "%";
        console.log("called");
        if (parseInt(progress.style.width) == 0) {
            clearInterval(t);
            nextQuestion();
        }
    }, 100)
}

buttons[0].addEventListener('click', () => {
    if (buttons[0].innerText == answer) {
        doWhenCorrect(0);
    } else {
        doWhenIncorrect(0);
    }
    clearInterval(t);
    outro(0);
});
buttons[1].addEventListener('click', () => {
    if (buttons[1].innerText == answer) {
        doWhenCorrect(1);
    } else {
        doWhenIncorrect(1);
    }
    clearInterval(t);
    outro(1);
});
buttons[2].addEventListener('click', () => {
    if (buttons[2].innerText == answer) {
        doWhenCorrect(2);
    } else {
        doWhenIncorrect(2);;
    }
    clearInterval(t);
    outro(2);
});
buttons[3].addEventListener('click', () => {
    if (buttons[3].innerText == answer) {
        doWhenCorrect(3);
    } else {
        doWhenIncorrect(3);
    }
    clearInterval(t);
    outro(3);
});
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');
* {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    box-sizing: border-box;
    border: none;
    outline: none;
}

body {
    background-color: rgb(73, 230, 236);
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background-color: aliceblue;
    transition: 1s ease;
    width: 80%;
    max-width: 40rem;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 1rem 1rem 10rem 2rem rgb(0 0 0 / 0.25);
    padding: 2.5rem;
}

.question-card {
    background-color: aquamarine;
    border-radius: 1rem;
    margin: 2rem auto;
    padding: 2rem 0;
    text-align: center;
}

.answer-card {
    padding: 2rem 0 0;
    display: flex;
    flex-direction: column;
}

button {
    transition: 0.3s;
    cursor: pointer;
    font-size: 1.5rem;
    border-radius: 1rem;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.1);
    margin: 0.5rem 0;
    padding: 1rem 0;
}

button:hover {
    background-color: rgba(0, 0, 0, 0.25);
}

.game-data {
    margin: 1rem auto;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

#start-game,
#end-game {
    text-align: center;
    display: flex;
    flex-direction: column;
    column-gap: 2rem;
}

#start-btn,
#restart-btn {
    cursor: pointer;
    border-radius: 1rem;
    margin: 2rem auto 1rem;
    padding: 1rem 3rem;
    font-size: 2rem;
    font-weight: 600;
    color: rgb(255, 255, 255);
    background-color: rgb(64, 107, 226);
}

#in-game,
#end-game {
    display: none;
}

#start-game>p {
    margin: 2rem auto;
}

#timer {
    display: none;
    text-align: left;
    height: 0.5rem;
    width: 100%;
    background-color: rgb(250, 250, 250);
    overflow: hidden;
    border-radius: 1rem;
}

#progress {
    transition: ease;
    height: 100%;
    background-color: rgba(255, 0, 0, 0.5);
}

#message {
    font-size: 1.5rem;
}
</style>