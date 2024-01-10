<?php
$con=mysqli_connect('localhost','root','','dayo_travel_access_user_db');  
$sql=mysqli_query($con,"select * from reserve_booking2");  
$row=mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking details</title>
    <header>
        <a href="packages.html"> <img src="IMAGES/DAYO LOGO.png"  alt="Dayo Logo"></a>
       </header>
     
</head>
<body>

  <form action="transaction_plan.php">

    <h2>Information Details:</h2>

<div>
    <p><b><em>Name: </em></b><?php echo $row['fullname'] ?> </p>
    <p><b><em>Email: </em></b> <?php echo $row["email"]; ?></p>
    <p><b><em>CP#: </em></b> <?php echo $row["cp_num"]; ?></p>
    <p><b><em>Days and Nights: </em></b> <?php echo $row["days_and_nights"]; ?></p>
    <p><b><em>Province: </em></b><?php echo $row["province"]; ?></p>
    <p><b><em>Destination: </em></b><?php echo $row["destination"]; ?></p>
    <p><b><em>Adult Count: </em></b><?php echo $row["adult_count"]; ?></p>
    <p><b><em>Kids Count: </em></b><?php echo $row["kid_count"]; ?></p>
    <p><b><em>Vehicle: </em></b><?php echo $row["vehicle"]; ?></p>
    <p><b><em>Travel Date: </em></b><?php echo $row["trav_date"]; ?></p>
    <p><b><em>Travel Time: </em></b><?php echo $row["trav_time"]; ?></p>
    <p><b><em>Pick-Up Location: </em></b><?php echo $row["street"]; ?>, <?php echo $row["brgy"]; ?></p>
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

<button type="submit" class="reservation">Transaction</button>
    </form>
</body>
</html>

<style>

body {
      font-family: Arial, sans-serif;
      background-image: linear-gradient(rgba(74, 113, 165, 0.179),rgba(19, 96, 100, 0.201)),url(IMAGES/WALLPAPER.png);
      height: auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      color: #333;
    }

    header {
      
      text-align: center;
      
    }

    header img {
      max-width: 50%;
      height: auto;
      cursor: pointer;
      
    }

    button {
      background-color: #19ac14;
      color: #fff;
      padding: 20px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-left: 39%;
      margin-top: 2%;
    }

    button:hover {
      background-color: #18866a;
      text-align: center;
    }

  h2{
    color:white;
    text-align: center;
  }
  
  form{
  color: white;
  background-color: #18866acc;
  padding: 40px 20px 40px 20px;
  border-radius: 8px;
}
</style
</html>