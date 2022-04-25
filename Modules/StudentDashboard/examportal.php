<?php
session_start();

if(isset($_SESSION['sessnid'])==false){
  echo '<script type="text/JavaScript"> 
            window.location="index.php";
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
    <title>Document</title>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');
        
        *{
            margin: 0;
            padding: 0;
            font-family: 'Righteous', cursive;
        }
        .front{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: url("unbg.jpeg");
            display: flex;
            align-items: center;
            justify-content: center;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 1;
            
          

        }
        .frontinner{
            width: 100%;
            height: 100%;
            background: transparent;
            backdrop-filter: blur(50px);
            
            
        }
        .popup{
            height: 85%;
            width: 90%;
            border: 1px solid white;
            position: relative;
            top:50%;
            left: 50%;
            transform: translate(-50% ,-50%);
            border-radius: 15px;
            box-shadow: 0 0 1rem 0 rgba(0, 0,0, .2);
            overflow: hidden;



        }
        .popup::before{
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .3);
            backdrop-filter: blur(10px) saturate(100%) contrast(45%) brightness(130%) ;
            content: '';


        }
        .header{
             
            height: auto;
            width: 97%;
        
            font-size: 5em;
            text-align: center;
            letter-spacing: 10px;
            border-radius: 15px;
            box-shadow: 0 0 1rem 0 rgba(0, 0,0, .2);
            background: rgba(255, 255, 255, .3);
            backdrop-filter: blur(10px) saturate(100%) contrast(45%) brightness(130%) ;
            border: 1px solid white;
            margin: 20px auto auto auto;
            color: rgba(0, 0, 0, .7);
        


        }
        .rules {

          font-size: 2em;
          margin-top: 100px;
          margin-left: 50px;
          color: rgba(0, 0, 0, .7);
        }
    
        .letsgobtn{
            width: 95%;
            height: auto;
            font-size: 70px;
            position: absolute;
            bottom: 20px;
            left: 43px;
            color: rgba(0, 0, 0, .7);
            animation: scale 1s ease  infinite alternate-reverse ;
        }
        @keyframes scale { 
            from{
                transform: scale(1);


            }
            to{
                transform: scale(1.03);

            }
            
        }
        .middle{
            width: 100%;
            height: 100vh;
            background: url("unbg.jpeg");
            display: none;
            align-items: center;
            justify-content: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;

            

        }
        .middleinner{
            width: 100%;
            height: 100%;
            background: transparent;
            backdrop-filter: blur(50px);
        }
       .topic{

        height: 80%;
        width: 100%;
        display: flex;
        align-items: center;   
        justify-content: center;
        
    }
    #tpc{
        font-size: 1.8em;
        width: 90%;
        height: auto;
        background: transparent;

    }
    /* back css*/
     
    .back{
        width: 100%;
        height: 100vh;
        background: rgb(56, 48, 48);
        align-items: center;
        justify-content: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 3;




    }
    .backinner{
            width: 100%;
            height: 100%;
            background: #f4f4f4;
            backdrop-filter: blur(50px);

    }
    .backpopup{
        height: 95%;
        width: 97%;
        border: 1px solid white;
        position: relative;
        top:50%;
        left: 50%;
        transform: translate(-50% ,-50%);
        border-radius: 15px;
        box-shadow: 0 0 1rem 0 rgba(255, 255,255, .2);
        overflow: hidden;

    }
    .backpopup::before{
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, .3);
        backdrop-filter: blur(10px) saturate(100%) contrast(45%) brightness(130%) ;
        content: '';
    }
    .bar{
        width: 100%;
        height: 15px;
        background: rgb(255 180 127);
        margin: auto;
        position: absolute;
        top: 41px;
        left: 0;
        z-index: -1;
    }
    .questionbtns{
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .questionbtns button{
        height: 60px;
        width: 60px;
        padding: 5px;
        border-radius: 50%;
        font-size: 1.4em;
        border: none;
        outline: none;
        border: 1px solid black;
        transition: .5s ease;
        cursor: pointer;
    }
    .questionbtns button:hover{
        transform: scale(1.2) translateY(20px);
        transition: .5s ease;
        background: rgb(255 180 127);
    }
    .btttn{
        width: 100%;
        display: flex;
        justify-content: space-around;

    }
    .showquestion{
        height: auto;
        width: 100%;
        color: #000000;
        margin-top: 30px;
    } 
    .showquestion .quest{
        width: 100%;
        height: 100px;
        font-size: 2.5em;
        margin-left: 20px;


    }
    .showquestion .opts{
        width: 100%;
        height: auto;
        
        font-size: 1.5em;
       
        
    }
    .showquestion .opts input{
        width: 20px;
        height: 20px;
    }
    .showquestion .opts ul{
        margin-left: 50px;
        list-style: none;

    }
    .showquestion .opts ul li{
        line-height: 60px;
    }
    
    .btns{
        width: 100%;
        height: auto;
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: -220px;

    }
    .btns button{

        width: calc(100% / 6);
        height: 50px;
        font-size: 1.8em;
        border-radius: 24px;
        box-shadow: 0 0 1rem 0 rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, .3);
        backdrop-filter: blur(10px) saturate(100%) contrast(45%) brightness(130%) ;
        border: none;
        outline: none;
        transition: .7s ease;
        

    }
    .btns button:hover{

        background: black;
        color: #fff;
        transition: .7s ease;

    }
    .detail{
        height: 100px;
        width: 100%;
        color: #000000;
        position:absolute;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        
    }
    .detail h1{
         font-size: 3em;
         margin-left: 50px;
    }
    .detail .timer{
        font-size: 2em;
        margin-right: 50px;
    }
    #score{
            
        
        display: none;
        width: 500px;
        height: 200px;
        
        background-color: #fff;
        border-radius: 15px;

        
        border-radius: 5px;
        overflow: hidden;
        font-size: 1.8em;
        font-weight: 900;
        flex-direction: column;
        

    }
    .score .scorebar{
        width: 100%;
        height: 40px;
        background:rgb(255 180 127);
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
        
       

    }
    .score h1{
        margin-top: 50px;
        width: 100%;
        height: auto;
        text-align: center;
        
    }


    </style>
