<?php
session_start();

// تأكيد بيانات الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم المضيف (hostname)
$username = "root"; // اسم المستخدم
$password = ""; // كلمة المرور
$dbname = "hiss"; // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات:: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


$username = $_SESSION['username'];


$question_query = "SELECT * FROM questions";
$question_result = mysqli_query($conn, $question_query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['question_id'] as $question_id) {
        if (isset($_POST['Answer'][$question_id])) {
            $answer_value = $_POST['Answer'][$question_id];
            list($answer, $answer_text) = explode('|', $answer_value);
            $username = $_SESSION['username'];

            $user_query = "SELECT Id FROM users WHERE username = '$username'";
            $user_result = mysqli_query($conn, $user_query);
            $user_row = mysqli_fetch_assoc($user_result);
            $user_id = $user_row['Id'];

            $stmt = $conn->prepare("INSERT INTO `answers`(`UserId`, `QuestionId`, `Answer`) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $user_id, $question_id, $answer_text);

            if ($stmt->execute()) {
                echo "";
            } else {
                echo "";
            }
    
            $stmt->close();
        } else {
            echo "";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>صفحة الاستبيان</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="style /style_robots.css">
</head>
<body>
    <div class="container">
        <!-- عرض اسم المستخدم على الجانب الأيمن من الصفحة -->
        <h2 style="display: flex;
    justify-content: center;" >Welcome   (<?php echo $username; ?>)</h2>

    </div>

    <h1>استبيان حول الروبوتات</h1>

    <form method="POST" action="">
        <table>
            <tr>

                <th>رقم السؤال</th>
                <th>اسم السؤال</th>
                <th>اختيار الإجابة</th>
            </tr>
            <?php
            if (mysqli_num_rows($question_result) > 0) {
                // عرض أسئلة الاستبيان في الجدول
                while ($question_row = mysqli_fetch_assoc($question_result)) {
                    // استخراج بيانات السؤال من النتيجة
                    $question_id = $question_row['Id'];
                    $question_name = $question_row['Question'];
                    $A1 = $question_row['A1'];
                    $A2 = $question_row['A2'];
                    $A3 = $question_row['A3'];
                
                    // عرض صف منفرد في الجدول لكل سؤال
                    echo "<tr>";
                    echo "<td>$question_id</td>"; // عرض رقم السؤال
                    echo "<td>$question_name</td>"; // عرض اسم السؤال
                    echo "<td>";
                    // إنشاء radio buttons للسماح بتحديد الإجابة
                    echo "<input type='hidden' name='question_id[]' value='$question_id'>";
                    echo "<input type='radio' id='Answer_$question_id\_A1' name='Answer[$question_id]' value='A1|$A1' required><label  for='Answer_$question_id\_A1'>$A1</label>";
                    echo "<input type='radio' id='Answer_$question_id\_A2' name='Answer[$question_id]' value='A2|$A2' required><label  for='Answer_$question_id\_A2'>$A2</label>";
                    echo "<input type='radio' id='Answer_$question_id\_A3' name='Answer[$question_id]' value='A3|$A3' required><label  for='Answer_$question_id\_A3'>$A3</label>";
                    echo "</td>";
                    echo "</tr>";
                }
                // إضافة زر لإرسال الإجابة في نهاية الجدول
                echo "<tr>";
                echo "<td colspan='3' style='text-align:center'><button type='submit'>إرسال الإجابة</button></td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='3'>لا توجد أسئلة متاحة.</td></tr>";
            }
            ?>
        </table>
     
        
    </form>
    <div style="text-align: center;
        margin-top: 50px;">
        <a href="logout.php">تسجيل الخروج</a>
        </div>
</body>
</html>
