 <?php ob_start(); include('function/fTazelikler.php'); global $connect; ?>
<div class="scroll"> 
 <table border="" align="center">
     <thead>
         <tr>
             <th>id</th>
             <th>Täzeligiň ady</th>
             <th>Suraty</th>
             <th style="white-space: nowrap;">Täzelik hakynda maglumat</th>
             <th>Täzeligiň goýulan senesi</th>
             <th>Görülen sany</th>
             <th>Täzeligi goşan</th>
         </tr>
     </thead>

     <tbody align="center">


<?php
  if(isset($_POST['submit']) && $_POST['search'] != ''){
        TazelikSearch($fakulteti);
    } else{
        AhliTazelikler($fakulteti);
    }
?>



        
<?php
 ?>

<?php 
if(isset($_GET['update'])){
    $update = $_GET['update'];
    $id = $_GET['id'];
    if($update == 'delete'){
        $query = "DELETE FROM news WHERE id = $id"; 
        $result = mysqli_query($connect,$query); 

        if(!$result){die("connect bolmady".mysqli_error($connect));}
    }

    header('Location:index.php?page=tazelikler');
    ob_end_flush();

} ?>




         
     </tbody>
 </table>
</div>























