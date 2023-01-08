<?php ob_start(); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
     <tr>
         <th>id</th>
         <th>english</th>
         <th>turkmen</th>
         <th>definition</th>
         <th>görülen sany</th>
         <th>halanyp ulanylýan sany</th>
         <th>talyp</th>
     </tr>
    </thead>
 <tbody align="center">
    
<?php

$connect = mysqli_connect('localhost','root','','oguzhan');
$query = "SELECT * FROM vocabulary where soz_gosanyn_topary=$user_topary and tassyklananmy = 'howwa' order by id desc";
$result = mysqli_query($connect,$query);
$id_count=0;
while($row = mysqli_fetch_assoc($result)){
$id = $row['id']; $id_count++;	
$english = $row['english'];
$turkmen = $row['turkmen'];
$definition = $row['definition'];
$soz_gosan_id = $row['soz_gosan_id'];
$gorulen_sany = $row['gorlen_sany'];
$halanan_sany = $row['halanyp_ulanylyan_sany'];

$quer = "SELECT * FROM agzalar where id=$soz_gosan_id"; 
$res=mysqli_query($connect,$quer);
while($row=mysqli_fetch_assoc($res)){
    $Sozlugi_gosan_ady = $row['name'];
    $Sozlugi_gosan_familyasy = $row['surname'];
    $sozlugi_gosan = $Sozlugi_gosan_ady." ".$Sozlugi_gosan_familyasy;
        }
?>

          <tr>
         <td><?php echo $id_count ;  ?></td>
         <td><?php echo $english ; ?></td>
         <td><?php echo $turkmen; ?></td>
         <td><?php echo $definition; ?></td>
         <td><?php echo $gorulen_sany; ?></td>
         <td><?php echo $halanan_sany; ?></td>
         <td><?php echo $sozlugi_gosan?></td>

         <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam bu sözi  udalit etmekçimi!');" class="delete" href="index.php?page=ToparyňGosany&delete=<?php echo $id;?>&sozlugi_gosan=<?php echo $soz_gosan_id;?>">delete</a></td>

         </tr>
       

<?php } ?>

<?php 
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sozlugi_gosan_user_id = $_GET['sozlugi_gosan'];

$query = "DELETE FROM vocabulary WHERE id = $id"; 
$result = mysqli_query($connect,$query); 

$query_ = "UPDATE agzalar SET gosan_soz_sany=gosan_soz_sany-1 WHERE id = $sozlugi_gosan_user_id"; 
mysqli_query($connect,$query_); 

header('Location:index.php?page=ToparyňGosany');
ob_end_flush();
 }





 ?>     
 </tbody>
</table>
</div>