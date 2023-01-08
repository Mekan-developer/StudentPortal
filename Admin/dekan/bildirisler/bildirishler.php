 <?php ob_start(); include('functions.php'); ?>
<div class="scroll">
     <table border="" align="center">
         <thead>
             <tr>
                 <th>id</th>
                 <th>Bildirişiň ady</th>
                 <th>Bildirişiň suraty</th>
                 <th>Bildiriş hakynda maglumat</th>
                 <th>Goşulan sene</th>
                 <th>Görülen sany</th>
                 <th>Goşan</th>
             </tr>
         </thead>
         <tbody align="center">

<?php
if(isset($_POST['submit']) && $_POST['search']!=''){
    BildirishSearch($fakulteti);
} else{
    AhliBildirishler($fakulteti);
}
?>

<?php 
if(isset($_GET['update'])){
$update = $_GET['update'];
$id = $_GET['id'];
if($update == 'delete'){
    $query = "DELETE FROM postlar WHERE id = $id"; 
    $result = mysqli_query($connect,$query); 
}
header('Location:index.php?page=bildirisler');
ob_end_flush();
} ?>

             
     </tbody>
 </table>
</div>













