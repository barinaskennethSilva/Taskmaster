<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bg-dark text-center p-2 text-white" style="height:55px;">
        <a href="#" class="navbar-brand navbar fw-bold text-white">Task Manager</a>
        <button class="btn btn-primary " style="position:relative;left:125px;bottom:42px;" onclick="add_form()">Add Task</button>
    </div>
    <form action="add_task.php" method="post" style="display: none;" id ="f1">
<div class="mb-2 p-2">
       <label for="task">Date:</label>
        <input type="date" id="date" name="date" required class="form-control">
   </div>
      <div class="mb-2 p-2">
       <label for="task">Time:</label>
        <input type="time" id="time" name="time" required class="form-control">
           </div>
          <div class="mb-2 p-2">
         <label for="task">New Task:</label>
        <input type="text" id="task" name="task" required class="form-control">
                   </div>
           <div class="mb-2 p-2 d-flex">
    
        <button class="btn btn-danger w-50" type="submit">Add Task</button>
         <button class=" ms-3 btn btn-primary w-50" type="button"onclick="close_form()">Close</button>        
         </div> 
    </form>
<div id="form">
    <h2>Task List:</h2>
    <table class='mt-3 table table-hover'>
        <thead>
            <tr class='bg-danger text-white'>
                <th scope='col'>Tasks</th>
                <th scope='col'>Date</th>
                <th scope='col'>Time</th>
               <th scope='col'>Action</th>     
            </tr>
        </thead>
        <tbody>
    
 
    <?php
    $tasks = json_decode(file_get_contents('tasks.json'), true);

    if ($tasks) {
        foreach ($tasks as $index => $task) {
            echo "<tr>
                    <td>{$task['task']}</td>
                    <td>{$task['date']}</td>
                    <td>{$task['time']}</td>
                    <td>
                        <form action='delete_task.php' method='post'>
                            <input type='hidden' name='index' value='{$index}'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No tasks yet.</td></tr>";
    }
    ?>
        </tbody>
    </table>
    </div>
    <script>
    function add_form(){
     var f1 = document.getElementById('f1').style.display='block'; 
     var form = document.getElementById('form').style.display='none'; 
     
    }
    function close_form(){
     var f1 = document.getElementById('f1').style.display='none'; 
     var form = document.getElementById('form').style.display='block'; 
    }
    
    </script>
</body>
</html>