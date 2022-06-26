
<?php
    // $conn =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
    $conn =mysqli_connect("localhost","root","","registration");
    
    if($conn === false){
        die("error could not connect".mysqli_connect_error());
    }


    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $mobileno=$_POST['mobileno'];
    $password=$_POST['password'];
    $branch = filter_input(INPUT_POST, 'branch', FILTER_SANITIZE_STRING);
    $sem = filter_input(INPUT_POST, 'sem', FILTER_SANITIZE_STRING);

    echo $sql="INSERT INTO regist VALUES(
       NULL ,'$firstname','$lastname','$branch','$sem','$mobileno','$password'
    )";

    if(mysqli_query($conn,$sql)){
      echo '<script type="text/javascript">
      confirm("Do you want to register for exam ?");
      window.location.href="../index.php"
      </script>';
    // echo '<script type="text/javascript">
    //   alert("worked");
    //   </script>';
    }else{
        echo "error=".mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>
    
