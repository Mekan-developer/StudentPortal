<?php ob_start(); include('functions/fMugallymlar.php'); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
            <th>id</th>
            <th>Ady</th>
            <th>Familyasy</th>                     
            <th>Hünäri</th>
            <th>suraty</th>                     
            <th>Derejesi</th>
        </tr>
    </thead>
    <tbody align="center">
<?php
if(isset($_POST['submit']) && $_POST['search']!=''){
    MgSearch($fakulteti);
} else{
    AhliMugallymlar($fakulteti);
}
?>


<?php 
    if(isset($_GET['update'])){
        $update = $_GET['update'];
        $id = $_GET['id'];
        $dekan_wezipelimi = $_GET['dekan'];
        if( $dekan_wezipelimi==1){
            header ("Location:index.php?page=mugallymlar"); die();
        }
        else if($update=='delete'){           
            $query = "DELETE FROM agzalar WHERE id = $id";              
        }else if($update=='zam'){
            $query = "UPDATE agzalar SET berlen_derejesi=2 WHERE id = $id";
        }else if($update=='Yolbascy'){
            $query = "UPDATE agzalar SET berlen_derejesi=3 WHERE id = $id";
        }
        $result = mysqli_query($connect,$query);

        header ("Location:index.php?page=mugallymlar") ;
    }
        ob_end_flush();
?>
    </tbody>
</table>
</div>