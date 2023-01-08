<!-- Dekanlar START-->
<?php
function DekanSearch(){
            $ady = $_POST['search'];  
            $connect = mysqli_connect('localhost','root','','oguzhan');     
            $query = "SELECT * FROM agzalar where derejesi='mugallym' and name like '%$ady%' and topary!=0 and berlen_derejesi=1";
            $result = mysqli_query($connect,$query);
            $id_count=0;
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $name = $row['name'];
            $surname = $row['surname'];
            $at_fam = $name."_".$surname;
            $Java = "Siz ". $at_fam." -y(i) ";
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
        <td>dekan</td>

        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>mugallym etmekçimi!');" href="index.php?page=dekanlar&update=upd&id=<?php echo $id;?>">mugallym</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>udalit etmekçimi!');" class="delete" href="index.php?page=dekanlar&update=delete&id=<?php echo $id;?>">delete</a></td>

        </tr>
<?php } } ?> 
<!-- Function1 END -->


<?php
   function AhliDekanlar(){
        $connect = mysqli_connect('localhost','root','','oguzhan');
        $query = "SELECT * FROM agzalar where derejesi='mugallym' and topary!=0 and berlen_derejesi=1 order by id desc";
        $result = mysqli_query($connect,$query);
        $id_count=0;$TassyklananDerejesi='';

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++;  
        $name = $row['name'];
        $surname = $row['surname'];
        $at_fam = $name."_".$surname;
        $Java = "Siz ". $at_fam." -y(i) ";
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
        <td>dekan</td>

        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>mugallym etmekçimi!');" href="index.php?page=dekanlar&update=upd&id=<?php echo $id;?>">mugallym</a></td>
        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>udalit etmekçimi!');" class="delete" href="index.php?page=dekanlar&update=delete&id=<?php echo $id;?>">delete</a></td>

    </tr>

<?php } } ?>
<!-- Dekanlar END -->