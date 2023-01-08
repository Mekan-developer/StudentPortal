<?php
function MgSearch($user_fakulteti){
            $ady = $_POST['search'];  
            $connect = mysqli_connect('localhost','root','','oguzhan');     
            $query = "SELECT * FROM agzalar where derejesi='mugallym' and fakulteti = '$user_fakulteti' and topary=0 and name LIKE '$ady%'";
            $result = mysqli_query($connect,$query);
            $id_count=0;
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $name = $row['name'];
            $surname = $row['surname'];
            $ady = $name." ".$surname;
            $hunari = $row['hunari'];
            $suraty = $row['suraty'];
        ?>

        <tr>
            <td><?php echo $id_count ;  ?></td>
            <td><?php echo $name ; ?></td>
            <td><?php echo $surname; ?></td>
            <td><?php echo $hunari; ?></td>
            <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty; ?>"></a></td>
            <td>Tassyklanmadyk</td>

        <td class="back"><a href="index.php?page=MgTassyksyzlar&update=mug&id=<?php echo $id;?>">mugallym</a></td>
        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  udalit etmekçimi!');" class="delete" href="index.php?page=MgTassyksyzlar&update=delete&id=<?php echo $id;?>">delete</a></td>
        </tr>
<?php } } ?> 
<!-- Function1 END -->


<?php
   function AhliTassyksyzlar($user_fakulteti){ 
        $connect = mysqli_connect('localhost','root','','oguzhan');
        $query = "SELECT * FROM agzalar where derejesi = 'mugallym' and fakulteti = '$user_fakulteti' and topary = 0 order by id desc";
        $result = mysqli_query($connect,$query);
        $id_count=0;$TassyklananDerejesi='';
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++;  
        $name = $row['name'];
        $surname = $row['surname'];
        $ady = $name." ".$surname;
        $hunari = $row['hunari'];
        $suraty = $row['suraty'];
?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        <td>Tassyklanmadyk</td>
        
        <td class="back"><a href="index.php?page=MgTassyksyzlar&update=mug&id=<?php echo $id;?>">mugallym</a></td>
        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  udalit etmekçimi!');" class="delete" href="index.php?page=MgTassyksyzlar&update=delete&id=<?php echo $id;?>">delete</a></td>

    </tr>

<?php } } ?>     
<!-- Mugallymlar END -->