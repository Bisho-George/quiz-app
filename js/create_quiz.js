function questionElement() {
    const questionIndex = document.getElementById('questions').childElementCount + 1;

    const div = document.createElement('div');

    const input = document.createElement('input');

    const answers = document.createElement('div');

    const addAnswerButton = document.createElement('button');
    addAnswerButton.innerHTML = 'add answer';
    answers.appendChild(addAnswerButton);

    addAnswerButton.onclick = function (e) {
        e.preventDefault();

        const answerIndex = answers.childElementCount;

        const pair = document.createElement('div');
        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.value = answerIndex;
        const answer = document.createElement('input');
        pair.appendChild(radio);
        pair.appendChild(answer);
        answers.appendChild(pair);
    }

    const removeButton = document.createElement('button');
    removeButton.innerHTML = 'x';
    removeButton.onclick = function (e) {
        e.preventDefault();
        questionsUl.removeChild(div);
    }

    div.appendChild(input);
    div.appendChild(answers);
    div.appendChild(removeButton);

    return div;
}

const questionsUl = document.getElementById('questions');
const addQuestionButton = document.getElementById('addQuestion');

addQuestionButton.addEventListener('click', function (e) {
    e.preventDefault();

    const question = questionElement();

    questionsUl.appendChild(question);
});