<?php
    // must turn on strict types
    declare(strict_types=1);

    $milkProducts = [
        "Fresh Milk (250ml)"      => ["price" => 30, "stock" => 11],
        "Chocolate Milk (250ml)"  => ["price" => 40, "stock" => 15],
        "Strawberry Milk (250ml)" => ["price" => 40, "stock" => 26],

        "Fresh Milk (500ml)"      => ["price" => 55, "stock" => 2],
        "Chocolate Milk (500ml)"  => ["price" => 65, "stock" => 16],
        "Strawberry Milk (500ml)" => ["price" => 65, "stock" => 13],

        "Fresh Milk (1L)"         => ["price" => 90, "stock" => 23],
        "Chocolate Milk (1L)"     => ["price" => 100, "stock" => 28],
        "Strawberry Milk (1L)"    => ["price" => 100, "stock" => 5]
    ];

    // 12% tax rate - global variable
    $taxRate = 12;

    // get_reorder_message function
    // one parameter - stock
    function get_reorder_message(int $stock): string {
        // gotta use another ternary operator here
        return ($stock < 10) ? "Yes" : "No";
    }

    // get_total_value function
    // takes two arguments so two parameters - price (float), quantity (int)
    function get_total_value(float $price, int $quantity): float {
        // calculate total value using price and quantity
        return $price * $quantity; // will return float value
    }

    // get_tax_due function
    // takes three arguments so three parameters - price (float), quantity (int), tax (int) with default value of 0
    // initially set as zero but 12 will be applied when called in HTML
    function get_tax_due(float $price, int $quantity, int $tax = 0): float {
        // compute using given formula
        return ($price * $quantity) * ($tax / 100); // will return float value too
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Store - Stock Control</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- linked a separate header file (required) -->
    <?php include 'milkHeader.php'; ?>
    <div class="main-content">
        <h2>Stock Control</h2>
        <!-- main stock table -->
        <table>
            <tr>
                <th>Product</th>
                <th>Stock</th>
                <th>Re-order?</th>
                <th>Total Value</th>
                <th>Tax Due</th>
            </tr>

            <?php foreach ($milkProducts as $milkProduct => $data): ?>
                <tr>
                    <td><?= $milkProduct ?></td>
                    <td><?= $data['stock'] ?></td>
                    <td><?= get_reorder_message($data['stock']) ?></td>
                    <td>P<?= get_total_value($data['price'], $data['stock']) ?></td>
                    <td>P<?= get_tax_due($data['price'], $data['stock'], $taxRate) ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <!-- linked footer file -->
    <?php include 'milkFooter.php'; ?>
    </body>
</html>
