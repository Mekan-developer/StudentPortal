<?php
function MgSearch($var){
            $ady = $_POST['search'];  
            $connect = mysqli_connect('localhost','root','','oguzhan');     
            $query = "SELECT * FROM agzalar where derejesi='mugallym' and fakulteti= '$var' and topary!=0 and name LIKE '$ady%'";
            $result = mysqli_query($connect,$query);
            $id_count=0;
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $name = $row['name'];
            $surname = $row['surname'];
            $ady = $name." ".$surname;
            $hunari = $row['hunari'];
            $suraty = $row['suraty'];
            $tassyknama = $row['berlen_derejesi'];
           if($tassyknama==0){$BerlenDerejesi='Mugallymlar';}else if($tassyknama==1){$BerlenDerejesi='Dekan';}
           else if($tassyknama==2){$BerlenDerejesi='Zam Dekan';}else if($tassyknama==3){$BerlenDerejesi='Ýolbaşçy';}
        ?>

        <tr>
            <td><?php echo $id_count ;  ?></td>
            <td><?php echo $name ; ?></td>
            <td><?php echo $surname; ?></td>
            <td><?php echo $hunari; ?></td>
            <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
            <td><?php echo $BerlenDerejesi; ?></td>

        </tr>
<?php } } ?> 
<!-- Function1 END -->


<?php

   function AhliMugallymlar($var){
    $connect = mysqli_connect('localhost','root','','oguzhan');
    $query = "SELECT * FROM agzalar where derejesi='mugallym' and fakulteti = '$var' and topary!=0 order by id desc";
    $result = mysqli_query($connect,$query);
    $id_count=0;$TassyklananDerejesi='';
  
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++;  
        $name = $row['name'];
        $surname = $row['surname'];
        $ady = $name." ".$surname;
        $hunari = $row['hunari'];
        $suraty = $row['suraty'];
        $tassyknama = $row['berlen_derejesi'];
    if($tassyknama==0){$BerlenDerejesi='Mugallym';}else if($tassyknama==1){$BerlenDerejesi='Dekan';}else if($tassyknama==2){$BerlenDerejesi='Zam Dekan';}
    else if($tassyknama==3){$BerlenDerejesi='Ýolbaşçylar';}
?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        <td><?php echo $BerlenDerejesi; ?></td>
    </tr>

<?php } } ?>     
<!-- Mugallymlar END -->