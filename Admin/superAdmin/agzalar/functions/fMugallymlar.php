<?php
function MgSearch(){
            $ady = $_POST['search'];  
            $connect = mysqli_connect('localhost','root','','oguzhan');     
            $query = "SELECT * FROM agzalar where derejesi='mugallym' and topary!=0 and name like '$ady%'";
            $result = mysqli_query($connect,$query);
            $id_count=0;
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $name = $row['name'];
            $surname = $row['surname'];
            $at_fam = $name."_".$surname;
            $Java = "Siz ". $at_fam." -y(i) udalit etmekcimi";
            $fakultet = $row['fakulteti'];
            $hunari = $row['hunari'];
            $suraty = $row['suraty'];
            $tassyknama = $row['berlen_derejesi'];
            if($tassyknama == 0){$TassyklananDerejesi='Mugallym';}else if($tassyknama == 1){$TassyklananDerejesi='Dekan';}
            else if($tassyknama == 2){$TassyklananDerejesi='Zam Dekan';}else if($tassyknama == 3){$TassyklananDerejesi='Ýolbaşçy';}
?>

    <tr>
         <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $fakultet; ?></td>
        <td><?php echo $hunari; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        <td><?php echo $TassyklananDerejesi; ?></td>
        
        <td class="back"><a href="index.php?page=mugallymlar&update=dekan&id=<?php echo $id;?>">dekan</a></td>
        <td class="back"><a href="index.php?page=mugallymlar&update=mugallym&id=<?php echo $id;?>">mugallym</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>');" class="delete" href="index.php?page=mugallymlar&update=delete&id=<?php echo $id;?>">delete</a></td>

        </tr>
<?php } } ?> 
<!-- Function1 END -->


<?php
   function AhliMugallymlar(){
        $connect = mysqli_connect('localhost','root','','oguzhan');
        $query = "SELECT * FROM agzalar where derejesi='mugallym' and topary!=0 order by id desc";
        $result = mysqli_query($connect,$query);
        $id_count=0;$TassyklananDerejesi='';

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++;  
        $name = $row['name'];
        $surname = $row['surname'];
        $at_fam = $name."_".$surname;
        $Java = "Siz ". $at_fam." -y(i) udalit etmekcimi";
        $fakultet = $row['fakulteti'];
        $hunari = $row['hunari'];
        $suraty = $row['suraty'];
        $tassyknama = $row['berlen_derejesi'];
        if($tassyknama == 0){$TassyklananDerejesi='Mugallym';}else if($tassyknama == 1){$TassyklananDerejesi='Dekan';}
        else if($tassyknama == 2){$TassyklananDerejesi='Zam Dekan';}else if($tassyknama == 3){$TassyklananDerejesi='Ýolbaşçy';}
?>

    <tr>
         <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $fakultet; ?></td>
        <td><?php echo $hunari; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        <td><?php echo $TassyklananDerejesi; ?></td>

        <td class="back"><a href="index.php?page=mugallymlar&update=dekan&id=<?php echo $id;?>">dekan</a></td>
        <td class="back"><a href="index.php?page=mugallymlar&update=mugallym&id=<?php echo $id;?>">mugallym</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>');" class="delete" href="index.php?page=mugallymlar&update=delete&id=<?php echo $id;?>">Delete</a></td>

    </tr>

<?php } } ?>     
