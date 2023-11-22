<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="task3_style.css">
    <title>Insert your order</title>
</head>

<body>
    <?php
    require "task3_part2_orders_MySQL.php";
    ?>
    <form method="post" , action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class='parent'>
            <div class='child' style="display: block; padding : 0px 30px 0px 30px;">
                <h1>Insert your order</h1>
            </div>


            <div class='child' style="margin-top:2px;">


                <div class='child'>
                    <label for="user_name">User Name : </label>
                    <br />
                    <input type="text" id="user_name" name="user_name" placeholder="User Name" size="35" />
                </div>



                <div class='child'>
                    <label for="product_name">Product Name : </label>
                    <select type= "checkbox" name="productname[]" id ="product_name" size="5" multiple>
                        <option value = "<?php echo $products[0];?>"><?php echo $products[0];?></option>
                        <option value = "<?php echo $products[1];?>"><?php echo $products[1];?></option>
                        <option value = "<?php echo $products[2];?>"><?php echo $products[2];?></option>
                        <option value = "<?php echo $products[3];?>"><?php echo $products[3];?></option>
                        <option value = "<?php echo $products[4];?>"><?php echo $products[4];?></option>
                        <option value = "<?php echo $products[5];?>"><?php echo $products[5];?></option>
                        <option value = "<?php echo $products[6];?>"><?php echo $products[6];?></option>
                        <option value = "<?php echo $products[7];?>"><?php echo $products[7];?></option>
                        
                    </select>
                </div>

                <br />
                <span><?php echo $result; ?></span>


                <input type="submit" style="color:black;margin:20px auto;" />


            </div>



        </div>
    </form>


</body>

</html>