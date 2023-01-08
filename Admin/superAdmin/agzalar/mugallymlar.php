<?php ob_start(); include('functions/fMugallymlar.php'); ?>
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
        <th>Derejesi</th>
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
        }else if($update=='dekan'){
                    $query = "UPDATE agzalar SET berlen_derejesi=1 WHERE id = $id";
        }else if($update=='mugallym'){
                    $query = "UPDATE agzalar SET berlen_derejesi=0 WHERE id = $id";
        }
$result = mysqli_query($connect,$query); 
header("Location:index.php?page=mugallymlar");
ob_end_flush();
    }
?>
    </tbody>
</table>
</div>