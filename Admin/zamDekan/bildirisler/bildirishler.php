 <?php ob_start(); include('functions/fBildirishler.php'); ?>
 <div class="scroll">
     <table border="" align="center">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Bildirişiň ady</th>
                 <th>Suraty</th>
                 <th style="white-space: nowrap;">Bildiriş barada maglumat</th>
                 <th>Bildirişiň goýlan senesi</th>
                 <th>Görülen sany</th>
                 <th>Bildirişi goşan</th>
             </tr>
         </thead>

         <tbody align="center">

<?php
      if(isset($_POST['submit']) && $_POST['search'] != ''){
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
        header('Location:index.php?page=bildirishler');
        ob_end_flush();
} 
?>




             
     </tbody>
 </table>
</div>






















