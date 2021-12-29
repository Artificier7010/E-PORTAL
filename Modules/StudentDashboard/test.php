<?php
session_start();

if (isset($_SESSION['sessnid']) == false) {
  echo '<script type="text/JavaScript"> 
            window.location="../../index.php";
            alert("login failed");
            </script>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');

    * {
      margin: 0;
      padding: 0;
      outline: none;
      box-sizing: border-box;
      font-family: 'Montserrat', sans-serif;
    }

    body {
      width: 100%;
      height: 100vh;
      background: whitesmoke;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      overflow: hidden;
    }


    .containe {
      width: 100%;
      height: 100%;
      max-width: 1535px;
      overflow: auto;
    }

    .head-cont {
      width: 100%;
      height: auto;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo-txt {
      width: 150px;
      height: 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo-txt img {
      width: 50px;
      height: 50px;
    }

    .logo-txt h1 {
      font-size: 1.8rem;
      margin-bottom: 0px;
      margin-left: 10px;
    }

    .hrr {
      border: 1px solid rgb(0, 0, 0);
      opacity: 1;
    }


    /* Card styling */
    .wrapper {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    .card {
      max-width: 300px;
      min-height: 250px;
      background: #fff;
      padding: 30px;
      box-sizing: border-box;
      color: black;
      margin: 20px;
      box-shadow: 0px 2px 18px -4px rgba(0, 0, 0, 0.75);
    }

    .card:nth-child(2) {
      background: #FFF;
    }

    .card:last-child {
      background: #FFF;
    }

    .card-title {
      margin-top: 0;
      font-size: 16px;
      font-weight: 600;
      letter-spacing: 1.2px;
      color: #ffb47f;
    }

    .card-content {
      font-size: 14px;
      letter-spacing: 0.5px;
      line-height: 1.5;
      font-weight: 500;
    }

    .card-btn {
      all: unset;
      display: inline-block;
     text-align: center;
      border: 2px solid black;
      padding: 10px 15px;
      border-radius: 25px;
      font-size: 10px;
      font-weight: 600;
      transition: all 0.5s;
      cursor: pointer;
      letter-spacing: 1.2px;
    }

    .card-btn:hover {
      color: black;
      background: #FFF;
    }

    .card:nth-child(2) .card-btn:hover {
      color: black;
      background: #FFF;
    }

    .card:last-child .card-btn:hover {
      color: black;
      background: #FFF;
    }
  </style>

</head>

<body>
  <div class="containe">
    <div class="head-cont">
      <div class="logo-txt">
        <img src="../../Assets/lightbglogo.png" alt="">
        <h1>Wiscore</h1>
      </div>

    </div>
    <hr size="2px" class="hrr" color="rgb(255 180 127)">
    
    <br>
    <div id="midcont" class="midcont">
      <center>
        <h1>Student Dashboard</h1>
      </center>
      <!-- <hr> -->
      <br>
    <br>
      <div class="wrapper">
        <div data-aos-anchor="#midcont" data-aos-duration="1500" data-aos-easing="ease-in-quad" data-aos="flip-left" class="card">
          <h3 class="card-title">Home</h3>
          <br>
          <p class="card-content">A home page is a webpage that serves as the starting point of website.</p>
          <br>
          <a href="" class="card-btn">CLICK HERE</a>
        </div>
        <div data-aos-anchor="#midcont" data-aos-duration="1600" data-aos-easing="ease-in-quad" data-aos="flip-left" class="card">
          <h3 class="card-title">Previous Results</h3>
          <br>
          <p class="card-content">Here you can check your previos results</p>
          <br>
          <a href="preresults.php" class="card-btn">CLICK HERE</a>
        </div>
        <div data-aos-anchor="#midcont" data-aos-duration="1700" data-aos-easing="ease-in-quad" data-aos="flip-left" class="card">
          <h3 class="card-title">My Exams</h3>
          <br>
          <p class="card-content">Here your exam schedule. Click it and give your exam </p>
          <br>
          <a href="stuexamview.php" class="card-btn">CLICK HERE</a>
        </div>
        <div data-aos-anchor="#midcont" data-aos-duration="1700" data-aos-easing="ease-in-quad" data-aos="flip-left" class="card">
          <h3 class="card-title">Logout</h3>
          <br>
          <p class="card-content">If you are finished your exam then click below for logout</p>
          <br>
          <a href="logout.php" class="card-btn">CLICK HERE</a>
        </div>
      </div>
    </div>
  </div>
  <!-- <nav>
    <div class="menu-icon">
      <span class="fas fa-bars"></span>
    </div>
    <div class="logo-txt">
      <img src="../../Assets/lightbglogo.png" alt="">
      <h1>Wiscore</h1>
    </div>
   
    <div class="nav-items">
      <li><a href="">Home</a></li>
      <li><a href="preresults.php">Previous Results</a></li>
      <li><a href="stuexamview.php">My Exams</a></li>
      <li><a href="logout.php">Logout</a></li>

    </div>
   
    
  </nav> -->


  <!-- <div class="cent">
    <a href="examportal.php" class="anchor rounded outlined section-marker">
      <span class="item-sparkle-wrapper">
        <span class="item-sparkle"></span>
      </span>
      <span> Start Exam </span>
    </a>
  </div> -->
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = () => {
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = () => {
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = () => {
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
  </script>

</body>


</html>