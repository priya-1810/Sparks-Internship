<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>

    </title>
</head>
<body>
    <div class="wrapper">
    <nav class="navbar">
            <ul>
                <li><a class="active" href="index.html">HOME</a></li>
                <li><a href="customer.php">VIEW CUSTOMERS</a></li>
            </ul>
        </nav>
     </div>
            </body>
            </html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transaction history</title>
</head>
<body>

<body style="background-color : white;">



	<div class="">
        <h2 class="heading" style="color : blue;">TRANSACTION HISTORY</h2>
        
       <br>
       <div>
    <table class="viewusers" >
        <thead">
            <tr class="head">
                
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                
                
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from history";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            
            <td class="py-2"><?php echo $rows['Fromcust']; ?></td>
            <td class="py-2"><?php echo $rows['Tocust']; ?></td>
            <td class="py-2"><?php echo $rows['Amount']; ?> </td>
            
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>

<style>
*{
    padding: 5px;
    margin: 0;
}


.viewusers{
  background-color: #272727;
  margin-left: auto; 
  margin-right: auto;
}

table, th, td {
  background-color: white;
  border: 0px solid black;
  width:40%;
  text-align:center;
}

.head{
             background: pink;
             font-size: 15px;
}
.heading{
     font-size: 20px;
     text-align: center;
     top: 50%;
    left: 50%;
    height: 3vh;
}

.wrapper{
    background-color: white;
    background-size: cover;
    height: 25vh;
}


.navbar{
    height: 50px;
    width: 100%;
    background-color: rgba(0,0,0,4);
    opacity: .8;
}

.navbar ul{
    float: left;
    margin-right: 20px;
}

.navbar ul li{
    list-style: none;
    margin: 0 8px;
    display: inline-block;
    line-height: 25px;
}

.navbar ul li a{
    text-decoration: none;
    color: green;
    font-size: 20px;
    padding: 6px 13px;
}

.navbar ul li a.active,
.navbar ul li a:hover{
    background-color: white;
    border-radius: 2px;

}
</style>
    
</body>
</html>
  