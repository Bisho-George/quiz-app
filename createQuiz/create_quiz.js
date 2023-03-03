// // To handle the IDs of the questions and answers
// let questionNumber = 1;
//         const answerNumbers = [];
//         function questionElement(num) {
//             const div = document.createElement('div');
//             const input = document.createElement('input');
//             input.name = `quiz.questions[${num}].name`;
//             const type = document.createElement('select');
//             type.name = `quiz.questions[${num}]`;
//             const mcqOption = document.createElement('option');
//             const tfOption = document.createElement('option');
//             mcqOption.value = 'mcq';
//             mcqOption.text = 'multiple choice';
//             tfOption.value = 'tf';
//             tfOption.text = 'true or false';
//             type.appendChild(mcqOption);
//             type.appendChild(tfOption);
//             type.selectedIndex = 0;

//             const answers = document.createElement('div');

//             type.addEventListener('change', function(e) {
//                 // Remove all child nodes from the div
//                 while (answers.firstChild) answers.removeChild(answers.firstChild);
//                 if (e.target.value === 'tf') {
//                     ['True', 'False'].forEach((ans, i) => {
//                         const pair = document.createElement('div');
//                         const radio = document.createElement('input');
//                         radio.type = 'radio';
//                         radio.name = `quiz.questions[${num}].correct-answer`;
//                         radio.value = `questions[${num}].answer[${i+1}]`;
//                         const answer = document.createElement('input');
//                         answer.name = `quiz.answer[${i+1}]`;
//                         answer.value = ans;
//                         answer.readOnly = true;
//                         pair.appendChild(radio);
//                         pair.appendChild(answer);
//                         answers.appendChild(pair);
//                     });
//                 } else if (e.target.value === 'mcq') {
//                     const addAnswerButton = document.createElement('button');
//                     addAnswerButton.innerHTML = 'add answer';
//                     answers.appendChild(addAnswerButton);

//                     addAnswerButton.onclick = function(e) {
//                         e.preventDefault();
//                         const pair = document.createElement('div');
//                         const radio = document.createElement('input');
//                         radio.type = 'radio';
//                         radio.name = `quiz.questions[${num}].correct-answer`;
//                         radio.value = `question-${num}-answer-${answerNumbers[num-1]}`;
//                         const answer = document.createElement('input');
//                         answer.name = `quiz.questions[${num}].answer[${answerNumbers[num-1]++}]`;
//                         pair.appendChild(radio);
//                         pair.appendChild(answer);
//                         answers.appendChild(pair);
//                     }
//                 }
//             });

//             // To simulate selection of MCQ option so that the answers div is created
//             type.dispatchEvent(new Event('change'));
//             const removeButton = document.createElement('button');
//             removeButton.innerHTML = 'x';
//             removeButton.onclick = function(e) {
//                 e.preventDefault();
//                 questionsUl.removeChild(div);
//             }

//             div.appendChild(input);
//             div.appendChild(type);
//             div.appendChild(answers);
//             div.appendChild(removeButton);

//             return div;
//         }

//         const questionsUl = document.getElementById('questions');
//         const addQuestionButton = document.getElementById('addQuestion');

//         addQuestionButton.addEventListener('click', function(e) {
//             e.preventDefault();

//             const question = questionElement(questionNumber++);

//             questionsUl.appendChild(question);
//             answerNumbers.push(1);
//         });
let questionsArray = [];
let addQuestion = document.querySelector("#add-question");
let questionNumber = 1;

let questions = document.querySelector("#questions");
addQuestion.addEventListener("click", function () {
  let template = `
    <div id="question${questionNumber}">
        <label >Question ${questionNumber}</label>
        <input type="text" name="quiz.questions[${questionNumber}].name" placeholder="Question">
        <label >Type </label>
        <select id="question[${questionNumber}].type">
            <option value="mcq">Multiple Choice</option>
            <option value="tf">True or False</option>
        </select>
        <button id="add-answer${questionNumber}" type="button">Add Answer</button>
        <div class="answers"></div>
    </div>
`;
  let answers = document.querySelector(`#question${questionNumber - 1} .answers`);
  questions.insertAdjacentHTML("beforeend", template);
  questionNumber++;
  let question = document.querySelector(`#question${questionNumber - 1}`);
  let addAnswer = document.querySelector(`select`);
  let modeTemplate = ``;
  let mode = "mcq";
  addAnswer.addEventListener("change", function (e) {
    
    if (e.target.value === "tf") {
      modeTemplate = `
        <div class="answer" id="answer-question${questionNumber}">
            <label >Answer: </label>
            <input type="radio" name="quiz.questions[${questionNumber}].correct-answer" value="question-${questionNumber}-answer-${questionNumber}">
            <label >True</label>
            <input type="radio" name="quiz.questions[${questionNumber}].correct-answer" value="question-${questionNumber}-answer-${questionNumber}">
            <label >False</label>
        </div>
        `;
      answers.insertAdjacentHTML("beforeend", modeTemplate);
      modeTemplate = ``;
      // answers.innerHTML = ``;
    }
    else {
      let answer = document.querySelector(`#answer-question${questionNumber}`).remove();
    }
    mode = e.target.value;
  });

  console.log(questionNumber);
  let addAnswerButton = document.querySelector(
    `#add-answer${questionNumber - 1}`
  );
  addAnswerButton.addEventListener("click", function () {
    if (mode === "mcq") {
      modeTemplate = `
        <div class="answer">
            <label >Answer</label>
            <input type="text" name="quiz.questions[${questionNumber}].answer[${questionNumber}]" placeholder="Answer">
            <label >Correct Answer</label>
            <input type="radio" name="quiz.questions[${questionNumber}].correct-answer" value="question-${questionNumber}-answer-${questionNumber}">
        </div>
        `;
    }
    answers.insertAdjacentHTML("beforeend", modeTemplate);
    modeTemplate = ``;
    // answers.innerHTML = ``;
  });
});
