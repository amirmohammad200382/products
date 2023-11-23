<?php
//مقدار اولیه برای فرم ها تا از نمایش ارور در اجرای اول جلوگیری شود
$productNameErr = "";
$result = "";


//MySQL اطلاعات برای لاگین به دیتابیس
$servername = "localhost";
$database_name = "task_products";
$username = "root";
$password = "";
try {
    $database = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password,);


    //user_id , user_name , product_id دسترسی به موارد
    foreach ($database->query("SELECT * FROM users RIGHT JOIN orders ON users.user_id = orders.user_id")->fetchAll(PDO::FETCH_OBJ) as $user) {
        $user = (array)$user;
        $productName = "";
        // به یک لیست برای دستیابی به نام محصولات product_id تبدیل استرینگ درون
        $productIds = explode(" , ", $user["product_id"]);
        // product_id یک حلقه پیمایش برای تمام آی دی های محصولات ثبت شده درون 
        foreach ($productIds as $productId) {
            //دسترسی به جدول محصولات برای یافتن نام محصولاتی که آی دی آن ها در جدول سفارشات ثبت شده اند
            foreach ($database->query("SELECT product_id,product_name FROM products ") as $value) {
                $value = (array)$value;

                if ((int)$productId == $value["product_id"]) {
                    $productName .= $value["product_name"] . " , ";
                    break;
                } elseif ((int)$productId == 0) {
                    break;
                }
            }
        }
        
        // order_products ارسال اطلاعات به جدول
        
        $query = 'INSERT INTO order_products (user_id,user_name, product_id, product_name)
    VALUES(?,?,?,?) ';
        //یک سند برای ارسال به دیتابیس آماده میکند
        $stml = $database->prepare($query);

        //مقادیر سند ایجاد شده را تنظیم کرده و به دیتابیس ارسال میکند
        $stml->execute([$user['user_id'], $user['user_name'], $user['product_id'], $productName]);
        //اتمام فرایند ارسال اطلاعات
   
        
       
    }
    //شروع دریافت اطلاعات از جدول برای نمایش به کاربر
    $all_orders = [];
    foreach ($database->query("SELECT * FROM order_products ")->fetchAll(PDO::FETCH_OBJ)  as $orders) {
        $orders = (array)$orders;
        $all_orders[] = $orders;
    }
} catch (PDOException $e) {
    echo $user . "<br>" . $e->getMessage();
}
