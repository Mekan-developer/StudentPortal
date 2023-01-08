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
            $js_delet = 'Siz hakykatdanam' .$ady.'-y(i) udalit etmekçimi!';
            $js = 'Siz hakykatdanda bu ulanyjynyň wezipesini üýtgetmek isleýäňizmi?';
           if($tassyknama==0){$BerlenDerejesi='Mugallymlar';}else if($tassyknama==1){
            $js_delet = 'Bu ulanyja üýtgeşme girizmek size bagly däl.';
            $js = 'Bu ulanyjynyň wezipesini üýtgetmek size bagly däl!';
            $BerlenDerejesi='Dekan';
           }
           else if($tassyknama==2){$BerlenDerejesi='Zam Dekan';}else if($tassyknama==3){$BerlenDerejesi='Ýolbaşçy';}
        ?>

        <tr>
            <td><?php echo $id_count ;  ?></td>
            <td><?php echo $name ; ?></td>
            <td><?php echo $surname; ?></td>
            <td><?php echo $hunari; ?></td>
            <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
            <td><?php echo $BerlenDerejesi; ?></td>

           <td class="back"><a onClick="javascript: return confirm('<?php echo $js;?>');" href="index.php?page=mugallymlar&update=zam&id=<?php echo $id;?>">zam Dekan</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $js;?>');" href="index.php?page=mugallymlar&update=Yolbascy&id=<?php echo $id;?>">ýolbaşçylar</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $js_delet;?>');" class="delete" href="index.php?page=mugallymlar&update=delete&id=<?php echo $id;?>">delete</a></td>
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
        $js_delet = 'Siz hakykatdanam' .$ady.'-y(i) udalit etmekçimi!';
        $js = 'Siz hakykatdanda bu ulanyjynyň wezipesini üýtgetmek isleýäňizmi?';
    if($tassyknama==0){$BerlenDerejesi='Mugallym';}else if($tassyknama==1){
        $js_delet = 'Bu ulanyja üýtgeşme girizmek size bagly däl.';
        $js = 'Bu ulanyjynyň wezipesini üýtgetmek size bagly däl!';

        $BerlenDerejesi='Dekan';
    }else if($tassyknama==2){$BerlenDerejesi='Zam Dekan';}
    else if($tassyknama==3){$BerlenDerejesi='Ýolbaşçylar';}
?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        <td><?php echo $BerlenDerejesi; ?></td>
        
       <td class="back"><a onClick="javascript: return confirm('<?php echo $js;?>');" href="index.php?page=mugallymlar&update=zam&id=<?php echo $id;?>&dekan=<?php echo $tassyknama;?>">zam Dekan</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $js;?>');" href="index.php?page=mugallymlar&update=Yolbascy&id=<?php echo $id;?>&dekan=<?php echo $tassyknama;?>">ýolbaşçy</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $js_delet;?>');" class="delete" href="index.php?page=mugallymlar&update=delete&id=<?php echo $id;?>&dekan=<?php echo $tassyknama;?>">delete</a></td>

    </tr>

<?php } } ?>     
<!-- Mugallymlar END -->