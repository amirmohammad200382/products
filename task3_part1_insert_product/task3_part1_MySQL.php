<?php
//مقدار اولیه برای فرم ها تا از نمایش ارور در اجرای اول جلوگیری شود
$productNameErr = "";
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //MySQL اطلاعات برای لاگین به دیتابیس
    $servername = "localhost";
    $database_name = "task_products";
    $username = "root";
    $password = "";
    try {
        $database = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password,);

        $query = 'SELECT * FROM products ';
        //یک سند برای ارسال به دیتابیس آماده میکند
        $stml = $database->prepare($query);

        //مقادیر سند ایجاد شده را تنظیم کرده و به دیتابیس ارسال میکند
        $stml->execute();

        foreach ($database->query("SELECT * FROM products ")->fetchAll(PDO::FETCH_OBJ) as $user) {
            $user = (array)$user;
        }
        $database = null;

        //ساختن یک آبجکت جدید پی دی او
        $database = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password,);

        $productName = $_REQUEST["product_name"];
        ////////////////
        $userId = ($user['product_id'] + 1);


        $query = 'INSERT INTO products (user_id , product_name)
                                    VALUES(?,?) ';
        //یک سند برای ارسال به دیتابیس آماده میکند
        $stml = $database->prepare($query);

        //مقادیر سند ایجاد شده را تنظیم کرده و به دیتابیس ارسال میکند
        $stml->execute([$userId, $productName]);
        $result ="Your product inserted successfully";
        

        
        
    } catch (PDOException $e) {
        echo $user . "<br>" . $e->getMessage();
    }
}
