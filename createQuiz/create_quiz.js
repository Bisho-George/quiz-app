function questionElement() {
    const questionIndex =
        document.getElementById("questions").childElementCount + 1;

    const div = document.createElement("div");

    const input = document.createElement("input");
    input.name = `questions[${questionIndex}][question]`;

    const answers = document.createElement("div");

    const addAnswerButton = document.createElement("button");
    addAnswerButton.innerHTML = "add answer";
    answers.appendChild(addAnswerButton);

    addAnswerButton.onclick = function (e) {
        e.preventDefault();

        const answerIndex = answers.childElementCount;

        const pair = document.createElement("div");
        const radio = document.createElement("input");
        radio.type = "radio";
        radio.name = `questions[${questionIndex}][correct_answer]`;
        radio.value = answerIndex;
        const answer = document.createElement("input");
        answer.name = `questions[${questionIndex}][answers][${answerIndex}]`;
        pair.appendChild(radio);
        pair.appendChild(answer);
        answers.appendChild(pair);
    };

    const removeButton = document.createElement("button");
    removeButton.innerHTML = "x";
    removeButton.onclick = function (e) {
        e.preventDefault();
        questionsUl.removeChild(div);
    };

    div.appendChild(input);
    div.appendChild(answers);
    div.appendChild(removeButton);

    return div;
}

const questionsUl = document.getElementById("questions");
const addQuestionButton = document.getElementById("addQuestion");

addQuestionButton.addEventListener("click", function (e) {
    e.preventDefault();

    const question = questionElement();

    questionsUl.appendChild(question);
});

// validating inputs in the create quiz form
const form = document.querySelector("#quiz-form");

form.addEventListener("submit", async function (event) {
    // prevent default form submission behavior
    event.preventDefault();
    let quizTitle = document.getElementsByName('title');
    let quizDescription = document.getElementsByName('descr');
    let quizQuestions = document.getElementsByName('questions');
    quizQuestions.forEach(question => {
        if (question.question === "" || question.answers === "" || question.correct_answer === "") {
            let error = document.getElementById("error");
            error.innerHTML = "All fields are required.";
        }
    });
    if (quizTitle === "" || quizDescription === "") {
        let error = document.getElementById("error");
        error.innerHTML = "All fields are required.";
    }
    const formData = new FormData(form);
    try {
        const response = await fetch("/createQuiz/validateInputs.php", {
            method: "POST",
            body: formData,
        });
        if (response.ok) {
            
        } else {
            console.log(response);  
        }
    } catch (error) {
        console.error("Error:", error);
    }
});

// // validating inputs in the create quiz form using ajax
// $(function () {
//     // Handle form submission
//     $("#quiz-form").submit(function (e) {
//         e.preventDefault();
//         let formData = $(this).serialize();
//         $.ajax({
//             url: "process-form.php",
//             method: "POST",
//             data: formData,
//             dataType: "json",
//             success: function (response) {
//                 if (response.success) {
//                     $("#message").text("Form submitted successfully.");
//                 } else {
//                     $("#message").text(response.message);
//                 }
//             },
//             error: function () {
//                 $("#message").text("An error occurred while submitting the form.");
//             },
//         });
//     });
// });
