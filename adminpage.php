<?php
 $con=mysqli_connect('localhost','root','','dayo_travel_access_user_db');  
 $sql=mysqli_query($con,"select * from reserve_booking");  
 //Get Update id and status  
 if (isset($_GET['id']) && isset($_GET['status'])) {  
      $id=$_GET['id'];  
      $status=$_GET['status'];  
      mysqli_query($con,"update reserve_booking set status='$status' where id='$id'");  
      header("location: adminpage.php");  
      die(); } 
  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <title>CBSTC ADMIN.</title>  
      <header>
          <a href="#"><img src="IMAGES/DAYO LOGO.png" width="170" 
               height="170"></a>
         </header>
      <style type="text/css">  
           *{  
                padding: 0;  
                margin: 0;  
                box-sizing: border-box;  
           }  
           body{  
               /*background-image: linear-gradient(rgba(74, 113, 165, 0.179),rgba(19, 96, 100, 0.201)),url(IMAGES/WALLPAPER.png);*/
               background-color: gray;
                height: auto;  
                justify-content: center;  
           }  

          
           .container{  
                width: auto;  
                max-width: auto;  
                margin: 2rem;  
                 color: #fff;
           }  
           .container table{  
                width: 100%;  
                margin: auto;  
                border-color: white;
                background-color: black;
                border-collapse: collapse;  
                font-size: 12px;
                text-align: center;  
           }  
           .container table th{  
                background: rgb(45, 185, 55);  
                color: #fff;  
           }  
           select{  
                width: 100%;  
                padding: 0.9rem 0;  
                font-size: 1rem;  
           }  
      </style>  
 </head>  
 <body>  
 <div class="container">  
      <table border="2">  
           <tr>  
                <th>Book Number</th>  
                <th>Fullname</th>  
                <th>Package</th>  
                <th>Adult Count</th>
                <th>Kid Count</th>
                <th>Vehicle</th>      
                <th>Date </th>
                <th>Time</th>
                <th>Pickup Location</th>  
                <th>Status</th>  
                <th>Action</th>
                  
           </tr>  
           <?php   
           if (mysqli_num_rows($sql)>0) {  
                 while ($row=mysqli_fetch_assoc($sql)) { ?>  
                 <tr>  
                      <td><?php echo $row['id'] ?></td>  
                      <td><?php echo $row['fullname'] ?></td>  
                      <td><?php echo $row['package'] ?></td>
                      <td><?php echo $row['adult_count'] ?></td>
                      <td><?php echo $row['kid_count'] ?></td>
                      <td><?php echo $row['vehicle'] ?></td>
                      <td><?php echo $row['trav_date'] ?></td>
                      <td><?php echo $row['trav_time'] ?></td>
                      <td><?php echo $row['street'], ", ", $row['brgy'] ?></td>
                      <td>  
                           <?php  
                           if ($row['status']==1) {  
                                echo "Pending";  
                           }if ($row['status']==2) {  
                                echo "Accept";  
                           }if ($row['status']==3) {  
                                echo "Reject";  
                           }  
                           ?>  
                      </td>  
                      <td>  
                           <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['id'] ?>')">  
                                <option value="">Update Status</option>  
                                <option value="1">Pending</option>  
                                <option value="2">Accept</option>  
                                <option value="3">Reject</option>  
                           </select>  
                      </td>  
                 </tr>       
           <?php      }  
            } ?>  
      </table>  
 </div>  
 <script type="text/javascript">  
      function status_update(value,id){  
           //alert(id);  
           let url = "http://localhost/adminpage.php";  
           window.location.href= url+"?id="+id+"&status="+value;  
      }  
 </script>  


 </body>  
 </html>