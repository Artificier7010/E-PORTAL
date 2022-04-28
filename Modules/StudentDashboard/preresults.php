<?php

use mysql_xdevapi\Result;

session_start();
$sesnid = $_SESSION['sessnid'];
$uid = $_SESSION['suser'];

if (isset($_SESSION['sessnid']) == false) {
  echo '<script type="text/JavaScript"> 
            window.location="../../index.php";
            alert("login failed");
            </script>';
}
?>

<?php
$score = 0;
$i = 1;
//  $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
$connect = mysqli_connect("localhost", "root", "", "registration");

$sql3 = "SELECT * FROM preresults WHERE preresults.userid=$uid";


$ansrs = mysqli_query($connect, $sql3);

while ($ansrow = mysqli_fetch_array($ansrs)) {
  // echo "<script type='text/javascript'>
  //     alert('Worked');
  //  </script>"
  $sid = $ansrow['sessnid'];

  $sql2 = "SELECT questiontab.question,questiontab.answer,questiontab.id,answer.userans,answer.qid FROM questiontab,answer WHERE answer.testid=$sid and answer.qid=questiontab.id";
  $rs2 = mysqli_query($connect, $sql2);
  $result = 0;

  while ($row2 = mysqli_fetch_array($rs2)) {
    if ($row2['answer'] == $row2['userans']) {
      $result = $result + 10;
      $score = $result;
    }
  }
  echo "<div class='bhak'>";
  echo "<h1 >EXAM $i RESULT</h1>";
  echo "<h2 class='ani'>Score</h1>";
  echo "<h3 class='ani'>" . $result . "</h3>";
  if ($result < 60) {

    echo "<div class='res2'><h2>Failed</h2></div>";
  } else {
    echo "<div class='res'><h2>Passed</h2></div>";
  }
  echo "<h3>" . $result . "%</h3>";

  echo "</div>";
  $i++;
}







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
    @import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');

    * {
      font-family: 'Staatliches', cursive;
    }

    .bhak {
      width: 100%;

      margin: 21px 10px;
      margin-right: 10px;
      box-shadow: 10px 10px 30px gray;
      background: #f0f0f0;
      border-radius: 10px;
      overflow: hidden;
    }

    .bhak h1 {
      width: 100%;
      height: 50px;
      background: rgb(255 180 127);
      color: White;
      padding-left: 20px;
      letter-spacing: 3px;
      word-spacing: 5px;
    }

    .ani {
      padding-left: 20px;
      letter-spacing: 2px;
    }

    .res {
      display: flex;
      justify-content: center;
      align-items: center;

      width: 150px;
      height: 50px;

      font-size: 18px;
      padding: 5px;
      background: greenyellow;
      color: #000000;
      margin: 10px 0;
      letter-spacing: 4px;



    }

    .res2 {
      display: flex;
      justify-content: center;

      width: 150px;
      height: 50px;
      align-items: center;

      font-size: 18px;
      padding: 5px;
      background: #ff5656;
      color: #ffffff;
      letter-spacing: 4px;
      margin: 10px 0;


    }

    .navigation {
      width: 100%;
      background-color: black;
    }

    img {
      width: 25px;
      border-radius: 50px;
      float: left;
    }

    .logout {
      font-size: .8em;
      font-family: 'Oswald', sans-serif;
      position: relative;
      right: -9px;
      bottom: -4px;

      overflow: hidden;
      letter-spacing: 3px;
      opacity: 0;
      transition: opacity .45s;
      -webkit-transition: opacity .35s;


    }

    .button {
      text-decoration: none;
      float: right;
      padding: 12px;
      margin: 15px;
      color: white;
      width: 25px;
      background-color: black;
      transition: width .35s;
      -webkit-transition: width .35s;
      overflow: hidden;


    }

    a:hover {
      width: 100px;
    }

    a:hover .logout {
      opacity: .9;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="navigation">

    <a class="button" id="btn">
      <img src="https://img.icons8.com/office/40/000000/shutdown.png" />

      <div class="logout">LOGOUT</div>

    </a>

  </div>

  <script src="jquery-3.6.0.js"></script>
  <script>
    $("#btn").click(function() {
      window.location = "logout.php";
    })
  </script>







</body>

</html>

<?php

mysqli_close($connect);


?>