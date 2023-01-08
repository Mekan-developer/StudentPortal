<?php  ob_start(); session_start(); 
$connect = mysqli_connect('localhost','root','','oguzhan');
@$id_user=$_SESSION['id'];
@$username = $_COOKIE["username"];
@$password = $_COOKIE["password"];
@$logged = $_SESSION['loginAUTHO'];
if(empty($id) && empty($username) && empty($username) && empty($logged)){
   header("Location:../../login/");
}else{
$query = "SELECT * FROM agzalar where username = '$username' and password = '$password'";
$result = mysqli_query($connect,$query);
$userSany = mysqli_num_rows($result);

}


if($userSany>0 or $logged == 'loged_in'){
    if($logged == 'loged_in'){
        $user = $_SESSION['username'];
        $pass = $_SESSION['password'];
        $query = "SELECT * FROM agzalar where id=$id_user and username = '$user' and password = '$pass' "; 
    }
    $result = mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $id = $row['id'];
    $derejesi = $row['berlen_derejesi'];
    $username = $row['username'];
    $Talyp_Mugall = $row['derejesi'];
    $suraty = $row['suraty'];
    $topary = $row['topary'];
    $user_fakulteti = $row['fakulteti'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TM&EN sözlük</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(isset($_REQUEST['style'])){
         $style = $_REQUEST['style'];
         if($style=='soz_gos'){ ?>
    <link rel="stylesheet" type="text/css" media="screen" href="style/soz_gos.css" />
         <?php } }else{ ?>
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css" />
          <?php  } ?>
    <link rel="shortcut icon" href="icons/vocabulary.png" type="image/x-icon" />
</head>
<body>
    <div class="header">
        <ul class="linkler">
            <li class="notActive"><a href="../habarlar/index.php">Habarlar</a></li>
            <li class="active"><a href="../sozluk/indexEN.php">Sözlük</a></li>
            <li class="notActive"><a href="../ondebaryjylar/index.php">Öňdebaryjylar</a></li>
           <!--  <li class="notActive"><a href="#" >Chat</a></li> -->
            <?php
                if($Talyp_Mugall=='mugallym'){
                    if($derejesi==1){echo "<li class='notActive'><a target='_blank' href='../../Admin/Dekan/'>Admin</a></li>";}
                    else if($derejesi==2){echo "<li class='notActive'><a target='_blank' href='../../Admin/zamDekan/'>Admin</a></li>";}
                    else if($derejesi==3){echo "<li class='notActive'><a target='_blank' href='../../Admin/yolbascy/'>Admin</a></li>";}
                }else if($Talyp_Mugall=='talyp'){
                    if($derejesi==4){echo "<li class='notActive'><a target='_blank' href='../../Admin/starsta/' >Admin</a></li>";}
                }if($derejesi==-100){echo "<li class='notActive'><a target='_blank' href='../../Admin/superAdmin/'>Admin</a></li>";}
            ?>
        </ul>

        <ul class="USN">
            <li><label for="toggle1"> <a class="show"><?php echo $username; ?></a></label></li>
                            <input type="checkbox" id="toggle1">
                           
                           <div class="hidden">
                               <center>
                               <a href="admin.php?page=mugallymlar">my profile</a>
                               <a href="../../login/index.php?cookieClean">log out</a>
                               </center>
                           </div> 

           </ul>    
                 <div class="usrImg cover"></div>
    </div>
    <div class="SUBheader">
          <ul class='linkler sub'>
              <li class="active1"><a href="indexTM.php">sözlük</a></li>
              <li class="active2"><a href="indexTM.php?style=soz_gos">söz goşmak</a></li>
          </ul>
    </div>
<style>
    
    .usrImg{ background-image: url(../../register/img/<?php echo $suraty;?>);/*usr.png*/ }  
     
</style>

<div class="mainDIV">
    <div class="left">
        <div class="sozGozlemek">
            <div class="changerTMEN changer"><center><a href="indexEN.php"><img src="icons/progr.png"></a></center></div>
            <form autocomplete="off" method="post" action="indexTM.php">
                <input class="inptSearch " type="text" name="search" placeholder="searching ">
                <input class="seachPNG" type="submit" name="submit" value="">

            </form>

<?php
if(isset($_POST['submit'])){    
    
    $search = $_POST['search'];
    $connect = mysqli_connect('localhost','root','','oguzhan');     
    $query = "SELECT * FROM vocabulary where turkmen = '$search' and tassyklananmy='howwa' ";
    
   if(!empty($search) && $search != " " && $search != "  " && $search != "   "){
    $result = mysqli_query($connect,$query);

    $row=mysqli_fetch_array($result); 
            if(!empty($row)){
                $voc_id = $row['id'];
                $soz_gosan_id = $row['soz_gosan_id'];
                $en = $row['english'];
                $tm = $row['turkmen'];
                $def = $row['definition'];
                $view_count = $row['gorlen_sany']; 
                $like_count = $row['halanyp_ulanylyan_sany'];
 
 //view count started
                $query = "SELECT * FROM vocabulary_seen where user_id = $id_user";
                $result = mysqli_query($connect,$query);
                if(!empty($result)){
                    $seen_count=0;
                    while($row = mysqli_fetch_assoc($result)){
                        $id_voc = $row['vocabulary_id'];
                        if($voc_id == $id_voc){$seen_count++;}
                    } 
                    if($seen_count==0){
                            $query1 = "UPDATE vocabulary SET gorlen_sany = gorlen_sany + 1 where id = $voc_id";
                            $result1 = mysqli_query($connect,$query1);

                            $query2 = "INSERT INTO vocabulary_seen( `vocabulary_id`, `user_id`) VALUES ($voc_id,$id_user)";
                            $result2 = mysqli_query($connect,$query2);

                            $query3 = "UPDATE agzalar SET baly = baly + 1 where id = $soz_gosan_id";
                            mysqli_query($connect,$query3);
                    }
                }else{
                    $query1 = "UPDATE vocabulary SET gorlen_sany = gorlen_sany + 1 where id = $voc_id";
                    $result1 = mysqli_query($connect,$query1);
                    

                    $query2 = "INSERT INTO vocabulary_seen( `vocabulary_id`, `user_id`) VALUES ($voc_id,$id_user)";
                    $result2 = mysqli_query($connect,$query2);

                    $query3 = "UPDATE agzalar SET baly = baly + 1 where id = $soz_gosan_id";
                    mysqli_query($connect,$query3);
                }
//view count ended;

 //like identificator started
                $query = "SELECT * FROM vocabulary_like where vocabulary_id = $voc_id and user_id = $id_user";
                $result = mysqli_query($connect,$query);
                $rows = mysqli_num_rows($result);              
                if($rows>0){ $like_icon = 'liked';}else{$like_icon = 'like';}
//like identificator ended;



            }else{
                $en='This word no';
                $tm = 'Bu soz yok';
                $def='Siziň gözleýän sözüňiz ýok bu sözi özüňiz girizip bilersiňiz';
                $view_count =  0; 
                $like_icon = 'like';
                $like_count = 0;
            }



     //while
     ?>



            <div class="searchedWord length">
                <div class="ENTM"><?php echo $tm; ?></div>
                <div class="ENTM"><?php echo $en; ?></div>
                <div class="britishFlag"><?php echo $def; ?></div>
            </div>
            <div class="SeenLikeIcons"><a href="#"><img class="seen" src="icons/seen.png"><?php echo $view_count; ?></a><a href="functions/function.php?page=tm&get=like&user_id=<?php echo $id_user; ?>&voc_id= <?php echo $voc_id; ?> "><img class="like" src="icons/<?php echo $like_icon.'.png'; ?>"><?php echo $like_count; ?></a></div>

<?php } else { ?>
      
     <div class="searchedWord length">
                <div class="ENTM">this word no</div>
                <div class="ENTM">bu söz ýok</div>
                <div class="britishFlag">Siziň gözleýän sözüňiz ýok bu sözi özüňiz girizip bilersiňiz!</div>
            </div>
         <div class="SeenLikeIcons"><a href="#"><img class="seen" src="icons/seen.png">0</a><a href="#"><img class="like" src="icons/like.png">0</a></div>


<?php  }

}else{ ?>


            <div class="searchedWord length">
                <div class="ENTM">...</div>
                <div class="ENTM">...</div>
                <div class="britishFlag">definition!</div>
            </div>
            <div class="SeenLikeIcons"><a href="#"><img class="seen" src="icons/seen.png">0</a><a href="#1"><img class="like" src="icons/like.png">0</a></div>

           <?php } ?>
<!-- VOCABULARY  END --> 


            <div class="sameWords length">
<?php
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $query = "SELECT * FROM vocabulary where tassyklananmy = 'howwa' and turkmen != '$search' and turkmen like '$search%' order by id desc";
    
   if(!empty($search) && $search != " " && $search != "  " && $search != "   "){
    $connect = mysqli_connect('localhost','root','','oguzhan');     
    $result = mysqli_query($connect,$query); $count=0;;
   
   while($row=mysqli_fetch_array($result)){ 
        $count++;
        $en = $row['english'];
        $tm = $row['turkmen'];           
     //while
     ?>

            
                <div class="sameWord"><?php echo $count."."; ?><?php echo $tm; ?><br><?php echo $en; ?></div>                
            

        <?php } }else{ ?>
            
                <div class="sameWord">bu söze meňzeş bolan söz bazamyzda ýok.</div>
            
        <?php } }else{ ?>
                <div class="sameWord">gözleýän sözüňize meňzeş bolan sözler.</div>
            <?php } ?>
          </div>
        </div>







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
                      <div class="soz"><?php echo $tkm; ?></div>
                      <div class="soz"><?php echo $engl; ?></div>
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

    </div>


   





    <div class="right">
        <!-- SOZ  girizyan yerin start -->
        <form autocomplete="off" method="post" action="indexTM.php?style=soz_gos">
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
            if(!empty($tm) && !empty($en) && $tm!=" " && $en!=" " && $tm!="  " && $en!="  "){
                $connect = mysqli_connect('localhost','root','','oguzhan');
                $query = "INSERT INTO vocabulary(english,turkmen,definition,degisli_fakulteti,soz_gosanyn_topary,soz_gosan_id) VALUES ('$en','$tm','$def','$user_fakulteti',$topary,$id_user)";
               mysqli_query($connect,$query);
               header("Location:indexTM.php?style=soz_gos");
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
                header("Location:indexTM.php?style=soz_gos");
        }
        ?>
        <span class="span">tassyklanmadyk sözleriň*</span>
        <div class="tassyklanmadyklaryn">
            <?php 
               $query = "SELECT * FROM vocabulary where tassyklananmy != 'howwa' and soz_gosan_id= $id order by id desc"; 
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
                     <a href="indexTM.php?geted=update&tm=<?php echo $tm; ?>&en=<?php echo $en; ?>&def=<?php echo $def; ?>&id=<?php echo $idVoc; ?>&style=soz_gos"><img src="icons/change.png"></a>
                     <a href="functions/function.php?get=delete&page=tm&id=<?php echo $idVoc; ?>&style=soz_gos"><img src="icons/delete.png"></a>
            </div>
            <?php }  } else { ?>

            <center>
                     Sizde tassyklanmadyk söz ýok!
            </div> 
            </center>
            
            <?php }  ob_end_flush();?>



        </div>

    </div>
    
</div>

    

</body>
</html>