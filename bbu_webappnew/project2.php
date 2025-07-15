<!DOCTYPE html>
<html>
<head>
    <title>គម្រោងទី 2 - គណនាតម្លៃផលិតផល</title>
</head>
<body>
    <h2>បញ្ចូលចំនួនផលិតផល</h2>
    <form method="post">
        ផ្លាស: <input type="number" name="plas" required><br><br>
        កង់: <input type="number" name="kang" required><br><br>
        ម៉ូតូធំ: <input type="number" name="motor" required><br><br>
        <input type="submit" value="គណនា">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $plas = $_POST["plas"];
        $kang = $_POST["kang"];
        $motor = $_POST["motor"];

        // Function គណនាតម្លៃសរុប
        function calculateTotal($plas, $kang, $motor) {
            $plasPrice = 500;
            $kangPrice = 1000;
            $motorPrice = 2000;
            return ($plas * $plasPrice) + ($kang * $kangPrice) + ($motor * $motorPrice);
        }

        // បង្ហាញតម្លៃសរុប
        function showTotal($total) {
            echo "<p>តម្លៃសរុបគឺ: {$total} រៀល</p>";
        }

        // គណនាពន្ធ
        function calculateVAT($total) {
            return $total * 0.10;
        }

        // បង្ហាញតម្លៃជាពន្ធ
        function showTotalWithVAT($total) {
            $vat = calculateVAT($total);
            $totalWithVAT = $total + $vat;
            echo "<p>តម្លៃបន្ទាប់ពន្ធ (VAT 10%) គឺ: {$totalWithVAT} រៀល</p>";
        }

        // បង្ហាញពេលវេលាចាំបាច់
        function estimateTime($plas, $kang, $motor) {
            $totalItems = $plas + $kang + $motor;
            if ($totalItems > 5) {
                echo "<p>ត្រូវការពេលវេលាបន្ថែមសម្រាប់ដឹកជញ្ជូន!</p>";
            } else {
                echo "<p>អាចដឹកជញ្ជូនបានភ្លាមៗ!</p>";
            }
        }

        // Loop បង្ហាញផលិតផល
        $products = ["ផ្លាស" => $plas, "កង់" => $kang, "ម៉ូតូធំ" => $motor];
        echo "<h3>ផលិតផល:</h3>";
        foreach ($products as $product => $qty) {
            echo "<p>{$product}: {$qty} ឯកតា</p>";
        }

        // Display results
        $total = calculateTotal($plas, $kang, $motor);
        showTotal($total);
        showTotalWithVAT($total);
        estimateTime($plas, $kang, $motor);
    }
    ?>
</body>
</html>