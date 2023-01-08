<span>Halan sozlerim*</span>
<div class="esasyUlanylyanSozler">
<?php 

$connect = mysqli_connect('localhost','root','','oguzhan');
          $query1 = "SELECT * FROM vocabulary_like where user_id = $id_user order by id desc";
          $result1 = mysqli_query($connect,$query1);
          $row1 = mysqli_num_rows($result1);


          $query2 = "SELECT * FROM vocabulary";
          $result2 = mysqli_query($connect,$query2);
          $row2 = mysqli_fetch_assoc($result2);
          if($row1>0){
               while($row1 = mysqli_fetch_assoc($result1)){
                    $vocab_id = $row1['vocabulary_id'];
                    $query2 = "SELECT * FROM vocabulary where id = $vocab_id";
                    $result2 = mysqli_query($connect,$query2);
                    $row2 = mysqli_fetch_assoc($result2);
                        $engl = $row2['english'];
                        $tkm = $row2['turkmen'];
                        $def = $row2['definition']; ?>

                <center>
                 <div class="EsasySoz">
                      <div class="soz"><?php echo $engl; ?></div>
                      <div class="soz"><?php echo $tkm; ?></div>
                      <div class="def"><?php echo $def; ?></div>
                 </div> 
                 </center>



                 <?php     }   } else { ?>



            
            <center>
            <div class="EsasySoz">
               <br>
                 <div class="def">
                     siziň öwrenmek üçin haladym düwmesine basan sözleriňiz bu ýerde peýda bolar.
                 </div>
                 
            </div> 
            </center>           
       <?php } ?>

        </div>