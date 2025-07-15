<!DOCTYPE html>
<html>
<head>
    <title >អំពីខ្ញុំ</title>
    <style>
        body { font-family: Khmer os;
             background:rgb(255, 255, 255);
              padding: 20px; }
        .card { background: pink; 
             padding: 20px;
             border-radius: 8px; 
             box-shadow: 0 2px 5px #aaa; }
        h2 { color: #333; }
        ul { list-style-type: square; }


    
            
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>ព័ត៌មានផ្ទាល់ខ្លួន</h2>
        <?php
        $name = "ម៉ោល​​ ផាត់";
        $age = 22;
        $city = "សៀមរាប";
       
        echo "<p>ឈ្មោះ: $name</p>";
        echo "<p>អាយុ: $age</p>";
        echo "<p>ទីក្រុង: $city</p>";
        ?>

        <h2>ការអប់រំ</h2>
        <?php
        $major = "រចនាប្រព័ន្ធផ្សព្វផ្សាយឌីជីថល";
        $school = "Build Bright University";
        $graduate_year = 2027;
        echo "<p>ឯកទេស: $major</p>";
        echo "<p>សាលា: $school</p>";
        echo "<p>ឆ្នាំបញ្ចប់: $graduate_year</p>";
        ?>

        <h2>ជំនាញ</h2>
        <?php
        $skills = ["PHP", "2D", "Pr", "ID"];
        echo "<ul>";
        foreach ($skills as $skill) {
            echo "<li>$skill</li>";
        }
        echo "</ul>";
        ?>

        <h2>បទពិសោធន៍ការងារ</h2>
        <?php
        $experience = [
            "2024-2025" => "Receptionist",
        ];
        echo "<ul>";
        foreach ($experience as $year => $job) {
            echo "<li>$year: $job</li>";
     }
        echo "</ul>";
        ?>
    </div>
</body>
</html>