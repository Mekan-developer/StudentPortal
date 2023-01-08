<?php  
 $connect = mysqli_connect('localhost','root','','oguzhan');
 $query = "SELECT * FROM agzalar where derejesi='mugallym' and topary !=0";
 $result = mysqli_query($connect,$query);
 $row_mugallym = mysqli_num_rows($result);

 $query = "SELECT * FROM agzalar where derejesi='mugallym' and berlen_derejesi = 1";
 $result = mysqli_query($connect,$query);
 $row_dekan = mysqli_num_rows($result);

 $query = "SELECT * FROM agzalar where berlen_derejesi=3 and derejesi='mugallym'";
 $result = mysqli_query($connect,$query);
 $row_yolbascy = mysqli_num_rows($result);//birinji bolek ended

  $query = "SELECT * FROM agzalar where derejesi='talyp' and topary !=0";
 $result = mysqli_query($connect,$query);
 $row_talyp = mysqli_num_rows($result);

 $query = "SELECT * FROM agzalar where berlen_derejesi=4 and derejesi='talyp'";
 $result = mysqli_query($connect,$query);
 $row_starysta = mysqli_num_rows($result);

  $query = "SELECT * FROM agzalar where derejesi='talyp' and (berlen_derejesi=1 || berlen_derejesi=2 || berlen_derejesi=3)";
 $result = mysqli_query($connect,$query);
 $row_gurnakcylar = mysqli_num_rows($result);

 $query = "SELECT * FROM agzalar where derejesi='talyp' and topary = 0";
 $result = mysqli_query($connect,$query);
 $row_tassyksyz_talyplar = mysqli_num_rows($result);//2-nji bolek ended

 $query = "SELECT * FROM postlar";
 $result = mysqli_query($connect,$query);
 $row_bildirisler = mysqli_num_rows($result);

 $query = "SELECT * FROM news";
 $result = mysqli_query($connect,$query);
 $row_tazelikler = mysqli_num_rows($result);

 $query = "SELECT * FROM vocabulary where tassyklananmy='howwa'";
 $result = mysqli_query($connect,$query);
 $row_sozler = mysqli_num_rows($result);
?>
<div class="top">
	<div class="container">
		<div class="info"><?php echo  $row_mugallym;?>-mugallym</div>
		<div class="info"><?php echo  $row_dekan;?>-dekan</div>
		<div class="info last"><?php echo  $row_yolbascy;?>-ýolbaşçy</div>
	</div>
	<div class="container">
		<div class="info"><?php echo  $row_talyp;?>-talyp</div>
		<div class="info"><?php echo  $row_starysta;?>-starsta</div>
		<div class="info"><?php echo  $row_gurnakcylar;?>-gurnakçy</div>
		<div class="info last"><?php echo  $row_tassyksyz_talyplar;?>-tassyklanmadyk</div>
	</div>
	<div class="container">
		<div class="info"><?php echo  $row_bildirisler;?>-täzelik</div>
		<div class="info"><?php echo  $row_tazelikler;?>-TITU täzelik</div>
		<div class="info last"><?php echo  $row_sozler;?>-söz</div>
	</div>
</div>


<?php
function fakultetler($var,$var2){ 
	 $connect = mysqli_connect('localhost','root','','oguzhan');
	 $query = "SELECT * FROM agzalar where fakulteti = '$var' and derejesi='mugallym' and topary !=0";
	 $result = mysqli_query($connect,$query);
	 $row_mugallym = mysqli_num_rows($result);

	 $query = "SELECT * FROM agzalar where fakulteti = '$var' and derejesi='talyp' and topary !=0";
	 $result = mysqli_query($connect,$query);
	 $row_talyp = mysqli_num_rows($result);

	 $query = "SELECT * FROM postlar where degisli_fakulteti = '$var'";
	 $result = mysqli_query($connect,$query);
	 $row_bildirisler = mysqli_num_rows($result);

	 $query = "SELECT * FROM news where degisli_fakulteti = '$var'";
	 $result = mysqli_query($connect,$query);
	 $row_tazelikler = mysqli_num_rows($result);

	 $query = "SELECT * FROM vocabulary where degisli_fakulteti = '$var' and tassyklananmy='howwa'";
	 $result = mysqli_query($connect,$query);
	 $row_sozler = mysqli_num_rows($result);
	 ?>
   <div class="container border <?php echo $var2;?>">
		<div class="inf"><?php echo $row_mugallym;?>-mugallym</div>
		<div class="inf"><?php echo $row_talyp;?>-talyp</div>
		<div class="inf"><?php echo $row_bildirisler;?>-täzelik</div>
		<div class="inf"><?php echo $row_tazelikler;?>-TITU täzelik</div>
		<div class="inf last"><?php echo $row_sozler;?>-söz </div>
	</div>

<?php }  ?>


<?php
	$fact1 = 'kompýuter ylymlary we maglumat tehnologiýalary'; $facult1 ='mag';
	$fact2 = 'himiki we nanotehnologiýalar'; $facult2 ='himya';
	$fact3 = 'biotehnologiýalar we ekologiýa'; $facult3 ='bio';
	$fact4 = 'innowasiýalaryň ykdysadyýeti'; $facult4 ='inno';
	$fact5 = 'kiberfiziki ulgamalar'; $facult5 ='awto';
?>
<div class="bottom">
	<?php fakultetler($fact1,$facult1); ?>
	<?php fakultetler($fact2,$facult2); ?>
	<?php fakultetler($fact3,$facult3); ?>
	<?php fakultetler($fact4,$facult4); ?>
	<?php fakultetler($fact5,$facult5); ?>
</div>
