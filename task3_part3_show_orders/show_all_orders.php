<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="task3_style.css">
    <title>show order</title>
</head>

<body>
    <?php
    require "show_all_orders_MySQL.php";
    ?>
    <form method="post" , action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class='parent'>
            <div class='child' style="display: block; padding : 0px 30px 0px 30px;">
                <h1>See All Order</h1>
            </div>

            <div class='child' style="margin-top:2px;text-align:left">



                <h5>orders_information</h5>

                <?php
                foreach($all_orders as $order){
                    echo "<pre>";
                        print_r($order);
                        echo "</pre>";
                }
                ?>




            </div>

        </div>
    </form>


</body>

</html>