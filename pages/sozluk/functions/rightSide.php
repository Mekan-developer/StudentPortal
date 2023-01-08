<!-- SOZ  girizyan yerin start -->
        <form autocomplete="off" method="post" action="indexEN.php?style=soz_gos">
           <?php 
             $eng="";
             $tkm="";
             $defn = "";
             $subm = "";
             if(isset($_GET['geted'])){
                $id = $_GET['id'];
                $eng = $_GET['en'];
                $tkm = $_GET['tm'];
                $defn = $_GET['def'];
                $subm = "update";
                ?>
            <div class="icons"><img class="Flag" src="icons/en.png"><input type="text" name="EN" placeholder="In english:" value="<?php echo $eng;?>"></div>
            <div class="icons"><img class="Flag" src="icons/tm.png"><input type="text" name="TM" placeholder="Türkmençesi:" value="<?php echo $tkm;?>"></div>
            <textarea name="def" placeholder="Açyklamasyny giriziň!"><?php echo $defn;?></textarea>
            <input style="display: none" type="text" name="id" value="<?php echo $id;?>">
            <input type='submit' name="<?php echo $subm; ?>"   value='söz goş'>

        <?php }else{ ?>
            
            <div class="icons"><img class="Flag" src="icons/en.png"><input type="text" name="EN" placeholder="In english:"></div>
            <div class="icons"><img class="Flag" src="icons/tm.png"><input type="text" name="TM" placeholder="Türkmençesi:"></div>
            <textarea name="def"  placeholder="Açyklamasyny giriziň!" ></textarea>
            <input type='submit' name='VocSubmit'   value='söz goş'>

           <?php } ?>
        </form>
        <!-- SOZ girizyan yerin end -->

        <?php

        if(isset($_POST['VocSubmit'])){
            if($topary>100){
            $tm = $_POST['TM'];
            $en = $_POST['EN'];
            $def = $_POST['def'];
            if(!empty($tm) && !empty($en) && $tm != " " && $en != " " && $tm != "  " && $en != "  "){
                $connect = mysqli_connect('localhost','root','','oguzhan');
               $query = "INSERT INTO vocabulary(english,turkmen,definition,degisli_fakulteti,soz_gosanyn_topary,soz_gosan_id) VALUES ('$en','$tm','$def','$user_fakulteti',$topary,$id_user)";
               mysqli_query($connect,$query);
               header("Location:indexEN.php?style=soz_gos");
                }
            }else{
                  echo "<script>alert('Siz saýtymyza intek doly kabul edilmedik!')</script>";
            }
        }else if(isset($_POST['update'])){
            $id = $_POST['id'];
            $en = $_POST['EN'];
            $tm = $_POST['TM'];
            $def = $_POST['def'];
            if(!empty($tm) && !empty($en) && $tm !=" " && $en !=" " && $tm !="  " && $en !="  "){
                $connect = mysqli_connect('localhost','root','','oguzhan');
                $query = "UPDATE vocabulary SET english = '$en', turkmen = '$tm', definition = '$def' where id=$id";
               mysqli_query($connect,$query);
                }
                header("Location:indexEN.php?style=soz_gos");
        }
        ?>
        <span class="span">tassyklanmadyk sözleriň*</span>
        <div class="tassyklanmadyklaryn">
            <?php 

               $query = "SELECT * FROM vocabulary where tassyklananmy != 'howwa' and soz_gosan_id = $id_user order by id desc"; 
               $result = mysqli_query($connect,$query);
               $num = mysqli_num_rows($result);
               if($num>0){
                   while($row = mysqli_fetch_assoc($result)){
                         $idVoc = $row['id'];
                         $en = $row['english'];
                         $tm = $row['turkmen'];
                         $def = $row['definition'];

                  ?>
               
            <center>
                <div class="TassyklanmadykSoz">
                     <div class="soz"><?php echo $en; ?></div>
                     <div class="soz"><?php echo $tm; ?></div>
                     <div class="def"><?php echo $def; ?></div>
                </div> 
            </center>
            <div class="linkIcon">
                     <a href="indexEN.php?geted=update&tm=<?php echo $tm; ?>&en=<?php echo $en; ?>&def=<?php echo $def; ?>&id=<?php echo $idVoc; ?>&style=soz_gos"><img src="icons/change.png"></a>
                     <a href="functions/function.php?get=delete&page=en&id=<?php echo $idVoc; ?>&style=soz_gos"><img src="icons/delete.png"></a>
            </div>
            <?php }  } else { ?>

            <center>
                 Sizde tassyklanmadyk söz ýok!
            </center>
           

            <?php }  ob_end_flush();?>



        </div>