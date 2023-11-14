
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if (!empty($task)) {
        $tasks = json_decode(file_get_contents('tasks.json'), true);

        $newTask = [
            'task' => $task,
            'date' => $date,
            'time' => $time,
        ];

        $tasks[] = $newTask;

        file_put_contents('tasks.json', json_encode($tasks));
    }
}

header('Location: index.php');
exit;
?>