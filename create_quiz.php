<?php

require_once "utilities.php";

if (!is_authenticated()) {
    header('Location: index.php');
    exit();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a quiz</title>
</head>

<body>
    <h1>Create a quiz</h1>
    <form action="routes/quizzes/create.php" method="post">
        <input type="text" name="title" placeholder="quiz title">
        <textarea name="descr" cols="30" rows="10" placeholder="quiz description"></textarea>
        <div>
            <ul id="questions"></ul>
            <button id="addQuestion">add question</button>
        </div>
        <button type="submit">create</button>
    </form>
    <script>
        // To handle the IDs of the questions and answers
        let questionNumber = 1;
        const answerNumbers = [];

        function questionElement(num) {
            const div = document.createElement('div');

            const input = document.createElement('input');
            input.name = `question-${num}`;

            const type = document.createElement('select');
            type.name = `question-${num}-type`;
            const mcqOption = document.createElement('option');
            const tfOption = document.createElement('option');
            mcqOption.value = 'mcq';
            mcqOption.text = 'multiple choice';
            tfOption.value = 'tf';
            tfOption.text = 'true or false';
            type.appendChild(mcqOption);
            type.appendChild(tfOption);
            type.selectedIndex = 0;

            const answers = document.createElement('div');

            type.addEventListener('change', function(e) {
                // Remove all child nodes from the div
                while (answers.firstChild) answers.removeChild(answers.firstChild);

                if (e.target.value === 'tf') {
                    ['True', 'False'].forEach((ans, i) => {
                        const pair = document.createElement('div');
                        const radio = document.createElement('input');
                        radio.type = 'radio';
                        radio.name = `question-${num}-correct-answer`;
                        radio.value = `question-${num}-answer-${i+1}`;
                        const answer = document.createElement('input');
                        answer.name = `question-${num}-answer-${i+1}`;
                        answer.value = ans;
                        answer.readOnly = true;
                        pair.appendChild(radio);
                        pair.appendChild(answer);
                        answers.appendChild(pair);
                    });
                } else if (e.target.value === 'mcq') {
                    const addAnswerButton = document.createElement('button');
                    addAnswerButton.innerHTML = 'add answer';
                    answers.appendChild(addAnswerButton);

                    addAnswerButton.onclick = function(e) {
                        e.preventDefault();
                        const pair = document.createElement('div');
                        const radio = document.createElement('input');
                        radio.type = 'radio';
                        radio.name = `question-${num}-correct-answer`;
                        radio.value = `question-${num}-answer-${answerNumbers[num-1]}`;
                        const answer = document.createElement('input');
                        answer.name = `question-${num}-answer-${answerNumbers[num-1]++}`;
                        pair.appendChild(radio);
                        pair.appendChild(answer);
                        answers.appendChild(pair);
                    }
                }
            });

            // To simulate selection of MCQ option so that the answers div is created
            type.dispatchEvent(new Event('change'));

            const removeButton = document.createElement('button');
            removeButton.innerHTML = 'x';
            removeButton.onclick = function(e) {
                e.preventDefault();
                questionsUl.removeChild(div);
            }

            div.appendChild(input);
            div.appendChild(type);
            div.appendChild(answers);
            div.appendChild(removeButton);

            return div;
        }

        const questionsUl = document.getElementById('questions');
        const addQuestionButton = document.getElementById('addQuestion');

        addQuestionButton.addEventListener('click', function(e) {
            e.preventDefault();

            const question = questionElement(questionNumber++);

            questionsUl.appendChild(question);
            answerNumbers.push(1);
        });
    </script>
</body>

</html>