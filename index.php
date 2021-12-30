<?php
// Including Database Connection File
include 'db_conn.php';
session_start();
$conn = OpenCon();



// This function will return a random
// string of specified length
function random_strings($length_of_string)
{

    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(
        str_shuffle($str_result),
        0,
        $length_of_string
    );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;700;800;900&display=swap');

        * {
            padding: 0;
            margin: 0;
            font-family: "Raleway";
            box-sizing: border-box;
        }

        html {
            height: 100%;
            min-height: 720px;
        }

        body {
            width: 100%;
            height: 100%;
            min-height: 720px;
            /*background-color: skyblue;*/
            background-color: rgb(189, 189, 189);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: auto;
        }

        /* set to display block to understand what is going on  */
        input {
            display: none;
        }

        .container {
            width: 99%;
            height: 98%;
            background-color: whitesmoke;
            /*background-color: black;*/
            position: absolute;
            overflow: hidden;
            border-radius: 10px;
        }

        /* === Icons design === */
        .menu-items-container {
            position: absolute;
            background-color: rgb(48 50 58);
            top: 0;
            left: 0;
            height: 200%;
            width: 1500px;
            transform: translateX(-100%);
            transition: 0.3s ease-in-out;

        }

        .menu-items {
            /*background-color: green;*/
            position: absolute;
            right: clamp(110px, 5%, 120px);
            bottom: 50%;
            margin-right: -4rem;
        }

        .fa-home,
        .fa-users,
        .fa-user-shield {
            font-size: clamp(25px, 3.5vw, 30px);
            background-color: transparent;
        }


        .icon-div {
            height: 5rem;
            width: 5rem;
            display: grid;
            place-items: center;
            border-radius: 50%;
            border: 2px solid white;
            color: white;
            cursor: pointer;
        }

        .icon-tag {
            color: rgb(218, 218, 218);
            font-weight: 500;
        }

        .home-btn,
        .about-btn,
        .contact-btn {
            display: flex;
            flex-direction: row;
            align-items: center;
            column-gap: 15px;
            transform: rotateZ(30deg);
            margin-bottom: 30px;
            transition: transform 0.4s ease-in-out;
        }

        /* ====== Pages Settings ====== */
        .home-page,
        .about-page,
        .contact-page {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .home-page {
            width: 100%;
            height: 100%;
            background: whitesmoke;
            /*background-color: yellow;*/
            position: absolute;
            transform-origin: top left;
            transform: rotateZ(-30deg);
            transition: transform 0.4s ease-in-out;
            box-shadow: -5px 5px 35px rgb(161, 161, 161);
        }

        .about-page {
            width: 100%;
            height: 100%;
            background: whitesmoke;
            box-shadow: -5px 5px 35px rgb(161, 161, 161);
            /*background-color: green;*/
            position: absolute;
            transform-origin: top left;
            transform: rotateZ(-40deg);
            transition: transform 0.45s ease-in-out;
        }

        .about-page input {
            width: 100%;
            height: 30px;
            display: block;
            margin-bottom: 15px;
            border-radius: 2px;
            border: 1px solid #ffb47f;
        }

        .contact-page {
            width: 100%;
            height: 100%;
            background: whitesmoke;
            box-shadow: -5px 5px 35px rgb(161, 161, 161);
            /*background-color: orange;*/
            position: absolute;
            transform-origin: top left;
            transform: rotateZ(-50deg);
            transition: transform 0.5s ease-in-out;
        }

        .contact-page input {
            width: 100%;
            height: 30px;
            display: block;
            margin-bottom: 15px;
            border-radius: 2px;
            border: 1px solid #ffb47f;

        }

        /* ==== When Home btn is checked ==== */

        #home-btn:checked~* .home-page,
        #home-btn:checked~* .menu-items :is(.home-btn,
            .about-btn,
            .contact-btn) {
            transform: rotateZ(0);
        }

        #home-btn:checked~* .about-page {
            transform: rotateZ(-135deg);
        }

        #home-btn:checked~* .contact-page {
            transform: rotateZ(-135deg);
        }

        /* When About page is selected */
        #student-btn:checked~* .home-page,
        #student-btn:checked~* .menu-items :is(.home-btn,
            .about-btn,
            .contact-btn),
        #student-btn:checked~* .about-page {
            transform: rotateZ(0);
        }


        #student-btn:checked~* .contact-page {
            transform: rotateZ(-135deg);
        }


        /* When Contact page is selected */
        #faculty-btn:checked~* .home-page,
        #faculty-btn:checked~* .menu-items :is(.home-btn,
            .about-btn,
            .contact-btn),
        #faculty-btn:checked~* .about-page,
        #faculty-btn:checked~* .contact-page {
            transform: rotateZ(0);
        }


        /* ========= Top Menu button ========= */
        .menu-btn-container {
            width: clamp(150px, 45vw, 220px);
            height: clamp(150px, 45vw, 220px);
            top: 0;
            left: 0;
            position: absolute;
            background-color: rgb(255 180 127);
            border-radius: 50%;
            z-index: 6;
            transform: translate(-50%, -50%) rotateZ(-90deg);
            transition: transform 0.5s cubic-bezier(0.42, 0, 0.46, 1.52);
        }

        .menu-btn-container .menu-btn {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            font-size: 4rem;
            transition: transform 0.5s cubic-bezier(0.42, 0, 0.46, 1.52);
            background-color: transparent;
        }

        .menu-btn-container .menu-btn label {
            position: absolute;
            cursor: pointer;
            /* background-color: royalblue; */
            width: auto;
            height: auto;
        }


        /* .menu-btn-container .home-menu-btn {
            background-color: palegreen;
        } */

        /* .menu-btn-container .about-menu-btn {
            background-color: peachpuff;
        } */

        /* .menu-btn-container .contact-menu-btn {
            background-color: indigo;
        } */

        .menu-btn label {
            position: absolute;
            color: white;
            bottom: 0;
            right: 0;
            width: 25%;
            height: 25%;
            /*background-color: orangered;*/
            margin: 0 2.5rem 2.5rem 0;
            font-size: clamp(20px, 5vw, 32px);
        }

        .menu-btn label img {
            width: 50px;
            height: 50px;
        }

        /* Each individual class has an assigned menu icon therefore when the icon
i.e home is clicked the menu icon respective to the selected icon 
would be placed ahead of the other menu icons with*/
        #home-btn:checked~* .home-menu-btn,
        #faculty-btn:checked~* .contact-menu-btn,
        #student-btn:checked~* .about-menu-btn {
            z-index: 5;
        }

        /* Rotates the container back to its original position */
        #home-btn:checked~* .menu-btn-container,
        #faculty-btn:checked~* .menu-btn-container,
        #student-btn:checked~* .menu-btn-container {
            transform: translate(-50%, -50%) rotateZ(0deg);
        }

        .text-container {
            /*background-color: greenyellow;*/
            width: 75%;
            height: 80%;
            /* border: 1px solid black; */
            max-width: 1500px;
            overflow: auto;

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
        }

        .card-btn {
            all: unset;
            display: inline-block;
            margin-left: auto;
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


        .stu-signup {
            width: 100%;
        }

        .faculty-signup {
            width: 100%;
        }

        .stu-signup span {
            font-weight: 500;
        }

        .faculty-signup span {
            font-weight: 500;
        }

        .stu-signup select {
            width: 100%;
            height: 30px;
            border: 1px solid #ffb47f;
            margin-bottom: 15px;
        }

        .faculty-signup select {
            width: 100%;
            height: 30px;
            border: 1px solid #ffb47f;
            margin-bottom: 15px;
        }

        .stu-signup #stu-reg {
            background: #ffb47f;
            color: #FFF;
            transition: 0.5s;
        }

        .faculty-signup #fac-reg {
            background: #ffb47f;
            color: #FFF;
            transition: 0.5s;
        }

        .stu-signup #stu-reg:hover {
            background: #FFF;
            color: #ffb47f;
            transition: 0.5s;
        }

        .faculty-signup #fac-reg:hover {
            background: #FFF;
            color: #ffb47f;
            transition: 0.5s;
        }

        .stu-signup .alhaa {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .faculty-signup .alhaa {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;

        }

        .stu-signup .alhaa .already {
            color: black;
        }

        .faculty-signup .alhaa .already {
            color: black;

        }

        .stu-signup .alhaa #gotosignin {
            background: none;
            border: none;
            color: #ffb47f;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.5s;

        }

        .faculty-signup .alhaa #gotofacsignin {
            background: none;
            border: none;
            color: #ffb47f;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.5s;

        }

        .stu-signup .alhaa #gotosignin:hover {
            color: black;
            transition: 0.5s;
        }

        .faculty-signup .alhaa #gotofacsignin:hover {
            color: black;
            transition: 0.5s;

        }

        .about-page .modal {
            width: 65%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ebebeb;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #8080806b;
            box-shadow: 5px 5px 28px #80808059;
        }

        .contact-page .modal {
            width: 65%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ebebeb;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #8080806b;
            box-shadow: 5px 5px 28px #80808059;

        }

        .modal .imgcontainer {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .imgcontainer img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .modal button {
            width: 100%;
            height: 30px;
            border: 1px solid #ffb47f;
            background: #ffb47f;
            color: white;
            margin-bottom: 15px;
            transition: 0.5s;
            cursor: pointer;

        }

        .modal button:hover {
            background: #FFF;
            color: #ffb47f;
            transition: 0.5s;

        }

        .modal .btns-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .contact-page #admin-loginbtn {
            position: absolute;
            top: -98px;
            background: #ffb47f;
            outline: none;
            right: -99px;
            width: clamp(150px, 45vw, 200px);
            height:  clamp(150px, 45vw, 200px);
            border-radius: 50%;
            border: none;
            transition: 0.5s;

        }

        .contact-page #admin-loginbtn:hover {
            transform: translate(-10px, 10px);
            transition: 0.5s;
        }

        #admin-loginbtn i {
            position: relative;
            top: 47px;
            left: -50px;
            font-weight: 900;
            font-size: clamp(20px, 5vw, 32px);
            color: white;
        }
    </style>
    <title>Icons</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <title>Navbar</title>
    </head>

    <body>
        <input type="checkbox" id="home-btn" checked>
        <input type="checkbox" id="student-btn">
        <input type="checkbox" id="faculty-btn">
        <div class="container">

            <section class="home-page">
                <div class="menu-items-container">
                    <div class="menu-items">
                        <div class="home-btn">
                            <label for="home-btn" class="icon-div home-icon-div"><i class="fas fa-home"></i></label>

                            <h4 class="icon-tag">Home</h4>
                        </div>

                        <div class="about-btn">
                            <label for="student-btn" class="icon-div about-icon-div"><i class="fas fa-users"></i></label>
                            <h4 class="icon-tag">Student</h4>
                        </div>
                        <div class="contact-btn">
                            <label for="faculty-btn" class="icon-div contact-icon-div"><i class="fas fa-user-shield"></i></label>
                            <h4 class="icon-tag">Faculty</h4>
                        </div>
                    </div>
                </div>

                <!-- Home Page -->
                <!-- *************** -->
                <div class="text-container home-page-text">
                    <div data-aos-duration="600" data-aos-easing="ease-in-quad" data-aos="fade-up" class="logo-txt">
                        <img src="Assets/lightbglogo.png" alt="">
                        <h1>Wiscore</h1>
                    </div>
                    <hr size="2px" color="rgb(255 180 127)">
                    <br>

                    <h2 data-aos-duration="1000" data-aos-easing="ease-in-quad" data-aos="fade-up">A Complete Online Exam Solution</h2>
                    <br>
                    <p data-aos-duration="1000" data-aos-easing="ease-in-quad" data-aos="fade-up">Wiscore is an online examination system that allows teachers, educators, and test managers from any background to create tests that work on any smart device. This means that students and test-takers won’t have to worry about finding a laptop or a desktop to use. Their tablets and their smartphones would work just the same.</p>

                    <!-- Mid Content -->
                    <!-- ****** -->
                    <br>
                    <br>
                    <br>
                    <br>

                    <div id="midcont" class="midcont">
                        <center>
                            <h1>Features Of Wiscore</h1>
                        </center>
                        <hr>
                        <div class="wrapper">
                            <div data-aos-anchor="#midcont" data-aos-duration="1500" data-aos-easing="ease-in-quad" data-aos="flip-left" class="card">
                                <h3 class="card-title">Test Management</h3>
                                <br>
                                <p class="card-content">How many questions per page should the test have? Would you allow test takers to go back to previous questions?...</p>
                                <br>
                                <a href="./Modules/AboutPage/about.php" class="card-btn">READ MORE</a>
                            </div>
                            <div data-aos-anchor="#midcont" data-aos-duration="1600" data-aos-easing="ease-in-quad" data-aos="flip-left" class="card">
                                <h3 class="card-title">Test Authoring</h3>
                                <br>
                                <p class="card-content">Online tests can come in different forms. You can administer multiple-choice, enumeration, true or false, essay, matching, and other types of online tests...</p>
                                <br>
                                <a href="./Modules/AboutPage/about.php" class="card-btn">READ MORE</a>
                            </div>
                            <div data-aos-anchor="#midcont" data-aos-duration="1700" data-aos-easing="ease-in-quad" data-aos="flip-left" class="card">
                                <h3 class="card-title">User Management</h3>
                                <br>
                                <p class="card-content">User profiles offer bits of information that can help students and teachers. This is why user management is a basic online exam portal feature...</p>
                                <br>
                                <a href="./Modules/AboutPage/about.php" class="card-btn">READ MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- Student's Page -->
            <!-- ***************** -->

            <section class="about-page">
                <div class="text-container about-page-text">
                    <div data-aos-duration="600" data-aos-easing="ease-in-quad" data-aos="fade-up" class="logo-txt">
                        <img src="Assets/lightbglogo.png" alt="">
                        <h1>Wiscore</h1>
                    </div>
                    <hr size="2px" color="rgb(255 180 127)">
                    <br>
                    <br>
                    <div class="stu-signup">
                        <div class="stu-container">
                            <div class="title">
                                <h1>Student Registration</h1>
                            </div>
                            <br>
                            <div class="content">
                                <form action="Controllers/register.php" method="POST">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details">First Name</span>
                                            <input name="firstname" type="text" placeholder="Enter your firstname" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Last Name</span>
                                            <input name="lastname" type="text" placeholder="Enter your lastname" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Branch</span>
                                            <br>
                                            <select name="branch">
                                                <option>IT</option>
                                                <option>CSE</option>
                                            </select>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Semester</span>
                                            <br>
                                            <select name="sem">
                                                <option>1<sup>st</sup> Semester</option>
                                                <option>2<sup>nd</sup>Semester</option>
                                                <option>3<sup>rd</sup>Semester</option>
                                                <option>4<sup>th</sup>Semester</option>
                                                <option>5<sup>th</sup>Semester</option>
                                                <option>6<sup>th</sup>Semester</option>
                                                <option>7<sup>th</sup>Semester</option>
                                                <option>8<sup>th</sup>Semester</option>
                                            </select>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Phone Number</span>
                                            <input name="mobileno" type="text" placeholder="Enter your Mobile No." required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Password</span>
                                            <input name="password" type="password" placeholder="Enter your password" required>
                                        </div>
                                    </div>

                                    <div class="button">
                                        <input id="stu-reg" type="submit" value="Register">
                                    </div>
                                </form>
                                <div class="alhaa">
                                    <span class="already">Already Have An Account ?</span>
                                    <button id="gotosignin">Sign In</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Student Login Modal -->
                <!-- *************** -->

                <div id="id02" class="modal">

                    <form class="modal-content animate" method="post">
                        <div class="imgcontainer">
                            <img src="Assets/lightbglogo.png" alt="Avatar" class="avatar">
                            <h1>Wiscore</h1>
                        </div>
                        <br>
                        <h1>Student Sign In</h1>
                        <br>

                        <div class="modal-container">
                            <label for="suname"><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="suname" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="spass" required>

                            <button type="submit">Student Login</button>
                        </div>

                        <div class="btns-container">
                            <button type="button" onclick="$('#id02').slideUp(800,()=>{$('.about-page-text').show();})" class="cancelbtn">Cancel</button>
                            <span class="psw">Don't have an account? <a id="stu-btn" class="sgnin" href="index.php">Sign Up</a></span>
                        </div>
                    </form>
                </div>
            </section>


            <!-- faculty's Page -->
            <!-- *********** -->


            <section class="contact-page">
                <button title="Admin Login" id="admin-loginbtn"><i class="fas fa-shield-alt"></i></button>
                <div class="text-container contact-page-text">
                    <div data-aos-duration="600" data-aos-easing="ease-in-quad" data-aos="fade-up" class="logo-txt">
                        <img src="Assets/lightbglogo.png" alt="">
                        <h1>Wiscore</h1>
                    </div>
                    <hr size="2px" color="rgb(255 180 127)">
                    <br>
                    <br>

                    <div class="faculty-signup">
                        <div class="container2">
                            <div class="title">
                                <h1>Faculty Registration</h1>
                            </div>
                            <br>
                            <div class="content">
                                <form action="Controllers/facultyreg.php" method="POST">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details">First Name</span>
                                            <input name="firstname" type="text" placeholder="Enter your firstname" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Last Name</span>
                                            <input name="lastname" type="text" placeholder="Enter your lastname" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Phone Number</span>
                                            <input name="mobileno" type="text" placeholder="Enter your password" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Password</span>
                                            <input name="password" type="password" placeholder="Enter your password" required>
                                        </div>
                                    </div>

                                    <div class="button">
                                        <input id="fac-reg" type="submit" value="Register">
                                    </div>
                                </form>
                                <div class="alhaa">
                                    <span class="already">Already Have An Account ?</span>
                                    <button id="gotofacsignin">Sign In</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Faculty Login Modal -->
                <!-- ************** -->

                <div id="id03" class="modal">

                    <form class="modal-content animate" method="post">
                        <div class="imgcontainer">
                            <img src="Assets/lightbglogo.png" alt="Avatar" class="avatar">
                            <h1>Wiscore</h1>
                        </div>
                        <br>
                        <h1>Faculty Sign In</h1>
                        <br>

                        <div class="modal-container">
                            <label for="suname"><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="funame" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="fpsw" required>

                            <button type="submit">Faculty Login</button>
                        </div>

                        <div class="btns-container" style="background-color:#f1f1f1">
                            <button type="button" onclick="$('#id03').slideUp(800,()=>{$('.contact-page-text').show();})" class="cancelbtn">Cancel</button>
                            <span class="psw">Don't have an account? <a id="fac-btn" class="sgnin" href="index.php">Sign Up</a></span>
                        </div>
                    </form>
                </div>

                <!-- Admin Login Modal -->
                <!-- ************* -->

                <div id="id01" class="modal">

                    <form class="modal-content animate" method="post">
                        <div class="imgcontainer">
                            <img src="Assets/lightbglogo.png" alt="Avatar" class="avatar">
                            <h1>Wiscore</h1>
                        </div>
                        <br>
                        <h1>Admin Sign In</h1>
                        <br>

                        <div class="modal-container">
                            <label for="suname"><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="aduname" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="adpsw" required>

                            <button type="submit">Faculty Login</button>
                        </div>

                        <div class="btns-container" style="background-color:#f1f1f1">
                            <button type="button" onclick="$('#id01').slideUp(800,()=>{$('.contact-page-text').show();})" class="cancelbtn">Cancel</button>
                            <span class="psw">Don't have an account? <a id="fac-btn" class="sgnin" href="index.php">Sign Up</a></span>
                        </div>
                    </form>
                </div>
            </section>

            <div class="menu-btn-container">
                <div class="home-menu-btn menu-btn">
                    <label for="home-btn">
                        <i class="fas fa-bars"></i>
                        <!-- <img src="Assets/lightbglogo.png" alt=""> -->
                    </label>
                </div>

                <div class="about-menu-btn menu-btn">
                    <label for="student-btn">
                        <i class="fas fa-bars"></i>
                        <!-- <img src="Assets/lightbglogo.png" alt=""> -->
                    </label>
                </div>

                <div class="contact-menu-btn menu-btn">
                    <label for="faculty-btn">
                        <i class="fas fa-bars"></i>
                        <!-- <img src="Assets/lightbglogo.png" alt=""> -->
                    </label>
                </div>
            </div>
        </div>


        <script src="jquery-3.6.0.js"></script>
        <script>
            // When Sign In Button Is Clicked
            $(document).ready(() => {
                $("#id02").hide();
                $("#id03").hide();
                $("#id01").hide();
                $("#gotosignin").click(() => {
                    $("#id02").slideDown(800);
                    $(".about-page-text").hide();
                })
                $("#gotofacsignin").click(() => {
                    $("#id03").slideDown(800);
                    $(".contact-page-text").hide();
                })
                $("#admin-loginbtn").click(() => {
                    $("#id01").slideDown(800);
                    $("#id03").hide();
                    $(".contact-page-text").hide();
                })

            })
            // // Get the modal
            // var modal = document.getElementById('id02');

            // // When the user clicks anywhere outside of the modal, close it
            // window.onclick = function(event) {
            //     if (event.target !== modal) {
            //         modal.hide()
            //     }
            // }
        </script>

        <script type="text/javascript">
            /**
             * Variables
             */
            const signupButton = document.getElementById('signup-button'),
                loginButton = document.getElementById('login-button'),
                userForms = document.getElementById('user_options-forms')

            /**
             * Add event listener to the "Sign Up" button
             */
            signupButton.addEventListener('click', () => {
                userForms.classList.remove('bounceRight')
                userForms.classList.add('bounceLeft')
            }, false)

            /**
             * Add event listener to the "Login" button
             */
            loginButton.addEventListener('click', () => {
                userForms.classList.remove('bounceLeft')
                userForms.classList.add('bounceRight')
            }, false)
        </script>

    </body>


    </html>



    <!-- PHP SCRIPTING -->
    <!-- ***************************************************************************************** -->
    

    <!-- Admin Login Script -->
    <!-- ************* -->


    <?php


    if (isset($_POST['aduname'])) {
        // $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
        $connect = mysqli_connect("localhost", "root", "", "registration");
        $usernm = $_POST['aduname'];
        $passwrd = $_POST['adpsw'];

        $sql2 = "SELECT * FROM adminregist WHERE
        mobileno='$usernm' and passwrd='$passwrd'";

        echo $rs = mysqli_query($connect, $sql2);

        if ($row = mysqli_fetch_array($rs)) {



            echo '<script type="text/javascript">

         
               window.location="Modules/AdminDashboard/dash.php";

           </script>';
            $_SESSION['user'] = $usernm;
        } else {
        }

        mysqli_close($connect);
    }
    ?>

    <!-- Student Login Code -->
    <?php


    if (isset($_POST['suname'])) {
        // $conn =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
        $conn = mysqli_connect("localhost", "root", "", "registration");
        $stuusrname = $_POST['suname'];

        $stupass = $_POST['spass'];

        $sql1 = "SELECT * FROM regist WHERE
    mobileno='$stuusrname' and passwrd='$stupass'";



        $rs = mysqli_query($conn, $sql1);



        if ($row = mysqli_fetch_array($rs)) {
            $branch = $row['branch'];
            $sem = $row['semester'];

            $_SESSION['branch'] = $branch;
            $_SESSION['sem'] = $sem;

            $_SESSION['suser'] = $stuusrname;
            $token = random_strings(12);
            $_SESSION['usertoken'] = $token;

            //session ka kaam
            $sessn = "INSERT INTO sessntab VALUES(
        NULL,'$stuusrname','$token'
      )";
            $rssessn = mysqli_query($conn, $sessn);
            if ($rssessn) {
                $sql3 = "SELECT MAX(idd) FROM sessntab ";
                $rs3 = mysqli_query($conn, $sql3);
                if ($row3 = mysqli_fetch_array($rs3)) {



                    $_SESSION['sessnid'] = $row3[0];

                    echo '<script type="text/javascript">
          window.location="Modules/StudentDashboard/test.php";
           </script>';
                }
            }else{
                echo '<script type="text/javascript">
                window.location="Modules/FacultyDashboard/facdash.php";
                 </script>';
            }
        } else {
           
        }

        mysqli_close($conn);
    }
    ?>




    <!-- Faculty Login Code -->

    <?php


    if (isset($_POST['funame'])) {
        // $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
        $connect = mysqli_connect("localhost", "root", "", "registration");
        $usernm = $_POST['funame'];
        $passwrd = $_POST['fpsw'];

        $sql2 = "SELECT * FROM facultyregist WHERE
        mobileno='$usernm' and passwrd='$passwrd'";

        $rs = mysqli_query($connect, $sql2);

        if ($row = mysqli_fetch_array($rs)) {
            $facfirname = $row['firstname'];
            $faclasname = $row['lastname'];

            $_SESSION['facfirname'] = $facfirname;
            $_SESSION['faclasname'] = $faclasname;

            echo '<script type="text/javascript">
          window.location="Modules/FacultyDashboard/facdash.php";
          </script>';
            $_SESSION['user'] = $usernm;
        } else {
        }

        mysqli_close($connect);
    }
    ?>