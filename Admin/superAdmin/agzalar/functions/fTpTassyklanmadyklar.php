<?php
function TpSearch(){
            $ady = $_POST['search'];  
            $connect = mysqli_connect('localhost','root','','oguzhan');     
            $query = "SELECT * FROM agzalar where derejesi='talyp' and name='$ady' and topary=0";
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
            $kursy = $row['kursy'];
            $suraty = $row['suraty'];
?>

    <tr>
         <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $fakultet; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $kursy; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>

        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>');" class="delete" href="index.php?page=TpTassyksyzlar&id=<?php echo $id;?>">Delete</a></td>

        </tr>
<?php } } ?> 
<!-- Function1 END -->


<?php
   function AhliTalyplar(){
        $connect = mysqli_connect('localhost','root','','oguzhan');
        $query = "SELECT * FROM agzalar where derejesi='talyp' and topary=0 order by id desc";
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
        $kursy = $row['kursy'];
        $suraty = $row['suraty'];
        
?>

    <tr>
         <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $fakultet; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $kursy; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>

        <td class="back"><a onClick="javascript: return confirm('<?php echo $Java ; ?>');" class="delete" href="index.php?page=TpTassyksyzlar&id=<?php echo $id;?>">Delete</a></td>

    </tr>

<?php } } ?>     
