<?php
$name = $_GET['name'] ?? "";
$score = $_GET['score'] ?? "";
$grade = "";
$remarks = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Study 2</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 100px;
            background: #e2e2e26e;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 1px 16px #00000023;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .card p {
            text-align: left;
            margin-left: 30px;
        }

        .card h2 {
            margin-bottom: 35px;
            font-size: 21px;
            color: #1b308dff;
        }

        .result {
            font-size: 17px;
            line-height: 1.6;
            color: black;
        }
    </style>
</head>

<body>

    <?php
    if ($score >= 95 && $score <= 100) {
        $grade = "A";
    } else if ($score >= 90 && $score <= 94) {
        $grade = "B";
    } else if ($score >= 85 && $score <= 89) {
        $grade = "C";
    } else if ($score >= 75 && $score <= 84) {
        $grade = "D";
    } else if ($score <= 74 && $score !== "") {
        $grade = "F";
    } else if ($score === "") {
        $score = "No score entered";
        $grade = "N/A";
        $remarks = "N/A";
    } else {
        $score = "Invalid Score!";
        $grade = "N/A";
        $remarks = "N/A";
    }

    switch ($grade) {
        case "A":
            $remarks = "Outstanding Performance!";
            break;
        case "B":
            $remarks = "Great Job!";
            break;
        case "C":
            $remarks = "Good effort, keep it up!";
            break;
        case "D":
            $remarks = "Work harder next time.";
            break;
        case "F":
            $remarks = "You need to improve.";
            break;
        default:
            $remarks = "N/A";
    }

    echo "
        <div class='card'>
            <h2>Student Grading System</h2>
            <p class='result'>
                <b>Name:</b> $name <br>
                <b>Score:</b> $score <br>
                <b>Grade:</b> $grade <br>
                <b>Remarks:</b> $remarks
            </p>
        </div>";
    ?>
</body>

</html>