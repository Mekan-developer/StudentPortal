<?php ob_start(); include('functions/fMgTassyklanmadyklar.php'); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>Id</th>
        <th>Ady</th>
        <th>Familyasy</th>
        <th>Fakulteti</th>                     
        <th>Hünäri</th>
        <th>Suraty</th>                     
        </tr>
    </thead>
    <tbody align="center">


<?php

    if(isset($_POST['submit']) && $_POST['search']!=''){
        MgSearch();
         } else{

        AhliMugallymlar();

        }
?>


<?php 
   
    if(isset($_GET['update'])){
        $update = $_GET['update'];
        $id = $_GET['id'];
        if($update=='delete'){            
            $query = "DELETE FROM agzalar WHERE id = $id"; 
            $result = mysqli_query($connect,$query); 
        }else{
            $query = "UPDATE agzalar SET topary=9999, berlen_derejesi=1 WHERE id = $id";
            $result = mysqli_query($connect,$query); 
        }
header("Location:index.php?page=MgTassyksyzlar");
ob_end_flush();
    }
?>
    </tbody>
</table>
</div>