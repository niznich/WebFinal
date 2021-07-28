  
<!DOCTYPE html>
<html>
	<head>
		<title>Questions API</title>
		<link rel="stylesheet" href="questions.css">
		<script src="questions.js"></script>
	</head>
	<body>
		<header>
			<h2>Test your knowledge!!!</h2>
		</header>
		<div id="modal"> 
    		<div class="modalcontent">
      			<p> Click start to continue</p>
      			<button id="start">Start Test</button>
			<x-nav-link :href="route('dashboard.quiz')" :active="request()->routeIs('dashboard.quiz')">
                        {{ __('Click here to go back!') }}
            </x-nav-link>
   			</div>
		</div>
		<div id="newGameModal"> 
    		<div class="modalcontent">
      			<p id="scoreResult"></p>
      			<button id="newGameBtn">New Game</button>
			<x-nav-link :href="route('dashboard.quiz')" :active="request()->routeIs('dashboard.quiz')">
                        {{ __('Click here to go back!') }}
            </x-nav-link>
   			</div>
		</div>  
		<section class="questionContent">
			<div class="container">
				<p id="smallQuestionNumber">Question 1 of 10.</p>
				<h3 id="mainQuestion"></h3>
				<form action="">
  					<input type="radio" id="true" name="btn">True<br>
  					<input type="radio" id="false" name="btn">False
				</form>
				<button id="submit">Submit</button>
			</div>
		</section>
	</body>
</html>

<script>
    //GEOGRAPHY
    document.addEventListener("DOMContentLoaded", function() {
	window.onload = function() {
		startBtn.addEventListener("click", function() {
			document.getElementById("modal").style.display = "none";
			startBtn.style.display = "none";
		});
	};
	document.getElementById("newGameModal").style.display = "none";
	var url = "https://opentdb.com/api.php?amount=10&category=17&difficulty=medium&type=multiple";
	var startBtn = document.getElementById("start");
	var question = document.querySelector("#mainQuestion");
	var questionCounter = 0;
	var submitBtn = document.getElementById("submit");
	var trueBtn = document.getElementById("true");
	var falseBtn = document.getElementById("false");
	var score = 0;
	var apiData;
	startBtn.addEventListener("click", function() {
		fetch(url).then(function(res) {
		// parsing info into JSON.
			return res.json();
		})
		.then(function(data) {
			apiData = data.results; // saving api info to update DOM with newQuestion function.
			question.textContent = data.results[questionCounter].question;
			var correctAnswer = data.results[questionCounter].correct_answer;
			var incorrectAnswer = data.results[questionCounter].incorrect_answers[0]; 

			submitBtn.addEventListener("click", function() {
				if(trueBtn.checked && correctAnswer === "True" && smallQuestionNumber !== 10) {
					updateQuestionNumber();
					newQuestion();
				} else if(falseBtn.checked && correctAnswer === "False" && smallQuestionNumber !== 10) {
					updateQuestionNumber();
					newQuestion();
				} else if (trueBtn.checked && correctAnswer === "False" && smallQuestionNumber !== 10) {
					updateQuestionNumber();
					newQuestion();
				} else if(falseBtn.checked && correctAnswer === "True" && smallQuestionNumber !== 10) {
					updateQuestionNumber();
					newQuestion();
				} else if(!falseBtn.checked && !trueBtn.checked) {
					alert("You must make a selection!");
				} else {
					newGame();
				}
			});
		});
	});

	function newGame(data) {
		document.getElementById("newGameModal").style.display = "block";
		document.getElementById("scoreResult").innerHTML = "Your score is " + score + " out of 10!";
		smallQuestionNumber = 0;
		questionCounter = 0;
		score = 0;
		submitBtn.click(); // Loads new question.
		document.getElementById("newGameBtn").addEventListener("click", function() {
			document.getElementById("newGameModal").style.display = "none";
			question.textContent = apiData[questionCounter].question;
		});
	}

	function newQuestion(data) {
		trueBtn.checked = false; // Removes check mark on next question load.
		falseBtn.checked = false;
		questionCounter++;
		score++;
		question.textContent = apiData[questionCounter].question;
	}

});

var smallQuestionNumber = 1;
function updateQuestionNumber() {
	smallQuestionNumber++;
	document.getElementById("smallQuestionNumber").innerHTML = "Question " + smallQuestionNumber + " of 10";
}

</script>

<style>
    body {
	font-family: comic sans ms;
	background-color: #e6e6e6;
}

header {
	text-align: center;
}

.container {
	display: flex;
	flex-direction: column;
	background-color: white;
	height: 250px;
	width: 600px;
	border: 1px solid black;
	border-radius: 10px;
	padding: 20px;
}

@media screen and(max-width: 920px) {
	.container {
		justify-content: center;
		height: 600px;
	}
}

.questionContent {
	display: flex;
	justify-content: center;
}

button {
	border: none;
	border-radius: 5px;
	background-color:#99c2ff;
	cursor: pointer;
	height: 30px;
	width: 100px;
	font-weight: bold;
	outline: none;
}

button:hover {
	background-color: #004de6;
}

#modal {
  position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.95);
    z-index: 99999;
    height: 100%;
    width: 100%;
}

.modalcontent {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #e6e6e6;
    width: 80%;
    padding: 20px;
    border: solid white;
    border-width: 4px;
    border-radius: 10px;
}

#submit {
	margin-top: 10px;
}

#newGameModal {
  position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.95);
    z-index: 99999;
    height: 100%;
    width: 100%;
}
</style>