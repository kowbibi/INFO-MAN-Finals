<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discriminant of a Quadratic Equation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .normal-weight { font-weight: normal; }
    </style>
</head>
<body>
    <h1>Discriminant of a Quadratic Equation</h1>
    <form method="POST">
        <p>
            A: <input type="text" name="A">
        </p>
        <p>
            B: <input type="text" name="B">
        </p>
        <p>
            C: <input type="text" name="C">
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and convert to float
    $A = floatval($_POST['A'] ?? 0);
    $B = floatval($_POST['B'] ?? 0);
    $C = floatval($_POST['C'] ?? 0);

    // Calculate the discriminant
    $discriminant = $B * $B - 4 * $A * $C;

    // Display the result
    echo "<h2>Discriminant: <span class='normal-weight'>$discriminant</span></h2>";
}
?>
</body>
</html>
