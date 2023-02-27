<?php
// Start an output buffer
ob_start();

// Your quiz title
$quizTitle = 'Sample Quiz';

// An array of questions and their answers
$questions = [
    'What color is the sky?' => ['A' => 'Blue', 'B' => 'Yellow'],
    'How many legs does a cat have?' => ['A' => 'Four', 'B' => 'Two']
];

// Output the form, questions and answers
echo "<h2>$quizTitle</h2>";
foreach ($questions as $question => $answers) {
    // Begin the form
    echo "<form action='submit.php' method='post'>";
    // Output a question
    echo "<h3>$question</h3>";
    // Output the answers
    foreach ($answers as $key => $val) {
        echo "<input type='radio' name='answer' value='$key'> $val<br>";
    }
    // End the HTML form
    echo "<input type='submit' value='Submit Answer'>";
    echo "</form>";
}
?>
