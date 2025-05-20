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
?>
<html><head>
    <title>Robotics</title>
    <link rel="stylesheet" href="theme.css">
    <a href="login.php"> Login</a>
    
  </head>
  <body>
  <div class="container">
    <span class="text1">مجموعة 19</span>
    <span class="text2">Robotics</span>
    <br>
  <form>  
    </form>
  </div></body></html>