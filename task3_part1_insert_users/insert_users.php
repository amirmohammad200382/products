<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="task3_style.css">
    <title>Insert your product</title>
</head>

<body>
    <?php
    require "task3_part1_users_MySQL.php";
    ?>
    <form method="post" , action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class='parent'>
            <div class='child' style="display: block; padding : 0px 30px 0px 30px;">
                <h1>Insert your product</h1>
            </div>
            <div class='child' style="margin-top:2px;">

                <label for="user_name">User Name : </label>
                <br />
                <input type="text" id="user_name" name="user_name" placeholder="User Name" size="35" />
                <dive class="error" style="color : red;"><?php echo $productNameErr; ?></dive>
                <br /><br />
                <span><?php echo $result; ?></span>


                <input type="submit" style="color:black;margin:5px 120px 5px 120px;" />


            </div>

        </div>
    </form>


</body>

</html>