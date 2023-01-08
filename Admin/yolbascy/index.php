<?php  ob_start(); session_start();
$connect = mysqli_connect('localhost','root','','oguzhan');
global $connect; 
@$id=$_SESSION['id'];
@$username = $_COOKIE["username"];
@$password = $_COOKIE["password"];
@$logged = $_SESSION['loginAUTHO'];
if(empty($id) && empty($username) && empty($username) && empty($logged)){
   header("Location:../../login/");
}else{
$query = "SELECT * FROM agzalar where username = '$username' and password = '$password'";
$result = mysqli_query($connect,$query);
$userSany = mysqli_num_rows($result);

}


if($userSany>0 or $logged == 'loged_in'){
    if($logged == 'loged_in'){
        $user = $_SESSION['username'];
        $pass = $_SESSION['password'];
        $query = "SELECT * FROM agzalar where id=$id and username = '$user' and password = '$pass' "; 
    }
    global $fakulteti;global $user_id;
    $result = mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $derejesi = $row['berlen_derejesi'];
    $Talyp_Mugall = $row['derejesi'];
    if($derejesi !=3  && $Talyp_Mugall != 'mugallym'){header("Location:../../login/");}
    $user_id = $row['id'];
    $username = $row['username'];
    $suraty = $row['suraty'];
    $fakulteti = $row['fakulteti'];

} 

