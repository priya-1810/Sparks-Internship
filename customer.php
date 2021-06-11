<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer details
    </title>
</head>
<body>
    <div class="wrapper">
    <nav class="navbar">
            <ul>
                <li><a class="active" href="index.html">HOME</a></li>
                
            </ul>
        </nav>
     </div>
     <br><br><br><br><br><br>
     <h1 style="text-align:center;color:blue">CUSTOMER DETAILS</h1><br>
     <table class="viewusers">
         <tr class="head">
             <th>ID</th>
             <th>NAME</th>
             <th>EMAIL</th>
             <th>AMOUNT</th>
             <th>OPERATIONS</th>
         </tr>
         
         <?php

    $conn = mysqli_connect('localhost','root','','banking');


	if(!$conn)
        die("Error while connecting...!").mysqli_connect_error($conn);

    $sql="SELECT * FROM customers";
    $result = $conn-> query($sql);
    if($result->num_rows > 0){
        while ($row = $result -> fetch_assoc()){
            echo "<tr>
            <td>" . $row["Id"] .  "</td>
            <td>" . $row["Name"] . "</td>
            <td>" . $row["Email"] . "</td>
            <td>" . $row["Balance"] . "</td>
            <td><a href='view.php?sn=$row[Id]&cn=$row[Name]&ea=$row[Email]&bb=$row[Balance] '> Transfer</a></td>
            </tr>";
        }   
        
        }
        else{
            echo "no result";
        }
       $conn->close(); 

 ?>
         
         
     </table>
     <style>
         *{
             padding: 5px;
             margin: 0;
         }
        /* table{
             position: absolute;
             z-index: 1;
             left: 50%;
             right: 50%;
             transform: translate(-50% ,50%);
            
             width: 50%;
             height: 20vh;
             background: white;
             text-align: center;
             
			 /*border-collapse:collapse;
             border-spacing: 0;
             border-radius: 12px 12px 0 0;
             overflow: hidden;
             box-shadow: 0 2px 12px pink;
             
         } */
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
             font-size: 10px;
             
         }

         th{
           /*  font-size: 10px;*/
         }

         
         .wrapper{
    background-color: white;
    background-size: cover;
    height: 2vh;
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
    color: black;
    font-size: 20px;
    padding: 7px 10px;
}

.navbar ul li a.active,
.navbar ul li a:hover{
    background-color: white;
    border-radius: 2px;

}
         
     </style>  
</body>
</html>
