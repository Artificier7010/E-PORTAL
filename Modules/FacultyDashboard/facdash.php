<!-- category insertion  -->
<?php

use UI\Controls\Form;

// $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
$connect = mysqli_connect("localhost", "root", "", "registration");

if (isset($_POST['cate'])) {

  $cate1 = $_POST['cate'];

  $sql = "INSERT INTO category VALUES(NULL,'$cate1')";


  $rs = mysqli_query($connect, $sql);

  if ($rs) {
    echo "<script type='text/javascript'>alert('worked')</script>";
  }
}


?>

<!-- user detail data -->

<?php

$sql2 = "SELECT * FROM regist ";

$anss = mysqli_query($connect, $sql2);

?>



<!-- User result -->
<!-- ************************** -->




<?php

$sql3 = "SELECT regist.firstname,regist.lastname,regist.mobileno,preresults.score FROM regist,preresults WHERE regist.mobileno=preresults.userid";

$reslt = mysqli_query($connect, $sql3);
?>



<!-- Categories Data -->


<?php

$sql4 = "SELECT * FROM category";
$categ = mysqli_query($connect, $sql4);

?>



<!-- schedule exam -->
<!-- ********************************* -->


<?php


if (isset($_POST['date'])) {

  $dat = $_POST['date'];
  $branch = filter_input(INPUT_POST, 'branch', FILTER_SANITIZE_STRING);
  $sem = filter_input(INPUT_POST, 'sem', FILTER_SANITIZE_STRING);
  $sub = $_POST['sub'];


  $sql5 = "INSERT INTO shedtab VALUES(NULL,'$dat','$branch','$sem','$sub')";

  $rs4 = mysqli_query($connect, $sql5);

  if ($rs4) {
  }
}



?>











