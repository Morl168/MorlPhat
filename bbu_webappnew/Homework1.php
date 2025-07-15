<!DOCTYPE html>
<html>
<head>
    <title>គ្រប់គ្រងសារពើភណ្ឌទំនិញ</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .low-stock {
            background-color: #f8d7da;
        }
        .in-stock {
            background-color: #d4edda;
        }
    </style>
</head>
<body>
    <h2>ទម្រង់បញ្ចូលព័ត៌មានទំនិញ</h2>
    <form method="post">
        ឈ្មោះទំនិញ: <input type="text" name="name" required>
        តម្លៃ: <input type="number" name="price" required>
        ចំនួនក្នុងស្តុក: <input type="number" name="quantity" required>
        <input type="submit" name="add" value="បន្ថែម">
    </form>

    <?php
    // Array សម្រាប់រក្សាទុកទំនិញ
    session_start();
    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = [];
    }

    // Function បន្ថែមទំនិញ
    function addProduct($name, $price, $quantity) {
        $_SESSION['products'][] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }

    // Function បច្ចុប្បន្នភាពចំនួន
    function updateQuantity($index, $newQty) {
        $_SESSION['products'][$index]['quantity'] = $newQty;
    }

    // Function គណនាតម្លៃសរុប
    function calculateTotalValue() {
        $total = 0;
        foreach ($_SESSION['products'] as $product) {
            $total += $product['price'] * $product['quantity'];
        }
        return $total;
    }

    // Function ពិនិត្យមើលទំនិញជិតអស់
    function lowStockItems() {
        $lowStock = [];
        foreach ($_SESSION['products'] as $product) {
            if ($product['quantity'] < 5) {
                $lowStock[] = $product['name'];
            }
        }
        return $lowStock;
    }

    // ប処បងបន្ថែម
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        addProduct($name, $price, $quantity);
    }

    // បង្ហាញតារាងទំនិញ
    if (!empty($_SESSION['products'])) {
        echo "<h3>បញ្ជីទំនិញក្នុងស្តុក</h3>";
        echo "<table>
                <tr>
                    <th>ល.រ</th>
                    <th>ឈ្មោះ</th>
                    <th>តម្លៃ</th>
                    <th>ចំនួន</th>
                    <th>ស្ថានភាព</th>
                </tr>";

        foreach ($_SESSION['products'] as $index => $product) {
            $class = ($product['quantity'] < 5) ? 'low-stock' : 'in-stock';
            $status = ($product['quantity'] < 5) ? 'ជិតអស់' : 'មានគ្រប់គ្រាន់';

            echo "<tr class='$class'>
                    <td>".($index+1)."</td>
                    <td>{$product['name']}</td>
                    <td>{$product['price']} រៀល</td>
                    <td>{$product['quantity']}</td>
                    <td>{$status}</td>
                </tr>";
        }

        echo "</table>";

        // បង្ហាញតម្លៃសរុប
        echo "<p><strong>តម្លៃសរុបនៃទំនិញទាំងអស់: </strong>" . calculateTotalValue() . " រៀល</p>";

        // បង្ហាញទំនិញជិតអស់
        $lowItems = lowStockItems();
        if (!empty($lowItems)) {
            echo "<p><strong>សម្គាល់:</strong> ទំនិញដែលជិតអស់ស្តុក៖ " . implode(", ", $lowItems) . "</p>";
        }
    }
    ?>
</body>
</html>