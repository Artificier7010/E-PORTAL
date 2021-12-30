<?php
session_start();
$sesnid=$_SESSION['sessnid'];
$uid=$_SESSION['suser'];

if(isset($_SESSION['sessnid'])==false){
  echo '<script type="text/JavaScript"> 
            window.location="index.php";
            alert("login failed");
            </script>';
}
?>

<?php
//  $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
 $connect =mysqli_connect("localhost","root","","registration");

  $sql3="SELECT answer.qid,answer.userans,answer.testid,questiontab.id,questiontab.question,questiontab.answer FROM answer,questiontab WHERE answer.qid=questiontab.id and answer.testid=$sesnid";

    $ansrs=mysqli_query($connect,$sql3);
    $score=0;
   
   
   



  //   while($ansrow=mysqli_fetch_array($ansrs)){
  //    // echo '<script type="text/javascript">
  //    // window.location="dash.php";
  //    // </script>';
  //    if($ansrow['userans']==$ansrow['answer']){
  //      $score=$score+10;
  //      echo $score."<br>";
  //    }
     
  // }
 






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  background-color: #04AA6D;
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

</style>
</head>
<body>
    <div class="cont">
      <table id="customers">
        <tr>
          <th>SNo.</th>
          <th>Question</th>
          <th>Answer</th>
          <th>Remarks</th>
        </tr>
          <?php
           while($ansrow=mysqli_fetch_array($ansrs)){
            // echo '<script type="text/javascript">
            // window.location="dash.php";
            // </script>';
            if($ansrow['userans']==$ansrow['answer']){
              $score=$score+10;
              echo "<tr>";
              echo '<td>'.$ansrow["qid"].'</td>';
              echo '<td>'.$ansrow["question"].'</td>';
              echo '<td>'.$ansrow["userans"].'</td>';
              echo '<td> True &nbsp; &nbsp; <i class="tru">&#10003;<i></td>';
              echo "</tr>";

              
            }else{
              echo "<tr>";
              echo '<td>'.$ansrow["qid"].'</td>';
              echo '<td>'.$ansrow["question"].'</td>';
              echo '<td>'.$ansrow["userans"].'</td>';
              echo '<td> False &nbsp; &nbsp; <i class="fal">&#10007;<i></td>';
              echo "</tr>";

            }


            
         }
              
            //this is for preresults
            $sqll2="INSERT INTO preresults VALUES(
            NULL,
            '$uid',
            '$sesnid',
            '$score' 
          )";
          $rs=mysqli_query($connect,$sqll2);
          if($rs){
            echo "<script type='text/javascript'>

            </script>";
          }else{
            echo "error=".mysqli_error($connect);

          }
       
           ?>
           <tr>
             <td colspan="3" style="text-align: right;">Total Score</td>
             <td><?php echo $score ?></td>
           </tr>
      </table>
       
        
    </div>
    <div class="result">
      <?php
      if($score<60){
        echo "<h1 class='fal'> Failed </h1>";
      }else{
        echo "<h1 class='tru2'> Passed </h1>";

      } 
      ?>
    </div>
   
    <script src="jquery-3.6.0.js"></script>
   



   
   
</body>
</html>

<?php

  mysqli_close($connect);
  session_unset();
  session_destroy();

              
           ?>





