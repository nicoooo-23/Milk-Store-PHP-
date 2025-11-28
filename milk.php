<?php
    // sizes and prices
    $sizes = [
        '250ml' => 30,
        '500ml' => 55,
        '1L' => 90
    ];

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
    <title>The Milk Store</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

        body {
            font-family: Rubik, sans-serif;
            background: #f8f9fa;
            margin: 20px;
        }

        h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 32px;
            color: #4a6fa5;
        }

        h1 img {
            height: 50px;
        }

        h2 {
            margin-top: 30px;
            color: #4a6fa5;
        }

        table {
            width: 300px;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th {
            background: #4a6fa5;
            color: white;
            padding: 8px;
        }

        td {
            padding: 8px;
            background: white;
        }

        p {
            font-size: 18px;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #4a6fa5;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3b5d8a;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            font-size: 16px;
            margin-left: 10px;
        }

        select {
            padding: 5px;
            font-size: 16px;
            margin-left: 10px;
        }

    </style>
</head>
<body>

    <h1><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fpng.pngtree.com%2Fpng-clipart%2F20240323%2Foriginal%2Fpngtree-milk-bottle-dairy-product-png-image_14657287.png&f=1&nofb=1&ipt=92039055177c22686a478bfc7edb3e727ead612a8c872fcfc481a7a490ee52cd">The Milk Store</h1>

    <h2>Available Sizes</h2>
    <table>
        <tr>
            <th>Size</th>
            <th>Price</th>
        </tr>
        <tr><td>250ml</td><td><?= $sizes['250ml']?></td></tr>
        <tr><td>500ml</td><td><?= $sizes['500ml']?></td></tr>
        <tr><td>1L</td><td><?= $sizes['1L']?></td></tr>
    </table>

    <h2>Place an Order</h2>
    <form method="POST">
        <label>Select Size:</label><br>
        <select name="size">
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

        <button type="submit" name="order">Order Now</button>
    </form>

    <?php if(isset($_POST['order'])): ?>
        <h2>Order Summary</h2>
        <p>Size: <?= $size ?></p>
        <p>Quantity: <?= $quantity ?></p>
        <p>Subtotal: P<?= $subtotal ?></p>
        <p>Tax: P<?= $tax ?></p>
        <p><b>Total: P<?= $total ?></b></p>
    <?php endif; ?>

    <button type="button" onclick="window.location.href='milk.php'">Reset</button>

</body>
</html>
