<?php ob_start(); include('functions/fTalyplar.php'); ?>
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
        <th>Derejesi</th>
        </tr>
    </thead>

    <tbody align="center">

<?php
      if(isset($_POST['submit']) && $_POST['search']!=''){
            TpSearch($fakulteti);
        } else{
            AhliTalyplar($fakulteti);
        }
?>

<?php 
if(isset($_GET['update'])){
        $update = $_GET['update'];
        $id = $_GET['id'];
        if($update=='talyp'){
            $query = "UPDATE agzalar SET berlen_derejesi=0 WHERE id = $id";
        }else if($update == 'gurnak'){
            $query = "UPDATE agzalar SET berlen_derejesi=1 WHERE id = $id";
        }
$result = mysqli_query($connect,$query); 
header('Location:index.php?page=talyplar');
ob_end_flush();
}   
?>
    </tbody>
</table>
</div>