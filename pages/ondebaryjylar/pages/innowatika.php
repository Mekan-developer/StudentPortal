<?php
function myFunction($var){

    while($row = mysqli_fetch_assoc($var)){ 
    $name = $row['name'];
    $surname = $row['surname'];
    $gurnakcynyn_ady = $name." ".$surname;
    $hunari = $row['hunari'];
    $kursy = $row['kursy'];
    $topary = $row['topary'];
    $suraty = $row['suraty'];
    $tassyknama = $row['berlen_derejesi'];
    if($tassyknama == 3){$TassyklananDerejesi='Active Student';}
    else{$TassyklananDerejesi='Active Student*';}

?>

<div class="student">
<div class="surat"><img src="../../register/img/<?php echo $suraty;?>"></div>
<div class="data">
    <div class="name font"><?php echo $gurnakcynyn_ady;  ?></div>
    <div class="profession font hunar"><?php echo $hunari;?></div>
    <div class="topary font Topar"><?php echo $topary;?></div>
    <div class="activeStudent font ActiveStudent"><?php echo $TassyklananDerejesi;?></div>
</div>
</div>

<?php } } ?>


<?php
$connect = mysqli_connect('localhost','root','','oguzhan');

$query1 = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti='innowasiýalaryň ykdysadyýeti' and baly !=0 and berlen_derejesi != 3 ORDER BY baly DESC LIMIT 0,4";
$result1 = mysqli_query($connect,$query1);

$query2 = "SELECT * FROM agzalar where derejesi='talyp' and fakulteti='innowasiýalaryň ykdysadyýeti' and berlen_derejesi=3";
$result2 = mysqli_query($connect,$query2);

$id_count=0;$TassyklananDerejesi='';

myFunction($result1);
myFunction($result2);