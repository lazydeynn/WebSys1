<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Study 3</title>
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: 10vh;
        margin-bottom: 10vh;
    }

    table {
        border-collapse: collapse;
        margin-top: 20px;

    }

    th,
    td {
        border: 1px solid black;
        text-align: center;
        padding: 12px 12px;

    }

    th {
        font-style: italic;
        font-weight: 400;
    }

    th {
        background-color: #f2f2f2;
    }

    .odd {
        font-weight: bold;
        background-color: yellow;

    }

    .container,
    form {
        justify-self: center;
    }

    button {
        padding: 8px;
        font-weight: bold;
        background: white;
        border-radius: 6px;
        color: blue;
        border-color: blue;
    }

    input {
        border-radius: 4px;
        padding: 4px;
        margin-bottom: 4px;
    }

    .btn-center {
        justify-self: center;
    }

    button:hover {
        color: white;
        background-color: blue;
    }
</style>

<body>

    <form method="post">
        <label for="row">Enter Row:</label><br>
        <input type="number" name="row">
        <br>
        <label for="col">Enter Column:</label><br>
        <input type="number" name="col">
        <br><br>
        <div class="btn-center">
            <button type="submit">Generate</button>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $row = $_POST['row'] ?? "";
        $col = $_POST['col'] ?? "";

        echo "<div class='container'><table>";
        echo "<tr><th>X</th>";

        for ($i = 1; $i <= $col; $i++) {
            echo "<th>$i</th>";
        }
        echo "</tr>";

        for ($i = 1; $i <= $row; $i++) {
            echo "<tr><th>$i</th>";
            for ($j = 1; $j <= $col; $j++) {
                $res = $j * $i;
                if ($res % 2 == 0) {
                    echo "<td>$res</td>";
                } else {
                    echo "<td class='odd'>$res</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table></div>";
    }
    ?>

</body>

</html>