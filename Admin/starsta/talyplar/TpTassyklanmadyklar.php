<?php ob_start(); include('functions/fTpTassyklanmadyklar.php'); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>Id</th>
        <th>Ady</th>
        <th>Familyasy</th>                    
        <th>Hünäri</th>
        <th>Kursy</th>
        <th>Suraty</th>                    
        </tr>
    </thead>
    <tbody align="center">


<?php

    if(isset($_POST['submit']) && $_POST['search']!=''){
        TpSearch($fakulteti,$kursy);
    } else{
        AhliTalyplar($fakulteti,$kursy);
    }

?>


<?php 
    if(isset($_GET['topardasyn'])){
        $id = $_GET['topardasyn'];        
        $query = "UPDATE agzalar SET topary = $user_topary where id=$id";
        mysqli_query($connect,$query);
        header("Location:index.php?page=tassyksyzlar");
    }else if(isset($_GET['update'])){
            $id = $_GET['id'];
            $query = "DELETE FROM agzalar WHERE id = $id";            
            $result = mysqli_query($connect,$query);            
    header("Location:index.php?page=tassyksyzlar");
    }
    ob_end_flush();
?>
    </tbody>
</table>