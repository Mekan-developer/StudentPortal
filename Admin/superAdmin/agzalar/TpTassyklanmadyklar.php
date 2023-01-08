<?php ob_start(); include('functions/fTpTassyklanmadyklar.php'); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>Id</th>
        <th>Ady</th>
        <th>Familyasy</th>
        <th>Fakulteti</th>                     
        <th>Hünäri</th>
        <th>Kursy</th>
        <th>Suraty</th>                     
        </tr>
    </thead>
    <tbody align="center">


<?php

    if(isset($_POST['submit']) && $_POST['search']!=''){
        TpSearch();
         } else{

        AhliTalyplar();

        }
?>


<?php 
   
    if(isset($_GET['id'])){
        $id = $_GET['id'];           
            $query = "DELETE FROM agzalar WHERE id = $id"; 
            $result = mysqli_query($connect,$query); 
       
header("Location:index.php?page=TpTassyksyzlar");
ob_end_flush();
    }
?>
    </tbody>
</table>
</div>