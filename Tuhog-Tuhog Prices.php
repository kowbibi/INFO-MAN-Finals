<?php  
$menu = [
    ['name' => 'FishBall', 'price' => 30, 'quantity' => 10],
    ['name' => 'Kikiam', 'price' => 40, 'quantity' => 10],
    ['name' => 'CornDog', 'price' => 50, 'quantity' => 10],
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Canteen Prices</title>
</head>
<body>
    <h1>Welcome to the canteen! Here are the prices:</h1>
    <ul>
        <?php foreach ($menu as $item) : ?>
            <li><?= htmlspecialchars($item['name']); ?> - <?= htmlspecialchars($item['price']); ?> PHP</li>
        <?php endforeach; ?>
    </ul>
    <form method="POST">
        <p>
            <label for="order">Choose your order: </label>
            <select name="order" id="order">
                <option value="">Select an option</option>
                <?php foreach ($menu as $item) : ?>
                    <option value="<?= htmlspecialchars($item['name']); ?>"><?= htmlspecialchars($item['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            Quantity: <input type="number" name="quantity" min="1">
        </p>
        <p>
            Cash: <input type="number" name="cash" step="0.01" min="0">
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $order = $_POST['order'] ?? null;
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
        $cash = isset($_POST['cash']) ? floatval($_POST['cash']) : 0;

        if (!$order || $quantity <= 0 || $cash <= 0) {
            echo "<p>Please enter valid order details.</p>";
        } else {
            foreach ($menu as $item) {
                if ($item['name'] === $order) {
                    $totalCost = $item['price'] * $quantity;
                    if ($cash < $totalCost) {
                        echo "<p>Insufficient payment. You need <b>" . ($totalCost - $cash) . " PHP</b> more.</p>";
                    } elseif ($cash == $totalCost) {
                        echo "<p>Thank you! Your payment is exact. Enjoy your $order!</p>";
                    } else {
                        echo "<p>Here is your change: <b>" . ($cash - $totalCost) . " PHP</b>. Enjoy your $order!</p>";
                    }
                    break;
                }
            }
        }
    }
    ?>
</body>
</html>