<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    /* Google Font Link */
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;700;800;900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Raleway";
    }
    html{
      height: auto;
    }

    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      height: 100%;
      width: 78px;
      background: rgb(255 180 127);
      padding: 6px 14px;
      z-index: 99;
      transition: all 0.5s ease;
      border-right: 3px solid black;
    }

    .sidebar ul {
      padding-left: 0 !important;
    }

    .sidebar.open {
      width: 250px;
    }

    .sidebar .logo-details {
      height: 60px;
      display: flex;
      align-items: center;
      position: relative;
    }

    .sidebar .logo-details img {
      opacity: 0;
      transition: all 0.5s ease;
    }

    .sidebar .logo-details .logo_name {
      color: #fff;
      font-size: 20px;
      font-weight: 600;
      margin-left: 15px;
      opacity: 0;
      transition: all 0.5s ease;
    }

    .sidebar.open .logo-details img,
    .sidebar.open .logo-details .logo_name {
      opacity: 1;
    }

    .sidebar .logo-details #btn {
      position: absolute;
      top: 50%;
      right: 0;
      transform: translateY(-50%);
      font-size: 22px;
      transition: all 0.4s ease;
      font-size: 23px;
      text-align: center;
      cursor: pointer;
      transition: all 0.5s ease;
    }

    .sidebar.open .logo-details #btn {
      text-align: right;
    }

    .sidebar i {
      color: #fff;
      height: 60px;
      min-width: 50px;
      font-size: 28px;
      text-align: center;
      line-height: 60px;
    }

    .sidebar .nav-list {
      margin-top: 20px;
      height: 100%;
    }

    .sidebar li {
      position: relative;
      margin: 8px 0;
      list-style: none;
    }

    .sidebar li .tooltip {
      position: absolute;
      top: -20px;
      left: calc(100% + 15px);
      z-index: 3;
      background: #fff;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 15px;
      font-weight: 400;
      opacity: 0;
      white-space: nowrap;
      pointer-events: none;
      transition: 0s;
    }

    .sidebar li:hover .tooltip {
      opacity: 1;
      pointer-events: auto;
      transition: all 0.4s ease;
      top: 50%;
      transform: translateY(-50%);
    }

    .sidebar.open li .tooltip {
      display: none;
    }

    .sidebar input {
      font-size: 15px;
      color: #FFF;
      font-weight: 400;
      outline: none;
      height: 50px;
      width: 100%;
      width: 50px;
      border: none;
      border-radius: 12px;
      transition: all 0.5s ease;
      background: #1d1b31;
    }

    .sidebar.open input {
      padding: 0 20px 0 50px;
      width: 100%;
    }

    .sidebar .bx-search {
      position: absolute;
      top: 50%;
      left: 0;
      transform: translateY(-50%);
      font-size: 22px;
      background: #1d1b31;
      color: #FFF;
    }

    .sidebar.open .bx-search:hover {
      background: #1d1b31;
      color: #FFF;
    }

    .sidebar .bx-search:hover {
      background: #FFF;
      color: #11101d;
    }

    .sidebar li a {
      display: flex;
      height: 100%;
      width: 100%;
      border-radius: 12px;
      align-items: center;
      text-decoration: none;
      transition: all 0.4s ease;
      background: #ffe2c4;
    }

    .sidebar li a:hover {
      background: whitesmoke;
    }

    .sidebar li a .links_name {
      color: black;
      font-weight: 900;
      font-size: 15px;
      font-weight: 400;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: 0.4s;
    }

    .sidebar.open li a .links_name {
      opacity: 1;
      pointer-events: auto;
    }

    .sidebar li a:hover .links_name,
    .sidebar li a:hover i {
      transition: all 0.5s ease;
      color: #11101D;
    }

    .sidebar li i {
      height: 50px;
      line-height: 50px;
      color: #111;
      font-size: 18px;
      border-radius: 12px;
    }

    .sidebar li.profile {
      position: fixed;
      height: 60px;
      width: 78px;
      left: 0;
      bottom: -8px;
      padding: 10px 14px;
      background: #ffe2c4;
      transition: all 0.5s ease;
      overflow: hidden;
    }

    .sidebar.open li.profile {
      width: 250px;
      color: #111;
      border-right: 3px solid black;
    }

    .sidebar li .profile-details {
      display: flex;
      align-items: center;
      flex-wrap: nowrap;
    }

    .sidebar li img {
      height: 45px;
      width: 45px;
      object-fit: cover;
      border-radius: 6px;
      margin-right: 10px;
    }

    .sidebar li.profile .name,
    .sidebar li.profile .job {
      font-size: 15px;
      font-weight: 400;
      color: black;
      white-space: nowrap;
    }

    .sidebar li.profile .job {
      font-size: 12px;
    }

    .sidebar .profile #log_out {
      position: absolute;
      top: 50%;
      right: 0;
      transform: translateY(-50%);
      background: #ffe2c4;
      border-right: 3px solid black;
      width: 100%;
      height: 60px;
      line-height: 60px;
      border-radius: 0px;
      transition: all 0.5s ease;
      color: #111;
    }

    .sidebar.open .profile #log_out {
      width: 50px;
      background: none;
      border: none;
    }

    .home-section {
      position: relative;
      background: #E4E9F7;
      min-height: 100vh;
      top: 0;
      left: 78px;
      width: calc(100% - 78px);
      transition: all 0.5s ease;
      z-index: 2;
    }

    .sidebar.open~.home-section {
      left: 250px;
      width: calc(100% - 250px);
    }

    .home-section .text {
      display: inline-block;
      color: #11101d;
      font-size: 25px;
      font-weight: 500;
      margin: 18px
    }

    /* dashbord style */

    .dashbord {
      position: absolute;
      top: 0;
      left: 0;
      background: whitesmoke;
      height: 100%;
      width: 100%;
      background: url("dash.png");

    }

    /* add category */
    .addcat {
      margin-bottom: 50px;

    }
    .container {
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }

    .container .title::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .container2 {
      width: 95%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container2 .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }

    .container2 .title::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .content form .user-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
      margin-bottom: 15px;
      width: calc(100% / 2 - 20px);
    }

    form .input-box span.details {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }

    .user-details .input-box input {
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
      border-color: #9b59b6;
    }

    form .gender-details .gender-title {
      font-size: 20px;
      font-weight: 500;
    }

    form .category {
      display: flex;
      width: 80%;
      margin: 14px 0;
      justify-content: space-between;
    }

    form .category label {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    form .category label .dot {
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,
    #dot-3:checked~.category label .three {
      background: #9b59b6;
      border-color: #d9d9d9;
    }

    form input[type="radio"] {
      display: none;
    }

    form .frmbtn {
      margin: 35px;
    }

    form .frmbtn input {
      height: 100%;
      width: 100%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    form select {
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }

    form .frmbtn input:hover {
      /* transform: scale(0.99); */
      background: linear-gradient(-135deg, #71b7e6, #9b59b6);
    }

    /* addcat form styling end */

    /* Form close */
    .addcatclose {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 25px;
      width: 30px;
      height: 30px;
      background: transparent;
      font-weight: bolder;
      border: none;
      outline: none;
    }

    .addcatclose:hover {
      color: red;

    }



    /* Table Styling */
    /* *********************** */

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;

    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background: linear-gradient(-135deg, #71b7e6, #9b59b6);
      color: white;
    }

    .tru {
      color: #03ff18;

    }

    .tru2 {
      color: #91ff9a;

    }

    .fal {
      color: #ff4a4a;
    }

    .result {
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


    /* Button Styling */
    /* ********************** */
    .button {
      background-color: #4CAF50;
      /* Green */
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
      border: 2px solid #f44336;
    }

    .button3:hover {
      background-color: #f44336;
      color: white;
    }


    /* Toaster Styling */
    /* ************************** */
    #toast {
      visibility: hidden;
      max-width: 50px;
      height: 50px;
      /*margin-left: -125px;*/
      margin: auto;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;

      position: fixed;
      z-index: 1;
      left: 0;
      right: 0;
      bottom: 30px;
      font-size: 17px;
      white-space: nowrap;
    }

    #toast #img {
      width: 50px;
      height: 50px;

      float: left;

      padding-top: 16px;
      padding-bottom: 16px;

      box-sizing: border-box;


      background-color: #111;
      color: #fff;
    }

    #toast #desc {


      color: #fff;

      padding: 16px;

      overflow: hidden;
      white-space: nowrap;
    }

    #toast.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, expand 0.5s 0.5s, stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, expand 0.5s 0.5s, stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
    }

    #wislogo {
      width: 40px;
      height: 40px;
    }



    /* Result Analytics Section */

    .userdetcard {
      min-width: 170px;
      height: 50px;
      display: flex;
      justify-content: space-between;
      border: 1px solid rgb(54, 162, 235);
      align-items: center;
      background: rgba(54, 162, 235, 0.2);
      border-radius: 5px;
      margin-top: 20px;
      padding: 0 10px;
      box-shadow: 5px 5px 15px rgba(54, 162, 235, 0.2);
      color: black;

    }

    @-webkit-keyframes fadein {
      from {
        bottom: 0;
        opacity: 0;
      }

      to {
        bottom: 30px;
        opacity: 1;
      }
    }

    @keyframes fadein {
      from {
        bottom: 0;
        opacity: 0;
      }

      to {
        bottom: 30px;
        opacity: 1;
      }
    }

    @-webkit-keyframes expand {
      from {
        min-width: 50px
      }

      to {
        min-width: 350px
      }
    }

    @keyframes expand {
      from {
        min-width: 50px
      }

      to {
        min-width: 350px
      }
    }

    @-webkit-keyframes stay {
      from {
        min-width: 350px
      }

      to {
        min-width: 350px
      }
    }

    @keyframes stay {
      from {
        min-width: 350px
      }

      to {
        min-width: 350px
      }
    }

    @-webkit-keyframes shrink {
      from {
        min-width: 350px;
      }

      to {
        min-width: 50px;
      }
    }

    @keyframes shrink {
      from {
        min-width: 350px;
      }

      to {
        min-width: 50px;
      }
    }

    @-webkit-keyframes fadeout {
      from {
        bottom: 30px;
        opacity: 1;
      }

      to {
        bottom: 60px;
        opacity: 0;
      }
    }

    @keyframes fadeout {
      from {
        bottom: 30px;
        opacity: 1;
      }

      to {
        bottom: 60px;
        opacity: 0;
      }
    }


    /* add .category for small screen */
    @media (max-width: 420px) {
      .sidebar li .tooltip {
        display: none;
      }
    }

    @media(max-width: 584px) {
      .container {
        max-width: 100%;
      }

      form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
      }

      form .category {
        width: 100%;
      }

      .content form .user-details {
        max-height: 300px;
        overflow-y: scroll;
      }

      .user-details::-webkit-scrollbar {
        width: 5px;
      }
    }

    @media(max-width: 459px) {
      .container .content .category {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>


  <!-- sidebar  -->
  <!-- *************************** -->


  <div class="sidebar">
    <div class="logo-details">
      <img src="../../Assets/darkbglogo.png" alt="" id="wislogo">
      <div class="logo_name">Wiscore</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a id="dash" href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a id="categ" href="#">
          <i class="fas fa-list-ol"></i>
          <span class="links_name">Attendence</span>
        </a>
        <span class="tooltip">Attendence</span>
      </li>
      <li>
        <a id="usr" href="#">
          <i class='bx bx-user'></i>
          <span class="links_name">Users</span>
        </a>
        <span class="tooltip">Users</span>
      </li>
      <li>
        <a id="rslt" href="#">
          <i class='bx bx-chat'></i>
          <span class="links_name">Results</span>
        </a>
        <span class="tooltip">Results</span>
      </li>
      <li>
        <a id="shedul" href="#">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Schedule</span>
        </a>
        <span class="tooltip">Schedule</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <div class="name_job">
            <div class="name">Prem Shahi</div>
            <div class="job">Web designer</div>
          </div>
        </div>
        <i class='bx bx-log-out' id="log_out"></i>
      </li>
    </ul>
  </div>
  <section class="home-section">


    <!-- dashbord -->
    <!-- *********************************** -->
    <div class="dashbord">
      <div class="container">
        <!-- Top Elements  -->
        <div class="row">
          <div class="col">
            <div class="userdetcard">
              <h3>Users 128</h3>
              <i class='bx bx-menu'></i>
            </div>

          </div>
          <div class="col">
            <div class="userdetcard">
              <h3>Activity 128</h3>
              <i class='bx bx-menu'></i>
            </div>

          </div>
          <div class="col">
            <div class="userdetcard">
              <h3>Streaks 128</h3>
              <i class='bx bx-menu'></i>
            </div>

          </div>
        </div>


        <!-- Graph content 1 -->
        <br>
        <br>
        <div class="row">
          <div class="col">
            <h2>User Analytics</h2>
            <hr>
            <canvas id="myChart" width="100" height="100"></canvas>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col">
            <h2>Result Analytics</h2>
            <hr>
            <canvas id="myChart2" width="100" height="100"></canvas>
          </div>
        </div>


      </div>
    </div>




    <!-- Attendence -->
    <!-- ************************** -->

    <div class="addcat">
      <div class="container">
      <table>
  
  <thead>
    <th>name</th>
    <th>war</th>
    <th>ba</th>
    <th>obp</th>
    <th>slg</th>
    <th>ops</th>
    <th>rbi</th>
    <th>hr</th>
  </thead>
  
  <tbody>
    <tr>
      <td data-label="name">Ken Griffey Jr.</td>
      <td data-label="war">83.8</td>
      <td data-label="ba">.284</td>
      <td data-label="obp">.370</td>
      <td data-label="slg">.583</td>
      <td data-label="ops">.907</td>
      <td data-label="rbi">1836</td>
      <td data-label="hr">630</td>
    </tr>
      
      <tr>
      <td data-label="name">Derek Jeter</td>
      <td data-label="war">71.3</td>
      <td data-label="ba">.310</td>
      <td data-label="obp">.377</td>
      <td data-label="slg">.440</td>
      <td data-label="ops">.817</td>
      <td data-label="rbi">1311</td>
      <td data-label="hr">260</td>
    </tr>
      
      <tr>
      <td data-label="name">Cal Ripken Jr.</td>
      <td data-label="war">95.9</td>
      <td data-label="ba">.276</td>
      <td data-label="obp">.340</td>
      <td data-label="slg">.447</td>
      <td data-label="ops">.788</td>
      <td data-label="rbi">1695</td>
      <td data-label="hr">431</td>
    </tr>
      
      <tr>
      <td data-label="name">Darryl Strawberry</td>
      <td data-label="war">42.2</td>
      <td data-label="ba">.259</td>
      <td data-label="obp">.357</td>
      <td data-label="slg">.505</td>
      <td data-label="ops">.862</td>
      <td data-label="rbi">1000</td>
      <td data-label="hr">335</td>
    </tr>
  </tbody>
  
</table>

      </div>
    </div>

    <!-- User Details -->
    <!-- ************************* -->
    <div class="userdetail">
      <br>
      <div class="three">
        <h1>User Details</h1>
      </div>
      <br>
      <table id="customers">
        <tr>
          <th>Id</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>User ID</th>
          <th>Branch</th>
          <th>Semester</th>
          <th>Mobile No.</th>
          <th>Action</th>
        </tr>
        <?php
        $sno = 1;
        while ($userrow = mysqli_fetch_array($anss)) {
          // echo '<script type="text/javascript">
          // window.location="dash.php";
          // </script>';
          if ($userrow) {



            echo "<tr>";
            echo '<td>' . $sno . '</td>';
            echo '<td>' . $userrow["firstname"] . '</td>';
            echo '<td>' . $userrow["lastname"] . '</td>';
            echo '<td>' . $userrow["id"] . '</td>';
            echo '<td>' . $userrow["branch"] . '</td>';
            echo '<td>' . $userrow["semester"] . '</td>';
            echo '<td>' . $userrow["mobileno"] . '</td>';
            echo '<td><button class="button button3 x">Delete</button></td>';


            echo "</tr>";
            $sno++;
          } else if ($userrow['id'] == NULL) {
            echo "<tr>";
            echo '<td colspan="8" style="text-align:center;">No Users</td>';
            echo "</tr>";
          }
        }
        ?>
      </table>
    </div>


    <!-- User result -->
    <!-- *********************************************************** -->

    <div class="userresult">
      <br>
      <div class="three">
        <h1>Results</h1>
      </div>
      <br>
      <table id="customers">
        <tr>
          <th>Id</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>User ID</th>
          <th>Score</th>

        </tr>
        <?php
        $sno = 1;
        while ($row1 = mysqli_fetch_array($reslt)) {
          if ($row1) {
            echo "<tr>";
            echo '<td>' . $sno . '</td>';
            echo '<td>' . $row1["firstname"] . '</td>';
            echo '<td>' . $row1["lastname"] . '</td>';
            echo '<td>' . $row1["mobileno"] . '</td>';
            echo '<td>' . $row1["score"] . '</td>';
          }
        }
        ?>
      </table>
    </div>


    <!-- Schedule Exam -->
    <!-- ************************** -->

    <div class="schedule">
      <button class="addcatclose" id="addcatclose"><i class="fas fa-times"></i></button>
      <div class="container2">
        <div class="three">
          <h1>Schedule</h1>
        </div>
        <div class="content">
          <form method="POST">
            <div class="user-details">
              <div class="input-box">
                <span class="details"> Date</span>
                <input name="date" type="date" placeholder="Enter Category" required>
              </div>
              <div class="input-box">
                <span class="details">Branch</span>
                <select name="branch">
                  <option>IT</option>
                  <option>CSE</option>
                </select>
              </div>
              <div class="input-box">
                <span class="details">Semester</span>
                <select name="sem">
                  <option>1st Semester</option>
                  <option>2st Semester</option>
                  <option>3st Semester</option>
                  <option>4st Semester</option>
                  <option>5st Semester</option>
                  <option>6st Semester</option>
                  <option>7st Semester</option>
                  <option>8st Semester</option>
                </select>
              </div>
              <div class="input-box">
                <span class="details"> Subject</span>
                <select name="sub">
                  <?php
                  while ($category = mysqli_fetch_array($categ)) {
                    if ($category) {
                      echo "<option value='$category[catename]'>$category[catename]</option>";
                    }
                  }
                  ?>


                </select>
              </div>

            </div>

            <div class="frmbtn">
              <input type="submit" value="Schedule">
            </div>
          </form>
        </div>
      </div>

    </div>



  </section>
  <div class="delmsg"></div>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
      }
    }
  </script>

  <script src="../../jquery-3.6.0.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
  <script>
    $(document).ready(function() {

      // hiding elements
      // ************************

      $(".addcat").hide();
      $(".userdetail").hide();
      $(".userresult").hide();
      $(".schedule").hide();


      // Navigating through different sections
      // ******************************

      $('#dash').click(function() {

        $(".addcat").hide();
        $(".userdetail").hide();
        $(".userresult").hide();
        $(".schedule").hide();
        $(".dashbord").show();
      })

      $('#categ').click(function() {

        $(".addcat").fadeIn(200);
        $(".userdetail").hide();
        $(".userresult").hide();
        $(".schedule").hide();
        $(".dashbord").hide();
      })


      $('#usr').click(function() {

        $(".addcat").hide();
        $(".userdetail").fadeIn(200);
        $(".userresult").hide();
        $(".schedule").hide();
        $(".dashbord").hide();

      })


      $('#rslt').click(function() {

        $(".addcat").hide();
        $(".userdetail").hide();
        $(".userresult").fadeIn(200);
        $(".schedule").hide();
        $(".dashbord").hide();

      })

      $('#shedul').click(function() {

        $(".addcat").hide();
        $(".userdetail").hide();
        $(".userresult").hide();
        $(".schedule").fadeIn(200);
        $(".dashbord").hide();

      })





      // Deleting User Details
      // ***************************

      $(".x").click(function() {
        let userid = $(this).closest('tr').find("td:nth-child(4)").text();
        $(this).closest('tr').hide(200);

        $.post("del.php", {
          uid: userid
        }, function(data) {
          $(".delmsg").html(data);
          // alert(data);
        });


      });
    });

    //
  </script>

  <!-- Javascript For Charts.js -->
  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });


    const myChart2 = new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>

</html>