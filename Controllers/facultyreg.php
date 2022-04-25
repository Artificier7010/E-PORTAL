<?php 

session_start();  

?>


<?php
    // $conn =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
    $conn =mysqli_connect("localhost","root","","registration");
    
    if($conn === false){
        die("error could not connect".mysqli_connect_error());
    }


    $ffnm=$_POST['firstname'];
    $flnm=$_POST['lastname'];
    $fmn=$_POST['mobileno'];
    $fpass=$_POST['password'];
   

    $sql="INSERT INTO facultyregist VALUES(
      NULL,'$ffnm','$flnm','$fmn','$fpass'
    )";

    if(mysqli_query($conn,$sql)){
        echo '<script type="text/javascript">
        confirm("Do you want to register for exam ?");
        window.location="../index.php"
        </script>';
    }else{
        echo "error=".mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>
    
