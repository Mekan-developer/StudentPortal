<?php ob_start(); 
include('functions/fTassyklanmadyklar.php'); 
?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
            <th>id</th>
            <th>Ady</th>
            <th>Familyasy</th>                     
            <th>Hünäri</th>
            <th>Suraty</th>
            <th>Derejesi</th>                     
        </tr>
    </thead>
    <tbody align="center">
<?php
if(isset($_POST['submit']) && $_POST['search']!=''){
    MgSearch($fakulteti);
}else{
    AhliTassyksyzlar($fakulteti);
}
?>

<?php 
if(isset($_GET['update'])){
        $update = $_GET['update'];
        $id = $_GET['id'];
    if($update=='delete'){           
        $query = "DELETE FROM agzalar WHERE id = $id";              
    }else if($update=='mug'){
        $query = "UPDATE agzalar SET topary=9999 WHERE id = $id";
    }
$result = mysqli_query($connect,$query);
header ("Location:index.php?page=MgTassyksyzlar") ;
ob_end_flush();
}
?>
    </tbody>
</table>
</div>