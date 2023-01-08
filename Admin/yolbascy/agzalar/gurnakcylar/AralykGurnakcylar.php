<?php ob_start(); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>Id</th>
        <th>Ady</th>
        <th>Familyasy</th>                   
        <th>Hünäri</th>
        <th>Topary</th>
        <th>Suraty</th>                     
        </tr>
    </thead>

    <tbody align="center">

<?php
    $query = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti = '$fakulteti' and berlen_derejesi=2 and topary !=0 order by id desc";

    $result = mysqli_query($connect,$query);
    $id_count=0;$TassyklananDerejesi='';
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id']; $id_count++;	
    $name = $row['name'];
    $surname = $row['surname'];
    $hunari = $row['hunari'];
    $suraty = $row['suraty'];
    $topary = $row['topary'];
?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $topary; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        
        <td class="back"><a href="index.php?page=AralykGurnakcylar&update=beygelt&id=<?php echo $id;?>">Derejesini beýgelt</a></td>
        <td class="back"><a href="index.php?page=AralykGurnakcylar&update=peselt&id=<?php echo $id;?>">Derejesini peselt</a></td>

    </tr>


<?php } ?>

<?php 
if(isset($_GET['update'])){
        $DerejeTassykla=$_GET['update'];
        $id = $_GET['id'];
        if($DerejeTassykla=='beygelt'){
            $query = "UPDATE agzalar SET berlen_derejesi=3 WHERE id = $id";
        }else{
            $query = "UPDATE agzalar SET berlen_derejesi=1 WHERE id = $id";
        }
$result = mysqli_query($connect,$query);
header('location:index.php?page=AralykGurnakcylar'); 
ob_end_flush();
} 
?>

    </tbody>
</table>
</div>