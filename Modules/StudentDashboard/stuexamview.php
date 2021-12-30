<?php

session_start();

 $branch1=$_SESSION['branch'];
 $sem1=$_SESSION['sem'];
 $_SESSION['suser'];
date_default_timezone_set("America/New_York");
$d=date('Y-m-d');




// $connect=mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
$connect=mysqli_connect("localhost","root","","registration");

$sql="SELECT * FROM shedtab WHERE  shedtab.branch='$branch1' and shedtab.semester='$sem1' and  shedtab.date='$d'";


$rs=mysqli_query($connect,$sql);







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Document</title>
    <style>
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
 
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  color: white;
}
.tru{
  color: #03ff18;

}
.tru2{
  color: #91ff9a;

}
.fal{
  color: #ff4a4a;
}
.result{
  width: 300px;
  height: 80px;
  border-radius: 10px;
  border: 1px solid gray;
  background: #ebffeb;
  text-align: center;
  margin: 20px auto;
}

/* === HEADING STYLE #3 === */
.three h1 {
  font-size: 28px;
  font-weight: 500;
  letter-spacing: 0;
  line-height: 1.5em;
  padding-bottom: 15px;
  position: relative;
  margin-left: 20px;
}
.three h1:before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 5px;
  width: 55px;
  background-color: #111;
}
.three h1:after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 2px;
  height: 1px;
  width: 95%;
  max-width: 255px;
  background-color: #333;
}
     
/* === HEADING STYLE #3 === */
.three h1 {
    font-size: 28px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 1.5em;
    padding-bottom: 15px;
    position: relative;
    margin-left: 20px;
  }
  .three h1:before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 5px;
    width: 55px;
    background-color: #111;
  }
  .three h1:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 2px;
    height: 1px;
    width: 95%;
    max-width: 255px;
    background-color: #333;
  }


/* Button Styling */
/* ********************** */

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 150px;
  height: 40px;
  color: white;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #66dc31;
}

.button3:hover {
  background-color: #66dc31;
  color: white;
}

    </style>
</head>
<body>
<div class="userdetail">
       <br>
     <div class="three">
     <h1>User Details</h1>
     </div>
     <br>
     <table id="customers">
        <tr>
          <th>S no.</th>
          <th>Branch</th>
          <th>Semester</th>
          <th>Subject</th>
          <th>Date</th>
          <th>Exam</th>
        </tr>
          <?php
          $sno=1;
           while($row=mysqli_fetch_array($rs)){
            // echo '<script type="text/javascript">
            // window.location="dash.php";
            // </script>';
            if($row){
            
             
          
              echo "<tr>";
              echo '<td>'.$sno.'</td>';
              echo '<td>'.$row["branch"].'</td>';
              echo '<td>'.$row["semester"].'</td>';
              echo '<td>'.$row["subject"].'</td>';
              echo '<td>'.$row["date"].'</td>';
              echo '<td><button class="button button3 x">Start Exam</button></td>';

              echo "</tr>";
              $sno++; 
            }else if($row['id']==NULL){
              echo "<h1>No Data Found";
            }   
         }
         ?>
      </table>  
     </div>


</body>
</html>
