 <?php ob_start(); include('functions.php'); global $connect; ?>
<center>  
<div class="scroll"> 
 <table border="" align="center">
     <thead>
         <tr>
             <th>id</th>
             <th>Täzeligiň ady</th>
             <th>Suraty</th>
             <th>Täzelik hakynda maglumat</th>
             <th>Täzeligiň goýulan senesi</th>
             <th>Görülen sany</th>
             <th>Goşan</th>
         </tr>
     </thead>

     <tbody align="center">


<?php
  if(isset($_POST['submit']) && $_POST['search']!=''){
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
</center>






















