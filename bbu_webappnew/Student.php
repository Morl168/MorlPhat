<!DOCTYPE html>
<html>
<head>
    <title>Student Management Program</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: center;
        }
        .A { background-color: #c8e6c9; }
        .B { background-color: #fff9c4; }
        .C { background-color: #ffe0b2; }
        .D, .F { background-color: #ef9a9a; }
    </style>
</head>
<body>

<h2>Student Management System</h2>

<form method="post">
    <h3>Add Student</h3>
    Name: <input type="text" name="name" required><br><br>
    Age: <input type="number" name="age" required><br><br>
    Scores (comma-separated): <input type="text" name="scores" placeholder="e.g. 80,90,70" required><br><br>
    <input type="submit" name="submit" value="Add Student">
</form>

<?php
session_start();

// Initialize or retrieve student list from session
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

// If form submitted, add new student
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $age = intval($_POST['age']);
    $scoreArray = array_map('intval', explode(',', $_POST['scores']));
    $_SESSION['students'][] = ["name" => $name, "age" => $age, "scores" => $scoreArray];
}

$students = $_SESSION['students'];

// Function to calculate average score
function calculateAverage($scores) {
    return array_sum($scores) / count($scores);
}

// Function to determine letter grade
function getLetterGrade($average) {
    if ($average >= 90) return 'A';
    elseif ($average >= 80) return 'B';
    elseif ($average >= 70) return 'C';
    elseif ($average >= 60) return 'D';
    else return 'F';
}

// Display student table if students exist
if (count($students) > 0) {
    // Find top and bottom student
    $highest = $students[0];
    $lowest = $students[0];
    foreach ($students as $student) {
        $avg = calculateAverage($student['scores']);
        if ($avg > calculateAverage($highest['scores'])) $highest = $student;
        if ($avg < calculateAverage($lowest['scores'])) $lowest = $student;
    }

    echo "<h3>Student List</h3>";
    echo "<table>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Scores</th>
        <th>Average</th>
        <th>Grade</th>
    </tr>";

    foreach ($students as $student) {
        $average = calculateAverage($student['scores']);
        $grade = getLetterGrade($average);
        $class = $grade;

        echo "<tr class='$class'>";
        echo "<td>{$student['name']}</td>";
        echo "<td>{$student['age']}</td>";
        echo "<td>" . implode(", ", $student['scores']) . "</td>";
        echo "<td>" . number_format($average, 2) . "</td>";
        echo "<td>$grade</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<h3>Top Student: {$highest['name']} with Average: " . number_format(calculateAverage($highest['scores']), 2) . "</h3>";
    echo "<h3>Lowest Student: {$lowest['name']} with Average: " . number_format(calculateAverage($lowest['scores']), 2) . "</h3>";
} else {
    echo "<p>No students added yet.</p>";
}
?>
</body>
</html>