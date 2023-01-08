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
                               <a href="#">my profile</a>
                               <a href="../../login/index.php?cookieClean">log out</a>
                               </center>
                           </div> 

           </ul>    
                 <div class="usrImg cover"></div>
    </div>
    <div class="SUBheader">
          <ul class='linkler sub'>
              <li class="active1"><a href="indexEN.php">sözlük</a></li>
              <li class="active2"><a href="indexEN.php?style=soz_gos">söz goşmak</a></li>
          </ul>
    </div>
<style>
    
    .usrImg{ background-image: url(../../register/img/<?php echo $suraty;?>);/*usr.png*/ }  
     
</style>