<?php
session_start();

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

// فحص إرسال نموذج تسجيل الدخول
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // استعلام SQL للتحقق من صحة بيانات تسجيل الدخول المُدخَلة
    $sql = "SELECT * FROM users WHERE username ='$username' and password ='$password' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // تم تسجيل الدخول بنجاح
        $_SESSION['username'] = $username;
        header("Location:questions.php");
        exit();
    } else {
        // فشل تسجيل الدخول
        $error = "فشل تسجيل الدخول. يرجى التحقق من اسم المستخدم وكلمة المرور.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>تسجيل الدخول</title>
</head>
<body> 
    
    <style>
         a{
    margin-top: 20px;
    padding: 15px 25px;
    background-color: #0000ff61;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    text-decoration: none;
}
a:hover{
    background-color: blue;
}
input[type="submit"]{
    transform: translate(0px, -40px);
    position: relative;
    margin-top: 20px;
        padding: 15px 25px; 
        background-color: #0000ff61; 
        color: white; 
        border: none;
        border-radius: 5px; 
        cursor: pointer; 
        transition: background-color 0.3s, color 0.3s; 
    }
    input[type="submit"]:hover{
        background-color: blue;
        

    }
    </style>   
    <div>
        
    <link rel="stylesheet" href="htmll2.css">
        <div class="container">
            <!-- <form action="login2.php" method="post"> </form> -->
                <div style="width:300px; height:100px;">
                    <img src="./Htttml2html_files/R2.JPG" style="width:100%; height:100%; object-fit: fill;">
                   
                    
                 </div>
                 
    <h2>Login</h2>
    <form method="POST" action="">
            <!-- حقول إدخال لبيانات المستخدم -->
            <label>اسم المستخدم :</label>
            <input type="text" name="username" required><br><br>
             <label> كلمة السر:</label>

            <input type="password" name="password" required><br><br>

            <input type="submit" value="تسجيل الدخول">
            <!-- زر لتقديم النموذج -->
        </form>
        <a style="color: white;
        text-decoration: none" href="admin_page.php">صفحة المشرف</a>
       <a href="new_user.php">تسجيل الدخول الجديد</a>
</div>
</body>
</html>