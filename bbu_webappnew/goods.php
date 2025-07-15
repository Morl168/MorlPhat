<?php
// 1. បង្កើតមុខងារបូកបញ្ចូលតម្លៃពីអ្នកប្រើ (ផ្លាស, កង់, ម៉ូតូធំ)
function calculateTotal($plas, $kang, $motor) {
    $plasPrice = 500;
    $kangPrice = 1000;
    $motorPrice = 2000;
    $total = ($plas * $plasPrice) + ($kang * $kangPrice) + ($motor * $motorPrice);
    return $total;
}

// 2. បង្កើត functions ថ្មីៗ:
// បង្ហាញតម្លៃសរុប
function showTotal($total) {
    echo "តម្លៃសរុបគឺ: {$total} រៀល<br>";
}

// គណនាពន្ធបន្ថែមតម្លៃ 10%
function calculateVAT($total) {
    return $total * 0.10;
}

// បង្ហាញតម្លៃបន្ទាប់ពន្ធ
function showTotalWithVAT($total) {
    $vat = calculateVAT($total);
    $totalWithVAT = $total + $vat;
    echo "តម្លៃបន្ទាប់ពន្ធ (VAT 10%) គឺ: {$totalWithVAT} រៀល<br>";
}

// គណនារយៈពេលត្រូវបង់ (គិតជាង 5 ឯកតា)
function estimateTime($plas, $kang, $motor) {
    $totalItems = $plas + $kang + $motor;
    if ($totalItems > 5) {
        echo "ត្រូវការពេលវេលាបន្ថែមសម្រាប់ដឹកជញ្ជូន!<br>";
    } else {
        echo "អាចដឹកជញ្ជូនបានភ្លាមៗ!<br>";
    }
}

// 3. ប្រើ loops ដើម្បីធ្វើការបញ្ចូលទិន្នន័យ (សំរាប់ឧទាហរណ៍)
$items = ["plas" => 2, "kang" => 3, "motor" => 1];
foreach ($items as $item => $qty) {
    echo "ចំនួន {$item}: {$qty}<br>";
}

// 4. ប្រើ conditional statements ដើម្បីបង្ហាញសារផ្សេងៗ
$total = calculateTotal($items["plas"], $items["kang"], $items["motor"]);
showTotal($total);
showTotalWithVAT($total);
estimateTime($items["plas"], $items["kang"], $items["motor"]);
?>