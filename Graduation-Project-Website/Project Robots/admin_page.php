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
?>
<style>

    </style>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="style /style_robots.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="margin: 50px;">
<div class="overlay"></div>
<div class="container">

   <div class="content">
      <h3>Admin Page</h3>
         <h1>جدول النتائج</h1>
         <br>
         <table class="table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>user_id</th>
                  <th>question_id</th>
                  <th>answer</th>
               </tr>
            </thead>
            <tbody>
               <?php
 $sql = "SELECT * FROM `answers`";
 $result = $conn->query($sql);

 if(!$result) {
   die("INvalid query:" . $connection->error);
 }

 while($row=$result->fetch_assoc())
 {
   echo "<tr>
      <td>" . $row["Id"]."</td>
      <td>" . $row["UserId"]."</td>
      <td>" . $row["QuestionId"]."</td>
      <td>" . $row["Answer"]."</td>
   </tr>";

}

?>
   </tbody>
   </table>
   <div style="text-align: center;
    margin-top: 50px;">
        <a style="color: white;
        text-decoration: none" href="logout.php">تسجيل الخروج</a>
        </div>
   </div>

</div>

</body>
</html>