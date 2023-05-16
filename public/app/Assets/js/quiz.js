// Define an array to hold the quiz questions
let questions = [];

// Initialize variables
let currentQuestionIndex = 0;
let questionElement = document.getElementById("question");
let answersElement = document.getElementById("answers");
let progressBarFull = document.getElementById("progress_bar_full");

// Function to initialize the quiz
function initializeQuiz() {
    // Fetch the quiz data from the server and populate the questions array with the quiz data
    questions = quizData;
}

// Function to display the current question
function displayQuestion(questionIndex) {
    // Display the question
    questionElement.textContent = Object.values(questions[questionIndex]['question']);

    // Clear previous answer options
    answersElement.innerHTML = "";

    // Set the progress bar value
    progressBarFull.style.width = `${(currentQuestionIndex / questions.length) * 100}%`;

    // Iterate over the answer options and create radio buttons
    Object.entries(questions[questionIndex]['answers']).forEach(function (answer) {
        let liElement = document.createElement("li");
        let inputElement = document.createElement("input");
        let labelElement = document.createElement("label");

        inputElement.setAttribute("type", "radio");
        inputElement.setAttribute("name", "answer");
        inputElement.setAttribute("value", answer[0]);
        inputElement.setAttribute("id", "answer" + answer[0]);

        labelElement.setAttribute("for", "answer" + answer[0]);
        labelElement.textContent = answer[1];

        liElement.appendChild(inputElement);
        liElement.appendChild(labelElement);

        answersElement.appendChild(liElement);
    });
}

// Function to handle the submission of an answer
function submitAnswer() {
    let selectedAnswer = document.querySelector("input[name='answer']:checked");
    let question = questions[currentQuestionIndex];
    let answer = selectedAnswer.value;

    // Send the answer to the server using AJAX
    $.ajax({
        type: 'POST',
        url: '/quiz/' + question.quiz_id,
        data: {
            quiz_id: question.quiz_id,
            quiz_question_id: Object.keys(question['question'])[0],
            quiz_answer_id: answer
        },
        success: function() {
            // Move to the next question
            displayNextQuestion();
        },
        error: function(xhr, status, error) {
            // Handle the error if needed
            console.log(error);
        }
    });
}

// Function to display the next question or finish the quiz
function displayNextQuestion() {
    // Logic to determine the next question index
    let nextQuestionIndex = getNextQuestionIndex();

    // If there are more questions, display the next question
    if (nextQuestionIndex < questions.length) {
        displayQuestion(nextQuestionIndex);
    }
    // Otherwise, finish the quiz
    else {
        finishQuiz();
    }
}

// Function to determine the next question index
function getNextQuestionIndex() {
    // Increment a counter variable
    currentQuestionIndex++;
    return currentQuestionIndex;
}

// Function to finish the quiz
function finishQuiz() {
    // Quiz finished, set the progressbar to 100%
    progressBarFull.style.width = `100%`;

    // Get the Result view and display the score
    window.location = '/quiz/' + questions[0].quiz_id + '/results';
}
