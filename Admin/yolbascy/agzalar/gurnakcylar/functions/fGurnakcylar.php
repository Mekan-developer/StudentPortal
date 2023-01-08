<?php
function GurnakcySearch($var){
    $ady = $_POST['search'];  
    $connect = mysqli_connect('localhost','root','','oguzhan');     
    $query = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti = '$var' and topary !=0 and (berlen_derejesi=1 || berlen_derejesi=2 || berlen_derejesi=3) and  name LIKE '$ady%'";
    $result = mysqli_query($connect,$query);
    $id_count=0;$TassyklananDerejesi='';
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id']; $id_count++;  
    $name = $row['name'];
    $surname = $row['surname'];
    $ady = $name." ".$surname;
    $hunari = $row['hunari'];
    $topary = $row['topary'];
    $suraty = $row['suraty'];
    $derejesi = $row['berlen_derejesi'];
    if($derejesi==1){$berlen_derejesi='Pes derejeli';}else if($derejesi==2){$berlen_derejesi='Aralyk derejeli';}else if($derejesi==3){$berlen_derejesi='Yokary derejeli';}

?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $topary; ?></td>
        <td><?php echo $berlen_derejesi; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>

        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  gurnakdan aýyrmakçymy!');" class="delete" href="index.php?page=talyplar&update=<?php echo $derejesi;?>&id=<?php echo $id;?>">Gurnakdan Aýyr</a></td>
    </tr>
<?php } } ?>

<?php
function AhliGurnakcylar($var){
	$connect = mysqli_connect('localhost','root','','oguzhan');
	$query = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti = '$var' and topary !=0 and (berlen_derejesi=1 || berlen_derejesi=2 || berlen_derejesi=3) order by id desc";

    $result = mysqli_query($connect,$query);
    $id_count=0;$TassyklananDerejesi='';
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id']; $id_count++;  
    $name = $row['name'];
    $surname = $row['surname'];
    $ady = $name." ".$surname;
    $hunari = $row['hunari'];
    $topary = $row['topary'];
    $suraty = $row['suraty'];
    $derejesi = $row['berlen_derejesi'];
    if($derejesi==1){$berlen_derejesi='Pes derejeli';}else if($derejesi==2){$berlen_derejesi='Aralyk derejeli';}else if($derejesi==3){$berlen_derejesi='Yokary derejeli';}
?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $topary; ?></td>
        <td><?php echo $berlen_derejesi; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        
        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  gurnakdan aýyrmakçymy!');" class="delete" href="index.php?page=gurnakcylar&update=<?php echo $derejesi;?>&id=<?php echo $id;?>">Gurnakdan Aýyr</a></td>
    </tr>


<?php } 
} ?>