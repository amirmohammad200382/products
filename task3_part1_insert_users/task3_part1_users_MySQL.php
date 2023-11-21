<?php
//مقدار اولیه برای فرم ها تا از نمایش ارور در اجرای اول جلوگیری شود
$productNameErr = "";
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //MySQL اطلاعات برای لاگین به دیتابیس
    $servername = "localhost";
    $database_name = "task_3";
    $username = "root";
    $password = "";
    try {

        //ساختن یک آبجکت جدید پی دی او
        $database = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password,);

        $userName = $_REQUEST["user_name"];


        $query = 'INSERT INTO users (user_name)
                                    VALUES(?) ';
        //یک سند برای ارسال به دیتابیس آماده میکند
        $stml = $database->prepare($query);

        //مقادیر سند ایجاد شده را تنظیم کرده و به دیتابیس ارسال میکند
        $stml->execute([$userName]);
        $result ="Your user inserted successfully";
        

        
        
    } catch (PDOException $e) {
        echo $user . "<br>" . $e->getMessage();
    }
}
