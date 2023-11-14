<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    $tasks = json_decode(file_get_contents('tasks.json'), true);

    if (isset($tasks[$index])) {
        unset($tasks[$index]); // Remove the task at the specified index
        file_put_contents('tasks.json', json_encode(array_values($tasks))); // Reindex the array and save it
    }
}

header('Location: index.php'); // Redirect back to the main page
exit;
?>