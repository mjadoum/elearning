<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Quiz Page</title>
        {{-- Bootstrap 5 links --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/db676e76a0.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;1,6..12,200;1,6..12,300;1,6..12,400&family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
          
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

    <style>

    </style>
    </head>
    <body >
        <x-app-layout>
         
        <div class="container">


            <div class="row mt-4">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

            </div>


            <div class="row mx-0">
            
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box">
                    <h2 class="text-center font-semibold">Not sure where to begin? </h2>
                    <p class="text-md text-center my-2">Find out which languages, and courses suit your personal interests and strengths best</p>
                </div>
            </div>

            <div class="row mx-0">
               
                <div id="quiz-container">
                    <div id="question-container"></div>
                    <div id="button-container">
                        <button id="prev-btn" onclick="prevQuestion()">Previous</button>
                        <button id="next-btn" onclick="nextQuestion()">Next </button>
                    </div>
                    
                </div>
                <div id="result-container"></div>

                <a class="text-center my-4" href="javascript:history.go(-1);" style="color:#FF6347;"> <span class="fa fa-fw fa-home " ></span> Return back</a>

            </div>





        </div>       


 <script>

// Quiz Page Setup

const questions = [
    {
        question: "What type of applications are you interested in developing?",
        answers: [
            { text: "Web applications", score: { 'JavaScript': 5, 'Python': 3, 'PHP': 2, 'Ruby': 2 } },
            { text: "Mobile applications", score: { 'JavaScript': 3, 'Swift': 5, 'Java': 4, 'Kotlin': 4 } },
            { text: "Desktop applications", score: { 'C#': 5, 'Java': 4, 'Python': 3, 'C++': 3 } }
        ]
    },
    {
        question: "Which area of development appeals to you the most?",
        answers: [
            { text: "Frontend/UI development", score: { 'JavaScript': 5, 'HTML/CSS': 4, 'TypeScript': 3, 'React': 4 } },
            { text: "Backend/server-side development", score: { 'JavaScript': 4, 'Python': 4, 'Java': 5, 'Node.js': 5 } },
            { text: "System software development", score: { 'C++': 5, 'C#': 4, 'Java': 4, 'Python': 3 } }
        ]
    },
    {
        question: "What complexity of projects do you foresee working on?",
        answers: [
            { text: "Simple to moderate", score: { 'Python': 4, 'JavaScript': 3, 'HTML/CSS': 2, 'Ruby': 2 } },
            { text: "Moderate to complex", score: { 'Java': 4, 'C#': 4, 'C++': 4, 'TypeScript': 3 } },
            { text: "Highly complex and demanding", score: { 'C++': 5, 'Java': 5, 'C#': 5, 'Rust': 4 } }
        ]
    },
    {
        question: "Which industry or field do you aim to work in?",
        answers: [
            { text: "Web development", score: { 'JavaScript': 5, 'HTML/CSS': 4, 'Python': 3, 'Ruby': 2 } },
            { text: "Data science/machine learning", score: { 'Python': 5, 'R': 4, 'Julia': 3, 'JavaScript': 2 } },
            { text: "Game development", score: { 'C#': 5, 'C++': 4, 'Java': 3, 'JavaScript': 2 } }
        ]
    },
    {
        question: "What is your preferred learning style?",
        answers: [
            { text: "Visual tutorials", score: { 'JavaScript': 4, 'Python': 3, 'Java': 2, 'HTML/CSS': 2 } },
            { text: "Interactive coding challenges", score: { 'JavaScript': 4, 'Python': 3, 'Java': 3, 'C++': 2 } },
            { text: "Reading documentation", score: { 'Python': 4, 'Java': 3, 'C#': 2, 'Ruby': 2 } }
        ]
    },
    {
        question: "Are you more inclined towards open-source or proprietary technologies?",
        answers: [
            { text: "Open-source", score: { 'Python': 4, 'JavaScript': 4, 'Java': 3, 'Ruby': 2 } },
            { text: "Proprietary", score: { 'C#': 4, 'Swift': 4, 'Objective-C': 3, 'C++': 3 } }
        ]
    },
    {
        question: "What kind of project environment do you prefer?",
        answers: [
            { text: "Fast-paced and dynamic", score: { 'JavaScript': 4, 'Python': 3, 'Ruby': 2, 'Java': 2 } },
            { text: "Structured and organized", score: { 'C#': 4, 'Java': 4, 'C++': 3, 'Swift': 2 } }
        ]
    }
];



const languageRecommendations = {
    'JavaScript': "Complete JavaScript Course for Web Development",
    'Python': "Python Programming",
    'C#': "Mastering C# Programming",
    'HTML/CSS': "HTML/CSS Essentials",
    'Ruby': "Ruby on Rails",
    'Swift': "iOS App Development with Swift",
    'Java': "Enterprise Java Development",
    'Kotlin': "Kotlin Programming",
    'C++': "Mastering C++",
    'TypeScript': "TypeScript Fundamentals",
    'R': "Data Analysis with R",
    'Julia': "Introduction to Julia Programming"
};



let currentQuestion = 0;
const totalQuestions = questions.length;

const quizContainer = document.getElementById('quiz-container');
const questionContainer = document.getElementById('question-container');
const resultContainer = document.getElementById('result-container');
const prevButton = document.getElementById('prev-btn');
const nextButton = document.getElementById('next-btn');

function showQuestion() {
    const question = questions[currentQuestion];
    questionContainer.innerHTML = `
         <h3 class="mb-3" style="font-family: 'Montserrat', sans-serif; font-weight: 500 !important;">${currentQuestion + 1}. ${question.question}</h3>
        ${question.answers.map((answer, index) => `
            <label class="quiz-label my-2 px-2 w-100 py-2" style="${index === question.selectedAnswer ? 'border: 1px solid #4285f4; background-color: rgba(66,133,244); color: #fff;' : ''}">
                <input type="radio" style="margin-right: 8px;" name="question" value="${index}" onclick="saveAnswer(${index})" ${index === question.selectedAnswer ? 'checked' : ''}>
                ${answer.text}
            </label>
        `).join('<br>')}
    `;

    // Rest of your code...

    if (currentQuestion === 0) {
        prevButton.disabled = true;
    } else {
        prevButton.disabled = false;
    }
    if (currentQuestion === totalQuestions - 1) {
        nextButton.innerHTML = 'Submit';
    } else {
        nextButton.innerHTML = 'Next';
    }
}

function saveAnswer(answerIndex) {
    questions[currentQuestion].selectedAnswer = answerIndex;
    // Show the "Next" button after an answer is selected for the current question
    const nextButton = document.getElementById('next-btn');
    nextButton.style.display = 'block';
}

function prevQuestion() {
    if (currentQuestion > 0) {
        currentQuestion--;
        showQuestion();
        // Ensure the "Next" button is visible when moving to the previous question
        const nextButton = document.getElementById('next-btn');
        nextButton.style.display = 'block';
    }
}

function nextQuestion() {
    const question = questions[currentQuestion];
    if (question.selectedAnswer !== undefined && question.selectedAnswer !== null) {
        if (currentQuestion < totalQuestions - 1) {
            currentQuestion++;
            showQuestion();
            // Hide the "Next" button again after moving to the next question
            const nextButton = document.getElementById('next-btn');
            nextButton.style.display = 'none';
        } else {
            calculateScoreAndShowRecommendation();
        }
    } else {
        // If an answer is not selected, show error message
            const errorAlert = document.createElement('div');
            errorAlert.classList.add('alert', 'alert-danger');
            errorAlert.textContent = 'Please select an answer.';
            
            const row = document.querySelector('.row');
            row.appendChild(errorAlert);
        
        // Hide the error message after 2 seconds
        setTimeout(() => {
            errorAlert.remove();
        }, 2000);
    
    }
}

function calculateScoreAndShowRecommendation() {
    let languageScores = {};

    // Loop through questions and answers to calculate scores
    questions.forEach(question => {
        if (question.selectedAnswer !== undefined && question.selectedAnswer !== null) {
            const selectedAnswer = question.answers[question.selectedAnswer];
            const answerScore = selectedAnswer.score;

            Object.keys(answerScore).forEach(language => {
                if (!languageScores[language]) {
                    languageScores[language] = 0;
                }
                languageScores[language] += answerScore[language];
            });
        }
    });

    console.log("Language Scores:", languageScores); // Log language scores to check calculations

    // Find the language with the highest score
    const recommendedLanguage = Object.keys(languageScores).reduce((a, b) => languageScores[a] > languageScores[b] ? a : b);

    console.log("Recommended Language:", recommendedLanguage); // Log recommended language to check

    // Recommend the course(s) based on the language with the highest score
    const recommendation = languageRecommendations[recommendedLanguage];

    console.log("Recommendation:", recommendation); // Log recommendation to check

    const recommendationText = recommendation ? `<h3 class="text-center" style="font-family: 'Roboto', sans-serif;">Based on your answers, we recommend that you begin:</h3> <h2  style="margin-top:40px; margin-bottom:40px; color: #FF6347 !important; font-weight: 600 !important; font-family: 'Montserrat', sans-serif;">${recommendation} </h2>` : "No recommendation based on given answers.";
    resultContainer.innerHTML = `<p></p>${recommendationText}</p>`;
    
    // Hide next and previous buttons
    prevButton.style.display = 'none';
    nextButton.style.display = 'none';
    quizContainer.style.display = 'none';
    questionContainer.style.display = 'none';

    // Add restart button
    const restartButton = document.createElement('button');
    restartButton.textContent = 'Restart Quiz';

    restartButton.addEventListener('click', () => {
        // Reset the quiz by reloading the page (or perform necessary reset actions)
        location.reload();
    });

    // Create a div to hold the restart button and style it
    const buttonWrapper = document.createElement('div');
    restartButton.classList.add('btn', 'btn-outline-primary', 'mt-1', 'w-100', 'royal-btn-outline-primary', 'w-100');
    buttonWrapper.appendChild(restartButton);

    // Append the button wrapper to the result container
    resultContainer.appendChild(buttonWrapper);
    resultContainer.style.display = 'block';


}

showQuestion();

 </script>








        </x-app-layout>
    </body