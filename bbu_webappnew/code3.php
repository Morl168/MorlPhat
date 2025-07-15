<!DOCTYPE html>
<html>
<head>
    <title>ប្រទេសអាស៊ាន</title>
    <style>
        body { font-family: Arial; background: #fafafa; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    </style>
</head>
<body>
    <h2>ព័ត៌មានប្រទេសអាស៊ាន</h2>
    <table>
        <tr>
            <th>ប្រទេស</th>
            <th>ទីក្រុងរដ្ឋធានី</th>
            <th>ប្រជាជន (លាន)</th>
            <th>ផ្ទៃដី (km²)</th>
        </tr>
        <?php
        $countries = [
            ["name" => "កម្ពុជា", "capital" => "ភ្នំពេញ", "population" => 17, "area" => 181035],
            ["name" => "វៀតណាម", "capital" => "ហាណូយ", "population" => 98, "area" => 331212],
            ["name" => "ថៃ", "capital" => "បាងកក", "population" => 70, "area" => 513120],
            ["name" => "ឡាវ", "capital" => "វៀងចន្ទន៍", "population" => 7, "area" => 236800],
            ["name" => "ម៉ាឡេស៊ី", "capital" => "កូអាឡាឡាំពួរ", "population" => 33, "area" => 330803]
        ];

        $total_pop = 0;
        $total_area = 0;

        foreach ($countries as $country) {
            $color = $country["population"] > 50 ? "style='background:#ffc0cb'" : "";
            echo "<tr $color>";
            echo "<td>{$country['name']}</td>";
            echo "<td>{$country['capital']}</td>";
            echo "<td>{$country['population']}</td>";
            echo "<td>{$country['area']}</td>";
            echo "</tr>";
            $total_pop += $country["population"];
            $total_area += $country["area"];
        }
        ?>
    </table>
    <p><strong>ប្រជាជនសរុប:</strong> <?= $total_pop ?> លាន</p>
    <p><strong>ផ្ទៃដីសរុប:</strong> <?= $total_area ?> km²</p>
</body>
</html>