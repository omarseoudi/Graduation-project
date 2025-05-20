<?php
// تأكيد بيانات الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم المضيف (hostname)
$username = "root"; // اسم المستخدم
$password = ""; // كلمة المرور
$dbname = "hiss"; // اسم قاعدة البيانات

// اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// فحص إرسال نموذج التسجيل الجديد
if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $user_name = $_POST['name'];
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];

    // استعلام SQL لإدخال بيانات التسجيل الجديد في جدول user
    $sql = "INSERT INTO users (name, username, password, email, phone) VALUES ('$user_name', '$user_username', '$user_password', '$user_email', '$user_phone')";
    header('location:login.php');
    if ($conn->query($sql) === true) {
        // تم التسجيل الجديد بنجاح
        echo "تم التسجيل الجديد بنجاح!";
    } else {
        // فشل التسجيل الجديد
        echo "فشل التسجيل الجديد. يرجى المحاولة مرة أخرى.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Robotics</title>
</head>
<body>    
    <div>
        
    <link rel="stylesheet" href="htmll2.css">
        <div class="container">
            <form action="login2.php" method="post"> </form>
                <div style="width:290px; height:130px;">
                    <img src="./Htttml2html_files/R2.JPG" style="width:106%; height:106%; object-fit: fill;">
                   
                    
                 </div>
                 
    <h2>Register</h2>
    <form method="POST" action="new_user.php">
            <!-- حقول إدخال لبيانات المستخدم -->
            <label for="name">الاسم:</label>
            <input type="text" name="name" required><br><br>
            <label for="username">اسم المستخدم:</label>
            <input type="text" name="username" required><br><br>
            <label for="password">كلمة المرور:</label>
            <input type="password" name="password" required><br><br>
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;" name="email" required><br><br>
            <label for="phone">رقم الهاتف:</label>
            <input type="text" name="phone" required><br><br>
            <!-- زر لتقديم النموذج -->
            <input type="submit" value="تسجيل دخول جديد">
        </form>
</div>
</body>
</html>
