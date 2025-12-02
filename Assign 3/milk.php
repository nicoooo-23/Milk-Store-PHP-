<?php
    // sizes and prices
    $sizes = [
        '250ml' => 30,
        '500ml' => 55,
        '1L' => 90
    ];

    // flavors plus additional cost
    $flavors = [
        'Plain' => 0,
        'Chocolate' => 10,
        'Strawberry' => 10
    ];

    // initialized vars
    $size = '250ml';
    $quantity = 1;
    $addedFlavor = 'Plain';
    $addedFlavorCost = $flavors[$addedFlavor];
    $subtotal = 0;
    $tax = 0;
    $total = 0;

    // submit form
    if (isset($_POST['order'])) {
        $size = $_POST['size'];
        $flavor = $_POST['flavor'];
        $addedFlavor = $flavor;
        $quantity = $_POST['quantity'];

        $cost = $sizes[$size];
        $subtotal = ($cost * $quantity) + ($flavors[$flavor] * $quantity);
        $tax = ($subtotal / 100) * 12;
        $total = $subtotal + $tax;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Milk Store - Order</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- linked a separate header file (required) -->
    <?php include 'milkHeader.php'; ?>
    <div class="main-content">
        <h2>Available Sizes</h2>
        <table>
            <tr>
                <th>Size</th>
                <th>Price</th>
            </tr>
            <!-- foreach to show table -->
            <!-- used this so I don't need to adjust each time I add something new -->
            <?php foreach ($sizes as $s => $price): ?>
                <tr>
                    <td><?= $s ?></td>
                    <td><?= $price ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Place an Order</h2>
        <!-- form handling -->
        <form method="POST">
            <label>Select Size:</label><br>
            <select name="size">
                <!-- php to check selected -->
                <!-- conditional operator - ternary -->
                <!-- supposed to retain user's choice after they submit -->
                <option value="250ml" <?= $size=='250ml'?'selected':'' ?>>250ml</option>
                <option value="500ml" <?= $size=='500ml'?'selected':'' ?>>500ml</option>
                <option value="1L" <?= $size=='1L'?'selected':'' ?>>1 Liter</option>
            </select><br><br>

            <label>Select Flavor:</label><br>
            <select name="flavor">
                <option value="Plain" <?= $addedFlavor=='Plain'?'selected':'' ?>>Plain</option>
                <option value="Chocolate" <?= $addedFlavor=='Chocolate'?'selected':'' ?>>Chocolate (+P10)</option>
                <option value="Strawberry" <?= $addedFlavor=='Strawberry'?'selected':'' ?>>Strawberry (+P10)</option>
            </select><br><br>

            <label>Quantity:</label><br>
            <input type="number" name="quantity" min="1" value="<?= $quantity ?>"><br><br>
            <!-- button to display deets -->
            <button type="submit" name="order">Order Now</button>
        </form>
        <!-- this part is supposed to only show up if order button is clicked -->
        <?php if(isset($_POST['order'])): ?>
            <h2>Order Summary</h2>
            <p>Size: <?= $size ?></p>
            <p>Quantity: <?= $quantity ?></p>
            <p>Subtotal: P<?= $subtotal ?></p>
            <p>Tax: P<?= $tax ?></p>
            <p><b>Total: P<?= $total ?></b></p>
        <?php endif; ?>
        
        <!-- refresh page aka redirect to same page -->
        <button type="button" onclick="window.location.href='milk.php'">Reset</button>
    </div>
    
    <?php include 'milkFooter.php'; ?>
</body>    
</html>