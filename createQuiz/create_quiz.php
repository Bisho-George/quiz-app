<?php

require_once "../utilities.php";

if (!is_authenticated()) {
    header('Location: ../index.php');
    exit();
}

?>

<form action="../routes/quizzes/process_quiz.php" method="POST">
    <label for="title">Quiz title:</label>
    <input type="text" id="title" name="quiz[title]" required><br>

    <label for="description">Quiz description:</label>
    <textarea id="description" name="quiz[description]"></textarea><br>

    <div id="questions">
        <h2>Questions:</h2>
        <button type="button" id="add-question">Add question</button>
        <br><br>

        <!-- Template for new question -->
        <template id="question-template">
            <div class="question">
                <h3>Question <span class="question-number"></span>:</h3>
                <label for="question-text">Question text:</label>
                <input type="text" name="quiz[questions][{{index}}][text]" required>
                <br>

                <label for="answer-options">Answer options:</label><br>
                <div id="answer-options">
                    <!-- Template for new answer option -->
                    <template id="answer-template">
                        <label for="answer-{{index}}">Answer {{index}}:</label>
                        <input type="text" name="quiz[questions][{{qIndex}}][answers][]" required>
                        <input type="radio" name="quiz[questions][{{qIndex}}][correctIndex]" value="{{aIndex}}" required>
                        <br>
                    </template>
                </div>
                <button type="button" class="add-answer">Add answer option</button>
                <br><br>
            </div>
        </template>
    </div>

    <button type="submit">Create quiz</button>
</form>

<script src="create_quiz.js"></script>
</body>

</html>