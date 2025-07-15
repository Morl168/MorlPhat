<!DOCTYPE html>
<html>
<head>
    <title>ទំព័រ PHP ដំបូងរបស់ខ្ញុំ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            color pcntl_sigprocmask
            margin: 0 auto;
            padding: 20px;
            background-color:rgb(23, 226, 142);
        }
        .container {
            background-color: pcntl_sigprocmask;
            padding: 20px;
            color:yellow;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(211, 13, 13, 0.1);
        }
        h1 {
            color:rgb(175, 23, 235);
        }
        .info-item {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
     
    

        
    </style>
</head>
<body>
    <div class="container">
        <h1>ទំព័រ PHP ដំបូងរបស់ខ្ញុំ</h1>
    
        <?php
            // កំណត់ព័ត៌មានផ្ទាល់ខ្លួន
            $name = "ម៉ោល​​ ផាត់";
            $age = 22;
            $city = "សៀមរាប";
            $hobbies = ["ដើរលេង 1", "ស្រលាញស្រីសក់វែង 2", "សម្បុរស្រអែមហើយស្អាត 3"];
            $isStudent = true;
            
            // បង្ហាញព័ត៌មានផ្ទាល់ខ្លួន
            echo "<div class='info-item'><span class='label'>ឈ្មោះ៖</span> $name</div>";
            echo "<div class='info-item'><span class='label'>អាយុ៖</span> $age ឆ្នាំ</div>";
            echo "<div class='info-item'><span class='label'>ទីក្រុង៖</span> $city</div>";
            
            // បង្ហាញចំណង់ចំណូលចិត្ត
            echo "<div class='info-item'><span class='label'>ចំណង់ចំណូលចិត្ត៖</span> ";
            echo $hobbies[0] . ", " . $hobbies[1] . ", " . $hobbies[2];
            echo "</div>";
            
            // បង្ហាញស្ថានភាពនិស្សិត
            echo "<div class='info-item'><span class='label'>ជានិស្សិត៖</span> ";
            echo $isStudent ? "បាទ" : "ទេ";
            echo "</div>";
            
            // បង្ហាញកាលបរិច្ឆេទ និងពេលវេលាបច្ចុប្បន្ន
            echo "<div class='info-item'><span class='label'>កាលបរិច្ឆេទ៖</span> " . date("Y-m-d") . "</div>";
            echo "<div class='info-item'><span class='label'>ពេលវេលា៖</span> " . date("H:i:s") . "</div>";
            
            // គណនាឆ្នាំកំណើត
            $birthYear = date("Y") - $age;
            echo "<div class='info-item'><span class='label'>ឆ្នាំកំណើតប្រហាក់ប្រហែល៖</span> $birthYear</div>";
        ?>
        
        <h2>ការគណនាងាយៗ</h2>
        <?php
            // ធ្វើការគណនាងាយៗ
            $num1 = 20;
            $num2 = 5;
            
            echo "<div class='info-item'><span class='label'>លេខទី១៖</span> $num1</div>";
            echo "<div class='info-item'><span class='label'>លេខទី២៖</span> $num2</div>";
            echo "<div class='info-item'><span class='label'>ផលបូក៖</span> " . ($num1 + $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលដក៖</span> " . ($num1 - $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលគុណ៖</span> " . ($num1 * $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលចែក៖</span> " . ($num1 / $num2) . "</div>";
        ?>
    </div>
    </div>
</body>
</html>