</head>
<body>
    <section class="back" id="back">
        <div class="backinner">
            <div class="backpopup">
                <div id="questionbtns" class="questionbtns">
                    <div class="bar"></div>
                    <div id="btttn" class="btttn">
                        <button value="1" class="x"  >Q.1</button>
                        <button value="2" class="x"  >Q.2</button>
                        <button value="3" class="x"  >Q.3</button>
                        <button value="4" class="x"  >Q.4</button>
                        <button value="5" class="x"  >Q.5</button>
                        <button value="6" class="x"  >Q.6</button>
                        <button value="7" class="x"  >Q.7</button>
                        <button value="8" class="x"  >Q.8</button>
                        <button value="9" class="x"  >Q.9</button>
                        <button value="10" class="x"  >Q.10</button>
                    </div>
                </div>
                
                   <div class="dyquestion" id="dyquestion" style="color:white;"></div>

                
               
                <div class="detail">
                    <h1 id="topc">Html </h1>
                    <div  class="timer">
                        <i class="far fa-clock"></i>
                        <span id="ten-countdown">10:00</span>

                    </div>
                </div>
                
            </div>
            <div class="row">
        <div class="btns">
                    <button id="btnpre">Previous</button>
                    <button id="sub">Submit</button>
                    <button id="btnnext" >Next</button>
                    <button id="finish" >Finish Exam</button>
                    <div id="score" class="score">
                        <div class="scorebar"></div>
                        <h1 id="scor"></h1>
                    </div>
                </div>
        </div>

        </div>

    </section> 
    <script>


        $(function(){

           let  qid=0;
           $("#finish").hide();
           $("#btnpre").show();
           $("#btnnext").show();
           $("#sub").show();
          

        
            $(".x").click(function(){

           

                let x=$(this).val();
                qid=x;
                
                $.post("question.php", {k:x},function(data){
                   
                    $(".dyquestion").html(data);
                });
            })

            // next button
            $("#btnnext").click(function(){
             
                qid++;
           if(qid<=10){
            $.post("question.php", {k:qid},function(data){
   
               $(".dyquestion").html(data);

                });
            }
             })
    
             //previous button

             $("#btnpre").click(function(){
             
             qid--;
            
        if(qid>=1){
         $.post("question.php", {k:qid},function(data){

            $(".dyquestion").html(data);

             });
         }
          })
              
          //submit

          $("body").on("click" , "#sub" ,function(){
              if(qid<=10){
                  if($("input[type='radio'].radioBtnClass").is(':checked')) {
                  var card_type = $("input[type='radio'].radioBtnClass:checked").val();
                    $.post("answer.php",{ans:card_type,k:qid},function(data){
                       return null;
                    });
                  }
              }else if(qid>10){
                  $("#finish").show();
                  $("#btnnext").hide();
                  $("#btnpre").hide();
                  $("#sub").hide();
              }
            qid++;
           if(qid<=10){
            $.post("question.php", {k:qid},function(data){
   
               $(".dyquestion").html(data);

                });
            }
          })
          $("#finish").click(function(){

            window.location="answercheck.php";
          })
        
           

        })
    </script>
</body>
</html>