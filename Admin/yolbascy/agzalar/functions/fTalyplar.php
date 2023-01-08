<!-- Talyplar Start -->
<?php
function TpSearch($var){
			$ady = $_POST['search'];	
			$connect = mysqli_connect('localhost','root','','oguzhan');		
            $query = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti = '$var' and berlen_derejesi !=4 and topary !=0 and name like '$ady%'";
            $result = mysqli_query($connect,$query);
            $id_count=0;$TassyklananDerejesi='';
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $name = $row['name'];
            $surname = $row['surname'];
            $hunari = $row['hunari'];
            $topary = $row['topary'];
            $suraty = $row['suraty'];
            $tassyknama = $row['berlen_derejesi'];
        if($tassyknama == 0){$TassyklananDerejesi='talyp';}else if($tassyknama == 4){$TassyklananDerejesi='starsta';}
        else{$TassyklananDerejesi='gurnakçy';}
        ?>

        <tr>
            <td><?php echo $id_count ;  ?></td>
            <td><?php echo $name ; ?></td>
            <td><?php echo $surname; ?></td>
            <td><?php echo $hunari; ?></td>
            <td><?php echo $topary; ?></td>
            <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
            <td><?php echo $TassyklananDerejesi; ?></td>

            <td class="back"><a  href="index.php?page=talyplar&update=talyp&id=<?php echo $id;?>">talyp</a></td>
            <td class="back"><a  href="index.php?page=talyplar&update=gurnak&id=<?php echo $id;?>">gurnakçy</a></td>

        </tr>
<?php } } ?> 


<?php
   function AhliTalyplar($var){
   	$connect = mysqli_connect('localhost','root','','oguzhan');
    $query = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti = '$var' and berlen_derejesi !=4 and topary !=0 order by id desc";
    $result = mysqli_query($connect,$query);
    $id_count=0;$TassyklananDerejesi='';
    while($row = mysqli_fetch_assoc($result)){
	    $id = $row['id']; $id_count++;  
	    $name = $row['name'];
	    $surname = $row['surname'];
	    $hunari = $row['hunari'];
	    $topary = $row['topary'];
	    $suraty = $row['suraty'];
	    $tassyknama = $row['berlen_derejesi'];
	    if($tassyknama == 0){$TassyklananDerejesi='Talyp';}else if($tassyknama == 4){$TassyklananDerejesi='starsta';}
        else{$TassyklananDerejesi='Gurnakcy';}
?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $topary; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        <td><?php echo $TassyklananDerejesi; ?></td>
        
        <td class="back"><a  href="index.php?page=talyplar&update=talyp&id=<?php echo $id;?>">talyp</a></td>
        <td class="back"><a  href="index.php?page=talyplar&update=gurnak&id=<?php echo $id;?>">gurnakçy</a></td>

    </tr>

<?php } } ?>     
<!-- Talyplar End -->

