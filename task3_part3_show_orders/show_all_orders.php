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
            


           <!-- <div class='child' style="margin-top:2px;">


            <table>
                    <caption>User_information</caption>
                    <tbody>
                        <tr>
                            <td>ID </td>
                            <td><?php echo $user['id']; ?></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td><?php echo $user['first_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><?php echo $user['last_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td><?php echo $user['phone_number']; ?></td>
                        </tr>
                        <tr>
                            <td>age</td>
                            <td><?php echo $user['age']; ?></td>
                        </tr>
                        <tr>
                            <td>password</td>
                            <td><?php echo $user['pasword']; ?></td>
                        </tr>
                        <tr>
                            <td>gender</td>
                            <td><?php echo $user['gender']; ?></td>
                        </tr>
                        <tr style="height: 30px";>
                            <td>operation : </td>
                            <td>
                                <input type="submit"/>

                            </td>
                        </tr>

                    </tbody>
                </table>



                <div class='child'>
                    <label for="product_name">Product Name : </label>
                    <br />
                    <input type="text" id="product_name" name="product_name" placeholder="Product Name" size="35" />
                </div>

                <br />
                <span><?php echo $result; ?></span>


                <input type="submit" style="color:black;margin:20px auto;" />


            </div>-->


            
        </div>
    </form>


</body>

</html>