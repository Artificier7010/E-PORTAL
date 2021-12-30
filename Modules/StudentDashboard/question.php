<?php
session_start();
     $a= $_POST['k'];
     $sessnid=$_SESSION['sessnid'];
     

     
//   $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
  $connect =mysqli_connect("localhost","root","","registration");
   $sql="SELECT * FROM answer WHERE answer.qid=$a and answer.testid=$sessnid";
  $rs1=mysqli_query($connect,$sql);
  if($row1=mysqli_fetch_array($rs1)){
       $userans=$row1['userans'];
       echo "<script type='text/javascript'>

       </script>";

     $sql2="SELECT * FROM questiontab WHERE questiontab.id= $a";

    $rs=mysqli_query($connect,$sql2);
    if($row=mysqli_fetch_array($rs)){
        if($row['opt1']==$userans){
           
            echo 
            
            "           <div class=cont>
            <div class=row>
                <div class=question>
    
                </div>
            </div>
            <div class=row>
            <div id=showquestion class=showquestion>
                            <div id=question  class=quest >$row[question]</div>
                            <div id=opts class=opts>
                                <ul>
                                    <li> 
                                    <input  checked=checked id=opt1 value='$row[opt1]' class=radioBtnClass type=radio name=opt>
                                    <label id=ans1  for=opt1>$row[opt1]</label>
                                    </li>
                                    <li> 
                                        <input id=opt2 value='$row[opt2]' class=radioBtnClass type=radio name=opt>
                                        <label id=ans2  for=opt2>$row[opt2]</label>
                                    </li>
                                    <li>
                                        <input id=opt3 value='$row[opt3]' class=radioBtnClass type=radio name=opt>
                                        <label id=ans3  for=opt3>$row[opt3]</label>
                                    </li>
                                    <li>
                                        <input id=opt4 value='$row[opt4]'  class=radioBtnClass type=radio name=opt>
                                        <label id=ans4  for=opt4>$row[opt4]</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
            </div>
            
        </div>
               ";
            

        }
        if($row['opt2']==$userans){
            echo 
            
            "           <div class=cont>
            <div class=row>
                <div class=question>
    
                </div>
            </div>
            <div class=row>
            <div id=showquestion class=showquestion>
                            <div id=question  class=quest >$row[question]</div>
                            <div id=opts class=opts>
                                <ul>
                                    <li> 
                                    <input  id=opt1 value='$row[opt1]' class=radioBtnClass type=radio name=opt>
                                    <label id=ans1  for=opt1>$row[opt1]</label>
                                    </li>
                                    <li> 
                                        <input checked='checked'  id=opt2 value='$row[opt2]'class=radioBtnClass type=radio name=opt>
                                        <label id=ans2  for=opt2>$row[opt2]</label>
                                    </li>
                                    <li>
                                        <input id=opt3 value='$row[opt3]' class=radioBtnClass type=radio name=opt>
                                        <label id=ans3  for=opt3>$row[opt3]</label>
                                    </li>
                                    <li>
                                        <input id=opt4 value='$row[opt4]'  class=radioBtnClass type=radio name=opt>
                                        <label id=ans4  for=opt4>$row[opt4]</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
            </div>
            
        </div>
               ";
            
        }
        if($row['opt3']==$userans){
            echo 
            
            "           <div class=cont>
            <div class=row>
                <div class=question>
    
                </div>
            </div>
            <div class=row>
            <div id=showquestion class=showquestion>
                            <div id=question  class=quest >$row[question]</div>
                            <div id=opts class=opts>
                                <ul>
                                    <li> 
                                    <input   id=opt1 value='$row[opt1]' class=radioBtnClass type=radio name=opt>
                                    <label id=ans1  for=opt1>$row[opt1]</label>
                                    </li>
                                    <li> 
                                        <input id=opt2 value='$row[opt2]' class=radioBtnClass type=radio name=opt>
                                        <label id=ans2  for=opt2>$row[opt2]</label>
                                    </li>
                                    <li>
                                        <input checked='checked'  id=opt3 value='$row[opt3]' class=radioBtnClass type=radio name=opt>
                                        <label id=ans3  for=opt3>$row[opt3]</label>
                                    </li>
                                    <li>
                                        <input id=opt4 value='$row[opt4]'class=radioBtnClass type=radio name=opt>
                                        <label id=ans4  for=opt4>$row[opt4]</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
            </div>
            
        </div>
               ";
            
        }
        if($row['opt4']==$userans){
           echo 
            
            "           <div class=cont>
            <div class=row>
                <div class=question>
    
                </div>
            </div>
            <div class=row>
            <div id=showquestion class=showquestion>
                            <div id=question  class=quest >$row[question]</div>
                            <div id=opts class=opts>
                                <ul>
                                    <li> 
                                    <input    id=opt1 value='$row[opt1]'class=radioBtnClass type=radio name=opt>
                                    <label id=ans1  for=opt1>$row[opt1]</label>
                                    </li>
                                    <li> 
                                        <input id=opt2 value='$row[opt2]' class=radioBtnClass type=radio name=opt>
                                        <label id=ans2  for=opt2>$row[opt2]</label>
                                    </li>
                                    <li>
                                        <input id=opt3 value='$row[opt3]' class=radioBtnClass type=radio name=opt>
                                        <label id=ans3  for=opt3>$row[opt3]</label>
                                    </li>
                                    <li>
                                        <input  checked='checked' id=opt4 value='$row[opt4]'  class=radioBtnClass type=radio name=opt>
                                        <label id=ans4  for=opt4>$row[opt4]</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
            </div>
            
        </div>
               ";
            

        }
    }


      




  }else{
    $sql3="SELECT * FROM questiontab WHERE id= $a";
    $rs3=mysqli_query($connect,$sql3);

    if($row3=mysqli_fetch_array($rs3)){
        echo 
            
            "           <div class=cont>
            <div class=row>
                <div class=question>
    
                </div>
            </div>
            <div class=row>
            <div id=showquestion class=showquestion>
                            <div id=question  class=quest >$row3[question]</div>
                            <div id=opts class=opts>
                                <ul>
                                    <li> 
                                    <input id=opt1 value='$row3[opt1]' class=radioBtnClass type=radio name=opt>
                                    <label id=ans1  for=opt1>$row3[opt1]</label>
                                    </li>
                                    <li> 
                                        <input id=opt2 value='$row3[opt2]' class=radioBtnClass type=radio name=opt>
                                        <label id=ans2  for=opt2>$row3[opt2]</label>
                                    </li>
                                    <li>
                                        <input id=opt3 value='$row3[opt3]'class=radioBtnClass type=radio name=opt>
                                        <label id=ans3  for=opt3>$row3[opt3]</label>
                                    </li>
                                    <li>
                                        <input id=opt4 value='$row3[opt4]'class=radioBtnClass type=radio name=opt>
                                        <label id=ans4  for=opt4>$row3[opt4]</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
            </div>
            
        </div>
               ";
     

 

  }else{
      echo "error=".mysqli_error($connect);

  }
      

  }

  

  mysqli_close($connect);

?>
