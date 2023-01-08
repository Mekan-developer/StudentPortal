<?php
function TpSearch($var,$var2){
            $ady = $_POST['search'];  
            $connect = mysqli_connect('localhost','root','','oguzhan');     
            $query = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti = '$var' and topary=0 and kursy = $var2 and name like '$ady%'";
            $result = mysqli_query($connect,$query);
            $id_count=0;
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $name = $row['name'];
            $surname = $row['surname'];
            $ady = $name." ".$surname;
            $hunari = $row['hunari'];
            $kursy = $row['kursy'];
            $suraty = $row['suraty'];
?>

    <tr>
         <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $kursy; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        
        <td class="back" style="white-space: nowrap;"><a onClick="javascript: return confirm('Hakykatdanda <?php echo $ady; ?>  siziň topardaşyňyzmy?');" href="index.php?page=tassyksyzlar&topardasyn=<?php echo $id;?>">Toparyňa all</a></td>  
        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  udalit etmekçimi!');" class="delete" href="index.php?page=tassyksyzlar&update=delete&id=<?php echo $id;?>">Delete</a></td>

        </tr>
<?php } } ?> 
<!-- Function1 END -->


<?php
   function AhliTalyplar($var,$var2){
        $connect = mysqli_connect('localhost','root','','oguzhan');
        $query = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti = '$var' and topary=0 and kursy = $var2 order by id desc";
        $result = mysqli_query($connect,$query);
        $id_count=0;$TassyklananDerejesi='';

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++;  
        $name = $row['name'];
        $surname = $row['surname'];
        $ady = $name." ".$surname;
        $hunari = $row['hunari'];
        $kursy = $row['kursy'];
        $suraty = $row['suraty'];
        
?>

    <tr>
         <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $kursy; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>

        <td class="back" style="white-space: nowrap;"><a onClick="javascript: return confirm('Hakykatdanda <?php echo $ady; ?>  siziň topardaşyňyzmy?');" href="index.php?page=tassyksyzlar&topardasyn=<?php echo $id;?>">Toparyňa all</a></td>        
        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  udalit etmekçimi!');" class="delete" href="index.php?page=tassyksyzlar&update=delete&id=<?php echo $id;?>">Delete</a></td>

    </tr>

<?php } } ?>  



