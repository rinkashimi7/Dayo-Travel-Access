<?php
$con=mysqli_connect('localhost','root','','dayo_travel_access_user_db');  
$sql=mysqli_query($con,"select * from reserve_booking");  
$row=mysqli_fetch_assoc($sql);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Information Details</title>

        
        <!--Icon link-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
         <!-- font links--> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
    
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      margin: 0;
      padding: 0;
    }

    .logo-container {
    width: 50%;
    
    text-align: center;
    max-width: 100%;
  padding-top: 100px;
    background:  url(IMAGES/pattern.png);
 

}

    .logo img {
      max-width: 49%;
      padding-bottom: 36vh;
      height: auto;
      cursor: pointer;
    }

    form {
      color: white;
      padding: 50px;
      background-color: #3fa38c;
      width: 50%;
      max-width: 100%;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin:auto;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #19ac14;
      color: #fff;
      padding: 20px 20px 20px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-left: 39%;
    }

    button:hover {
      background-color: #18866a;
      text-align: center;
    }

    .container {
      display:flex; 
      justify-content:space-evenly; 
      max-width: 1200px;
      width: 100%;
      padding: 200px;
      box-sizing: border-box;
    }

    h2 {
      text-align: center;
      color: white;
    }
  </style>
</head>
   
    <div class="logo-container">
      
        <div class="logo">
          <img src="IMAGES/DAYO LOGO.png" alt="Dayo Logo">
        </div>
      </a>
    </div>
     
</head>
<body>

  <form action="transaction.php">

    <h2>Information Details:</h2>

<div>
    <p><b><em>Name: </em></b><?php echo $row['fullname'] ?> </p>
    <p><b><em>Email: </em></b> <?php echo $row["email"]; ?></p>
    <p><b><em>CP#: </em></b> <?php echo $row["cp_num"]; ?></p>
    <p><b><em>Packages: </em></b> <?php echo $row["package"]; ?></p>
    <p><b><em>Adult Count: </em></b><?php echo $row["adult_count"]; ?></p>
    <p><b><em>Kids Count: </em></b><?php echo $row["kid_count"]; ?></p>
    <p><b><em>Vehicle: </em></b><?php echo $row["vehicle"]; ?></p>
    <p><b><em>Travel Date: </em></b><?php echo $row["trav_date"]; ?></p>
    <p><b><em>Travel Time: </em></b><?php echo $row["trav_time"]; ?></p>
    <p><b><em>Pick-Up Location: </em></b><?php echo $row["street"]; ?><?php echo $row["brgy"]; ?></p>
    <p><b><em>Status: </em></b><?php  
                       if ($row['status']==1) {  
                            echo "Pending";  
                       }if ($row['status']==2) {  
                            echo "Your request is accepted, you can now proceed to payment.";  
                       }if ($row['status']==3) {  
                            echo "Your request is rejected.";  
                       }  
                       ?></p>

</p>
</div>

<button type="submit" class="reservation">PAYMENT TO PROCESS</button>
    </form>
</body>
</html>