$sahypa = 'defoult';
if(isset($_GET['page'])){
	$sahypa = $_GET['page'];
	if($sahypa == 'yolbascy'){$sahypa = 'defoult';}
	else if($sahypa == 'zamDekan'){$sahypa = 'defoult';}
	else if($sahypa == 'yolbascylar'){$sahypa = 'defoult';}
	else if($sahypa == 'YokaryGurnakcylar'){$sahypa = 'defoult';}
	else if($sahypa == 'AralykGurnakcylar'){$sahypa = 'defoult';}
	else if($sahypa == 'PesGurnakcylar'){$sahypa = 'defoult';}
	else if($sahypa == 'bildirish_gosh'){$sahypa = 'defoult';}
	else if($sahypa == 'tazelik_gos'){$sahypa = 'defoult';}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>ýolbaşçy</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="shortcut icon" href="icons/shortcut.png" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div class="header">
			<?php if($sahypa == 'defoult'){ ?>
            <ul class="USN">
                <li class="liFLEX"> 
                    <form autocomplete="off" method="post" action="#">
                    <div class="searchStudents"></div>
                </form>
                <label for="togg"> <a class="showUSR"><?php echo $username; ?></a></label>
            </li>
                <input type="checkbox" id="togg">
                   <div class="hidd_DEFOULT hidd">
                       <center>
                       <a href="#">my profile</a>
                       <a href="../../login/index.php?cookieClean">log out</a>
                       </center>
                   </div> 
            </ul> 
			<?php }else{ ?>
			<ul class="USN ">
            <li class="liFLEX"> 
                    <form autocomplete="off" method="post" action="index.php?page=<?php echo $sahypa;?>">
                    <div class="searchStudents">
                    	<input placeholder="Gözleg" type="text" name="search">
                    	<input type="submit" name="submit" value="">
                    </div>
                </form>
                <label for="togg"> <a class="showUSR"><?php echo $username; ?></a></label>
            </li>
            <input type="checkbox" id="togg">
			                   
			                   <div class="hidd">
			                       <center>
			                       <a href="#">my profile</a>
			                       <a href="../../login/index.php?cookieClean">log out</a>
			                       </center>
			                   </div> 

        </ul> 

        <?php } ?>      
		<div class="usrImg cover"></div>
	</div>
<style>    
    .usrImg{ background-image: url(../../register/img/<?php echo $suraty;?>) }       
</style>






	
	<div class="mainContainer">
		<div class="navigation">
			<center><a href="index.php"><img class="yolbascy" src="icons/yolbascy.png"></a></center>
			<div>
	            <label for="nav1"><img class="teach size" src="icons/navBar.png">Mugallymlar</label>
	            <input id="nav1" type="checkbox">
	                <div class="hidden1 hidden">
	                    <a href="index.php?page=mugallymlar">Ähli mugallymlar</a><br>
	                    <a href="index.php?page=yolbascylar">Ýolbaşçylar</a><br>
	                    <a href="index.php?page=MgTassyksyzlar">Tassyklanmadyklar</a><br>
	                </div>
            </div>

            <div>
	            <label for="nav2"><img class="teach size" src="icons/navBar.png">Talyplar</label>
	            <input id="nav2" type="checkbox">
	                <div class="hidden2 hidden">
	                    <a href="index.php?page=talyplar">Ähli talyplar</a><br>
	                    <a href="index.php?page=gurnakcylar">Gurnakçylar</a><br>
	                    <a href="index.php?page=YokaryGurnakcylar">Ýokary derejeli</a><br>
	                    <a href="index.php?page=AralykGurnakcylar">Aralyk derejeli</a><br>
	                    <a href="index.php?page=PesGurnakcylar">Pes derejeli</a><br>
	                </div>
            </div>
            <div>
	            <label for="nav3"><img class="teach size" src="icons/navBar.png">Täzelikler</label>
	            <input id="nav3" type="checkbox">
	                <div class="hidden3 hidden">
	                    <a href="index.php?page=bildirishler">Täzelikler</a><br>
	                    <a href="index.php?page=bildirish_gosh">Täzelik goş</a><br>
	                 <!--    <a href="index.php?page=mugallymlar">Goşanlarym</a><br> -->
	                </div>
            </div>
           
            <div>
	            <label for="nav4"><img class="teach size" src="icons/navBar.png">TITU-täzelikler</label>
	            <input id="nav4" type="checkbox">
	                <div class="hidden4 hidden">
	                    <a href="index.php?page=tazelikler">TITU-täzelikler</a><br>
	                    <a href="index.php?page=tazelik_gos">Täzelik goş</a><br>
	                    <!-- <a href="index.php?page=mugallymlar">Goşanlarym</a><br> -->
	                </div>
            </div>
            <div>
	            <label for="nav5"><img class="teach size" src="icons/navBar.png">Sözlük</label>
	            <input id="nav5" type="checkbox">
	                <div class="hidden5 hidden">
	                    <a href="index.php?page=sozluk">Ähli sözler</a><br>
	                    <a href="index.php?page=sozlukMg">Rugsatsyz sözler mg</a><br>
	                    <a href="index.php?page=sozlukTp">Rugsatsyz sözler tp</a><br>
	                </div>
            </div>		
		</div>


		<div class="mainBody">
			
            <?php
				@$link=$_GET['page'];

				switch($link){
					case 'mugallymlar':include("agzalar/mugallymlar.php");break;
					case 'yolbascylar':include("agzalar/yolbascylar.php");break;
					case 'MgTassyksyzlar':include("agzalar/tassyklanmadyklar.php");break;



					case 'talyplar':include("agzalar/talyplar.php"); break;
					case 'gurnakcylar':include("agzalar/gurnakcylar/gurnakcylar.php"); break;
					case 'AralykGurnakcylar':include("agzalar/gurnakcylar/AralykGurnakcylar.php"); break;
					case 'YokaryGurnakcylar':include("agzalar/gurnakcylar/YokaryGurnakcylar.php"); break;
					case 'PesGurnakcylar':include("agzalar/gurnakcylar/PesGurnakcylar.php"); break;


					case 'bildirishler':include("bildirisler/bildirishler.php");break;         
				    case 'bildirish_gosh':include("bildirisler/bildirish_gosh.php");break;
					case 'tazelikler':include("tazelikler/tazelikler.php");break; 
					case 'tazelik_gos':include("tazelikler/tazelik_gos.php");break;



					case 'sozluk':include("sozluk/sozluk.php");break; 
					case 'sozlukMg':include("sozluk/rugsatsyz_sozler_mg.php");break; 
					case 'sozlukTp':include("sozluk/rugsatsyz_sozler_tp.php");break;     
					       
					default: include('functions/chart.php');break;
				}
			?>

		</div>
		
	</div>

</body>
</html>