<?php
function MgSearch(){
            $ady = $_POST['search'];  
            $connect = mysqli_connect('localhost','root','','oguzhan');     
            $query = "SELECT * FROM agzalar where derejesi='mugallym' and name='$ady' and topary=0";
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
?>

    <tr>
         <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $fakultet; ?></td>
        <td><?php echo $hunari; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>

        <td class="back"><a href="index.php?page=MgTassyksyzlar&update=dekan&id=<?php echo $id;?>">Dekan</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>');" class="delete" href="index.php?page=MgTassyksyzlar&update=delete&id=<?php echo $id;?>">delete</a></td>

        </tr>
<?php } } ?> 
<!-- Function1 END -->


<?php
   function AhliMugallymlar(){
        $connect = mysqli_connect('localhost','root','','oguzhan');
        $query = "SELECT * FROM agzalar where derejesi='mugallym' and topary=0 order by id desc";
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
        
?>

    <tr>
         <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $fakultet; ?></td>
        <td><?php echo $hunari; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>

        <td class="back"><a href="index.php?page=MgTassyksyzlar&update=dekan&id=<?php echo $id;?>">Dekan</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>');" class="delete" href="index.php?page=MgTassyksyzlar&update=delete&id=<?php echo $id;?>">delete</a></td>

    </tr>

<?php } } ?>     
