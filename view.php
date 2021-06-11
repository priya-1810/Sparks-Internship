<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view customer

    </title>
</head>
<body>
    <div class="wrapper">
    <nav class="navbar">
            <ul>
                <li><a class="active" href="index.html">HOME</a></li>
                <li><a href="customer.php">VIEW CUSTOMERS</a></li>
                <li><a href="transaction.php">TRANSFER HISTORY</a></li>
                
            </ul>
        </nav>
     </div>
            </body>
            </html>
<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['sn'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where Id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where Id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Invalid Amount")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Transaction failed!Lack of Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE customers set Balance=$newbalance where Id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE customers set Balance=$newbalance where Id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO history(`Fromcust`, `Tocust`, `Amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transaction.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>



<html>
<head>
</head>
<body>



     <?php


$conn = mysqli_connect('localhost','root','','banking');


if(!$conn)
    die("Error while connecting...!").mysqli_connect_error($conn);

error_reporting(0);
 $_GET[ 'sn'];
 $_GET[ 'cn'];
 $_GET[ 'ea'];
 $_GET[ 'bb'];
?>

        
<form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class= "viewusers">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>BALANCE</th>
                </tr>
                <tr>
                    <td><?php echo $_GET[ 'sn' ] ?></td>
                    <td><?php echo $_GET[ 'cn'] ?></td>
                    <td><?php echo $_GET[ 'ea']?></td>
                    <td><?php echo $_GET[ 'bb'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br><br><br><br>
        <div class="form">
        <label><b>To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option></form>
            <?php
                include 'config.php';
                $sid=$_GET['sn'];
                $sql = "SELECT * FROM customers where Id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>

            
                <option class="table" value="<?php echo $rows['Id'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> ) 
               
                </option>
                <?php 
                } 
            ?>
            
            <div>
        </select>
        <br>
        <br>
            <div class= "form">
            <label><b>Amount:</b></label>
            <input type="number" name="amount" required>  </div> 
            <br>
                <div>
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" ><b>Transfer</b></button>
            </div>
        </form>

<style>
    *{
        padding: 0;
        margin: 0;
    }

    
        
.navbar{
    height: 50px;
    width: 100%;
    background-color: rgba(0,0,0,4);
    position: relative;
}



    .main{
        background: pink;
        width: 500px;
        margin: auto;
        padding: 10px 0px 10px 0px;
        text-align: center;
        border-radius: 15px 15px 0px 0px;
        margin-top: 10%;
    }

    .name {
        background-color: white;
        width: 500px;
        margin: auto;
        color: black;
        box-shadow: 0 2px 12px pink;
    }
    .trans {
        text-align: center;
        
    }

    
             .viewusers{
             background-color: #272727;
             margin-left: auto; 
             margin-right: auto;
}

table, th, td {
  background-color: white;
  border: 2px solid black;
  text-align:center;
  width:55%;
}




.head{ 
             background: pink;
             font-size: 15px;
}
.btn {
    padding: 10px;
    margin-left: 10px;
    color: blue;
    background: white;
    
    
   

}
.form{
    padding: 5px;
    top: 50%;
    height: 5vh;
    background-color: white;
    margin-top: 40px;
        width: 500px;
        text-align:right;
        color: black;
        

}
.wrapper{
    background-color: white;
    background-size: cover;
    height: 20vh;
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
    line-height: 50px;
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