<?php
//مقدار اولیه برای فرم ها تا از نمایش ارور در اجرای اول جلوگیری شود
$productNameErr = "";
$result = "";
$i = 0;

$products = [];
$servername = "localhost";
$database_name = "task_3";
$username = "root";
$password = "";
try {
    //دسترسی به لیست محصولات برای نمایش در بخش سلکت فرم
    $database = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password,);

    foreach ($database->query("SELECT product_name FROM products")->fetchAll(PDO::FETCH_OBJ) as $user) {
        $user = (array)$user;
        array_push($products, $user['product_name']);
    }
} catch (PDOException $e) {
    echo $user . "<br>" . $e->getMessage();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $servername = "localhost";
    $database_name = "task_3";
    $username = "root";
    $password = "";
    try {
        $database = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password,);
        /*
        foreach ($database->query("SELECT * FROM products")->fetchAll(PDO::FETCH_OBJ) as $user) {
        }*/
        //دسترسی به نام کاربر و محصولات انتخاب شده وی برای ثبت در دیتابیس
        $userName = $_REQUEST["user_name"];
        $productName = $_REQUEST["productname"];

        //متغیر خالی برای به دست آوردن آی دی های محصول و کاربر برای ثبت در سیستم
        $userId = "";
        $productId = "";

        //user_name => user_id & product_name => product_id شروع فرایند رسیدن به خواسته ها از طریق داشته ها
        //حلقه اول برای به دست آوردن آی دی هر محصول انتخابی توسط کاربر
        foreach ($productName as $product) {
            $i = 0;
            //user_id , user_name , product_id , product_name حلقه برای دسترسی به موارد 
            foreach ($database->query("SELECT * FROM users INNER JOIN products ON users.user_id = products.user_id")->fetchAll(PDO::FETCH_OBJ) as $user) {
                $user = (array)$user;

                //برای انجام سریع تر عملیات و جلوگیری از اتلاف وقت
                if ($userId == "") {
                    if ($user["user_name"] == $userName) {
                        $userId = $user["user_id"];
                    }
                }
                if ($i == 0) {
                    if ($user["product_name"] == $product) {
                        $i = 1;
                        $productId .= $user["product_id"] . " , ";
                    }
                }
            }
        }
        
        // شروع فرایند ارسال اطلاعات
        $query = 'INSERT INTO orders (user_id, product_id)
                                    VALUES(?,?) ';
        
        $stml = $database->prepare($query);

        
        $stml->execute([(int)$userId, $productId]);
        //اتمام فرایند ارسال اطلاعات
        $result = "Your order inserted successfully";
    } catch (PDOException $e) {
        echo $user . "<br>" . $e->getMessage();
    }
}

