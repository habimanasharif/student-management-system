<?php 
require_once "backend/app.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Stduent Report</title>
</head>
<body>
<?php require_once("./navBar.php") ?>
    <div class="container">
        <h1 class="text-center mt-2"> Student report group by class</h1>

        <?php 
        foreach ($report as $classroom => $students) {
            echo "<h2 class='text-center mt-2'>$classroom</h2>";
            echo "<table class='table'>";
            echo "<tr>
            <th>Reg Number</th>
            <th>Name</th>
            <th>Grade</th>
            </tr>";
            
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>{$student['reg_number']}</td>";
                echo "<td>{$student['st_name']}</td>";
                echo "<td>{$student['st_grade']}</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        }
        ?>    
    </div>
</body>
</html>