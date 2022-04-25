<?php
session_start();
$sesnid=$_SESSION['sessnid'];





$qid=$_POST['k'];
     

     
  // $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
  $connect =mysqli_connect("localhost","root","","registration");

  $sql2="SELECT * FROM questiontab WHERE id= $qid";

    $rs=mysqli_query($connect,$sql2);

    if($row=mysqli_fetch_array($rs)){
     // echo '<script type="text/javascript">
     // window.location="dash.php";
     // </script>';

 

  }else{
      echo "error=".mysqli_error($connect);
  }

  mysqli_close($connect);





?>


<?php
     $ans=$_POST['ans'];
     $conn =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
     $sql3="INSERT INTO answer VALUES(
      NULL,'$qid','$ans','$sesnid'
    )";
    
    if(mysqli_query($conn,$sql3)){
        echo '<script type="text/JavaScript"> 
        var x = document.getElementById("snackbar1");
        var y = document.getElementById("addques");

        //Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        </script>'
   ;
    }else{
        echo "error=".mysqli_error($conn);
    }

    mysqli_close($conn);


     

     
  //$connect =mysqli_connect("localhost","root","","registration");

  //$sql2="SELECT * FROM questiontab WHERE id= $a";

    //$rs=mysqli_query($connect,$sql2);

    //if($row=mysqli_fetch_array($rs)){
     // echo '<script type="text/javascript">
     // window.location="dash.php";
     // </script>';

 

  //}else{
     // echo "error=".mysqli_error($connect);
 // }

 // mysqli_close($connect);
 ?>






