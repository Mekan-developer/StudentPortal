<?php  
 $connect = mysqli_connect('localhost','root','','oguzhan');
 $query = "SELECT * FROM agzalar where fakulteti = '$fakulteti' and derejesi='mugallym' and topary !=0";
 $result = mysqli_query($connect,$query);
 $row_mugallym = mysqli_num_rows($result);


 $query = "SELECT * FROM agzalar where fakulteti = '$fakulteti' and derejesi='mugallym' and topary = 0";
 $result = mysqli_query($connect,$query);
 $row_tassyksyz_mugallymlar = mysqli_num_rows($result);

 $query = "SELECT * FROM agzalar where fakulteti = '$fakulteti' and berlen_derejesi=3 and derejesi='mugallym'";
 $result = mysqli_query($connect,$query);
 $row_yolbascy = mysqli_num_rows($result);//birinji bolek ended

  $query = "SELECT * FROM agzalar where fakulteti = '$fakulteti' and derejesi='talyp' and topary !=0";
 $result = mysqli_query($connect,$query);
 $row_talyp = mysqli_num_rows($result);


 $query = "SELECT * FROM agzalar where fakulteti = '$fakulteti' and berlen_derejesi=4 and derejesi='talyp'";
 $result = mysqli_query($connect,$query);
 $row_starysta = mysqli_num_rows($result);

  $query = "SELECT * FROM agzalar where fakulteti = '$fakulteti' and derejesi='talyp' and (berlen_derejesi=1 || berlen_derejesi=2 || berlen_derejesi=3)";
 $result = mysqli_query($connect,$query);
 $row_gurnakcylar = mysqli_num_rows($result);

 $query = "SELECT * FROM agzalar where fakulteti = '$fakulteti' and derejesi='talyp' and topary = 0";
 $result = mysqli_query($connect,$query);
 $row_tassyksyz_talyplar = mysqli_num_rows($result);//2-nji bolek ended

 $query = "SELECT * FROM postlar where degisli_fakulteti = '$fakulteti'";
 $result = mysqli_query($connect,$query);
 $row_bildirisler = mysqli_num_rows($result);

 $query = "SELECT * FROM news where degisli_fakulteti = '$fakulteti'";
 $result = mysqli_query($connect,$query);
 $row_tazelikler = mysqli_num_rows($result);


 $query = "SELECT * FROM vocabulary where degisli_fakulteti = '$fakulteti' and tassyklananmy='howwa'";
 $result = mysqli_query($connect,$query);
 $row_sozler = mysqli_num_rows($result);
?>



<div class="top">
	<div class="container">
		<div class="info"><?php echo  $row_mugallym;?>-mugallym</div>
		<div class="info"><?php echo  $row_yolbascy;?>-ýolbaşçy</div>
		<div class="info last"><?php echo  $row_tassyksyz_mugallymlar;?>-tassyklanmadyk</div>
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


<div class="bottom">

</div>