<?php ob_start(); ?>
<style type="text/css">
    tr th{white-space: nowrap;}
    .back{ padding: 15px 0; }
</style>

<div class="scroll">
<table class="table" border="" align="center">
 <thead>
     <tr>
         <th>id</th>
         <th>English</th>
         <th>Turkmen</th>
         <th>Definition</th>
         <th>Görenleriň sany</th>
         <th>Halap ulanýanlaryň sany</th>
         <th>Sözi goşanyň topary</th>
         <th>Sözi goşan</th>
     </tr>
 </thead>

 <tbody align="center">


<?php 

    if(isset($_POST['submit']) && $_POST['search']!=''){
        $name = $_POST['search'];
        $query = "SELECT * FROM vocabulary where degisli_fakulteti = '$fakulteti' and soz_gosanyn_topary = 9999 and tassyklananmy != 'howwa' and english  LIKE '$name%'";
        $result = mysqli_query($connect,$query);
        $id_count=0;
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $english = $row['english'];
            $turkmen = $row['turkmen'];
            $definition = $row['definition'];
            $gorlen_sany = $row['gorlen_sany'];
            $owrenyanlerin_sany = $row['halanyp_ulanylyan_sany'];
            $soz_gosanyn_topary = $row['soz_gosanyn_topary'];
            $soz_gosan_id = $row['soz_gosan_id'];
        ?>

                  <tr>
                 <td><?php echo $id_count ;  ?></td>
                 <td><?php echo $english ; ?></td>
                 <td><?php echo $turkmen; ?></td>
                 <td><?php echo $definition; ?></td>
                 <td><?php echo $gorlen_sany; ?></td>
                 <td><?php echo $owrenyanlerin_sany; ?></td>
                 <td><?php echo $soz_gosanyn_topary; ?></td>  
                <?php 
                 $quer = "SELECT * FROM agzalar where id = '$soz_gosan_id'";
                 $res = mysqli_query($connect,$quer);
                 if(!empty($res)){
                 $setir = mysqli_fetch_assoc($res);
                 $sozi_gosan_name = $setir['name'];            
                 }else{
                    $sozi_gosan_name = 'Anonymous';
                 }

                ?>
                 <td><?php echo $sozi_gosan_name; ?></td>
                 
                 <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam bu sözi udalit etmekçimi!');" class="delete" href="index.php?page=rugsatsyz_sozler_mg&id=<?php echo $id;?>">delete</a></td>

                 </tr>
               

        <?php }  }else{ 


$query = "SELECT * FROM vocabulary where degisli_fakulteti = '$fakulteti' and soz_gosanyn_topary = 9999 and tassyklananmy != 'howwa' order by id desc";
$result = mysqli_query($connect,$query);
$id_count=0;
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id']; $id_count++;  
    $english = $row['english'];
    $turkmen = $row['turkmen'];
    $definition = $row['definition'];
    $gorlen_sany = $row['gorlen_sany'];
    $owrenyanlerin_sany = $row['halanyp_ulanylyan_sany'];
    $soz_gosanyn_topary = $row['soz_gosanyn_topary'];
    $soz_gosan_id = $row['soz_gosan_id'];
?>

          <tr>
         <td><?php echo $id_count ;  ?></td>
         <td><?php echo $english ; ?></td>
         <td><?php echo $turkmen; ?></td>
         <td><?php echo $definition; ?></td>
         <td><?php echo $gorlen_sany; ?></td>
         <td><?php echo $owrenyanlerin_sany; ?></td>
         <td><?php echo $soz_gosanyn_topary; ?></td>  
        <?php 
         $quer = "SELECT * FROM agzalar where id = '$soz_gosan_id'";
         $res = mysqli_query($connect,$quer);
         if(!empty($res)){
         $setir = mysqli_fetch_assoc($res);
         $sozi_gosan_name = $setir['name'];            
         }else{
            $sozi_gosan_name = 'Anonymous';
         }

        ?>
         <td><?php echo $sozi_gosan_name; ?></td>
         
         <td class="back"><a class="delete" onClick="javascript: return confirm('Siz hakykatdanam bu sözi udalit etmekçimi!');"  href="index.php?page=rugsatsyz_sozler_mg&id=<?php echo $id;?>">delete</a></td>

         </tr>
       

<?php }   } ?>





<?php 


if(isset($_GET['id'])){
$id = $_GET['id'];
$query = "DELETE FROM vocabulary WHERE id = $id"; 
$result = mysqli_query($connect,$query); 

header('location:index.php?page=rugsatsyz_sozler_mg');
ob_end_flush();
 } ?>     
 </tbody>
</table>
</div>