<div class="sozGozlemek">
    <div class="changerENTM changer"><center><a href="indexTM.php"><img src="icons/progr.png"></a></center></div>
    <form autocomplete="off" method="post" action="indexEN.php">
        <input class="inptSearch " type="text" name="search" placeholder="searching ">
        <input class="seachPNG" type="submit" name="submit_search" value="">

    </form>

<?php
if(isset($_POST['submit_search'])){    
    
    $search = $_POST['search'];
    $connect = mysqli_connect('localhost','root','','oguzhan');     
    $query = "SELECT * FROM vocabulary where english = '$search' and tassyklananmy='howwa' ";
    
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
                    if($seen_count==0){//eger bu ulanyjy onem soz gozledip su wagt gozletyan sozi hem onki bn den dal bolsa isleyar
                            $query1 = "UPDATE vocabulary SET gorlen_sany = gorlen_sany + 1 where id = $voc_id";
                            mysqli_query($connect,$query1);

                            $query2 = "INSERT INTO vocabulary_seen( `vocabulary_id`, `user_id`) VALUES ($voc_id,$id_user)";
                            mysqli_query($connect,$query2);

                            $query3 = "UPDATE agzalar SET baly = baly + 1 where id = $soz_gosan_id";
                            mysqli_query($connect,$query3);
                    }
                }else{//eger on bu ulanyjy hic-hili soz gozletmedik bolsa isleyar
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
                <div class="ENTM"><?php echo $en; ?></div>
                <div class="ENTM"><?php echo $tm; ?></div>
                <div class="britishFlag"><?php echo $def; ?></div>
            </div>
            <div class="SeenLikeIcons"><a href="#"><img class="seen" src="icons/seen.png"><?php echo $view_count; ?></a><a href="functions/function.php?page=en&get=like&user_id=<?php echo $id_user; ?>&voc_id= <?php echo $voc_id; ?>&soz_gosan_id=<?php echo $soz_gosan_id;?> "><img class="like" src="icons/<?php echo $like_icon.'.png'; ?>"><?php echo $like_count; ?></a></div>

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
if(isset($_POST['submit_search'])){
    $search = $_POST['search'];
    $query = "SELECT * FROM vocabulary where tassyklananmy = 'howwa' and english != '$search' and english like '$search%' order by id desc";
    
   if(!empty($search) && $search != " " && $search != "  " && $search != "   "){
    $connect = mysqli_connect('localhost','root','','oguzhan');     
    $result = mysqli_query($connect,$query); $count=0;;
   
   while($row=mysqli_fetch_array($result)){ 
        $count++;
        $en = $row['english'];
        $tm = $row['turkmen'];           
     //while
     ?>

            
                <div class="sameWord"><?php echo $count."."; ?><?php echo $en; ?><br><?php echo $tm; ?></div>                
            

        <?php } }else{ ?>
            
                <div class="sameWord">bu söze meňzeş bolan söz bazamyzda ýok.</div>
            
        <?php } }else{ ?>
                <div class="sameWord">gözleýän sözüňize meňzeş bolan sözler.</div>
            <?php } ?>
          </div>
        </div>