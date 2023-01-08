<?php ob_start(); include('functions/fGurnakcylar.php');?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>Id</th>
        <th>Ady</th>
        <th>Familyasy</th>                   
        <th>Hünäri</th>
        <th>Topary</th>                   
        <th>Drejesi</th>  
        <th>Suraty</th> 
        </tr>
    </thead>

    <tbody align="center">

<?php
if(isset($_POST['submit']) && $_POST['search']!=''){
    GurnakcySearch($fakulteti);
} else{
    AhliGurnakcylar($fakulteti);
}
?>
<?php 
if(isset($_GET['update'])){
        $id = $_GET['id'];
        $query = "UPDATE agzalar SET berlen_derejesi=0 WHERE id = $id";
        $result = mysqli_query($connect,$query);             
header("Location:index.php?page=gurnakcylar") ;
ob_end_flush(); 
} ?>

    </tbody>
</table>
</div>