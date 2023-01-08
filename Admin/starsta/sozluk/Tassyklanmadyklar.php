<?php ob_start(); ?>
<table  border="" align="center">
    <thead>
     <tr>
         <th>id</th>
         <th>english</th>
         <th>turkmen</th>
         <th>definition</th>
         <th>talyp</th>
     </tr>
    </thead>
 <tbody align="center">
    
<?php

$connect = mysqli_connect('localhost','root','','oguzhan');
$query = "SELECT * FROM vocabulary where soz_gosanyn_topary = $user_topary and tassyklananmy != 'howwa' order by id desc";
$result = mysqli_query($connect,$query);
$id_count=0;
while($row = mysqli_fetch_assoc($result)){//Start
    $id = $row['id']; $id_count++;	
    $english = $row['english'];
    $turkmen = $row['turkmen'];
    $definition = $row['definition'];
    $soz_gosan_id = $row['soz_gosan_id'];

    // Tassyklajak bolynyan soz on tassyklanan bolsa on bu soz awtomatiki yagdayda pozulýar START
    $quers = "SELECT * FROM vocabulary where english = '$english' and tassyklananmy = 'howwa'";
    $res=mysqli_query($connect,$quers);
    $row = mysqli_fetch_assoc($res);
    if(!empty($row)){
          $query = "DELETE FROM vocabulary WHERE id=$id"; 
          $result = mysqli_query($connect,$query); 
          header('Location:index.php?page=Tassyklanmadyklar');
          ob_end_flush();
    }            
    //Tassyklajak bolynyan soz on tassyklanan bolsa on bu soz awtomatiki yagdayda pozulýar END


    // Sozlugi haysy ulanyjynyň goşandygyny kesgitlap beryar START
    $quer = "SELECT * FROM agzalar where id=$soz_gosan_id"; 
    $res=mysqli_query($connect,$quer);
    while($row=mysqli_fetch_assoc($res)){
        $Sozlugi_gosan_ady = $row['name'];
        $Sozlugi_gosan_familyasy = $row['surname'];
        $sozlugi_gosan = $Sozlugi_gosan_ady."  ".$Sozlugi_gosan_familyasy;
    }
    // Sozlugi haysy ulanyjynyň goşandygyny kesgitlap beryar END

         
?>

          <tr>
         <td><?php echo $id_count ;  ?></td>
         <td><?php echo $english ; ?></td>
         <td><?php echo $turkmen; ?></td>
         <td><?php echo $definition; ?></td>

         <td><?php echo $sozlugi_gosan?></td>

         <td class="back"><a href="index.php?page=Tassyklanmadyklar&tassykla=<?php echo $id;?>&sozlugi_gosan=<?php echo $soz_gosan_id;?>">tassykla</a></td>
         <td class="back"><a class="delete" href="index.php?page=Tassyklanmadyklar&delete=<?php echo $id;?>">delete</a></td>

         </tr>
       

<?php  }//End ?>

<?php 
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM vocabulary WHERE id = $id"; 
    $result = mysqli_query($connect,$query); 

    header('Location:index.php?page=Tassyklanmadyklar');
    ob_end_flush();
 }else if(isset($_GET['tassykla'])){
    $id = $_GET['tassykla'];
    $sozlugi_gosan_user_id = $_GET['sozlugi_gosan'];

    $query = "UPDATE vocabulary SET tassyklananmy='howwa' WHERE id = $id"; 
    mysqli_query($connect,$query); 

    $query_ = "UPDATE agzalar SET gosan_soz_sany=gosan_soz_sany+1  WHERE id = $sozlugi_gosan_user_id"; 
    mysqli_query($connect,$query_); 


    header('Location:index.php?page=Tassyklanmadyklar');
    ob_end_flush();
 }





 ?>     
 </tbody>
</table>