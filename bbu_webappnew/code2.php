<!DOCTYPE html>
<html>
<head>
    <title>កម្មវិធីគណនា</title>
    <style>
        body { font-family:Khmer os; 
            background:pink drak;
            color: green;
             padding: 30px; }
        .container { background:while;
            padding: 20px; 
            border-radius: 10px;
             max-width: 600px;
              margin: auto; 
             box-shadow: 0 2px 5px #aaa; }
        h2 { color: red; }
        input, select, button { padding: 10px;
             margin: 5px 0; width: 100%; }
        table { width: 100%; 
            margin-top: 20px;
             border-collapse: collapse; }
        th, td { border: 1px solid #ccc; 
            padding: 10px; 
            text-align: center; }
        .section { margin-bottom: 40px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>គណនាប្រមាណវិធីមូលដ្ឋាន</h2>
        <form method="post" class="section">
            <label>ចំនួន 1:</label>
            <input type="number" name="num1" required>
            <label>ចំនួន 2:</label>
            <input type="number" name="num2" required>
            <label>ប្រមាណវិធី:</label>
            <select name="operator">
                <option value="+">បូក</option>
                <option value="-">ដក</option>
                <option value="*">គុណ</option>
                <option value="/">ចែក</option>
            </select>
            <button type="submit" name="basic_calc">គណនា</button>
        </form>

        <form method="post" class="section">
            <h2>គណនាផ្ទៃក្រឡា/បរិមាត្រ</h2>
            <label>ជ្រើសរើសរូបរាង:</label>
            <select name="shape">
                <option value="square_area">ផ្ទៃការ៉េ</option>
                <option value="circle_area">ផ្ទៃរង្វង់</option>
                <option value="triangle_area">ផ្ទៃត្រីកោណ</option>
                <option value="cube_volume">បរិមាត្រការ៉េ</option>
                <option value="sphere_volume">បរិមាត្ររង្វង់</option>
            </select>
            <label>តម្លៃ 1 (ជាដុំ):</label>
            <input type="number" step="any" name="val1" required>
            <label>តម្លៃ 2 (សម្រាប់ត្រីកោណ):</label>
            <input type="number" step="any" name="val2">
            <button type="submit" name="shape_calc">គណនា</button>
        </form>

        <?php
        if (isset($_POST['basic_calc'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $op = $_POST['operator'];

            switch ($op) {
                case '+': $res = $num1 + $num2; break;
                case '-': $res = $num1 - $num2; break;
                case '*': $res = $num1 * $num2; break;
                case '/': $res = $num2 != 0 ? $num1 / $num2 : "មិនអាចចែកដោយសូន្យ"; break;
            }

            echo "<table><tr><th>ប្រមាណវិធី</th><td>$num1 $op $num2</td></tr>";
            echo "<tr><th>លទ្ធផល</th><td>$res</td></tr></table>";
        }

        if (isset($_POST['shape_calc'])) {
            $shape = $_POST['shape'];
            $v1 = $_POST['val1'];
            $v2 = $_POST['val2'];
            $pi = 3.1416;
            $result = "";

            switch ($shape) {
                case "square_area":
                    $result = $v1 * $v1;
                    $label = "ផ្ទៃការ៉េ";
                    break;
                case "circle_area":
                    $result = $pi * $v1 * $v1;
                    $label = "ផ្ទៃរង្វង់";
                    break;
                case "triangle_area":
                    $result = 0.5 * $v1 * $v2;
                    $label = "ផ្ទៃត្រីកោណ";
                    break;
                case "cube_volume":
                    $result = $v1 ** 3;
                    $label = "បរិមាត្រការ៉េ";
                    break;
                case "sphere_volume":
                    $result = (4/3) * $pi * ($v1 ** 3);
                    $label = "បរិមាត្ររង្វង់";
                    break;
                default:
                    $label = "មិនស្គាល់រូបរាង";
            }

            echo "<table>
                    <tr><th>ប្រភេទគណនា</th><td>$label</td></tr>
                    <tr><th>លទ្ធផល</th><td>$result</td></tr>
                  </table>";
        }
        ?>
    </div>
</body>
</html>