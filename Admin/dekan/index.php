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
    global $fakulteti; global $user_fakulteti;
    $result = mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $derejesi = $row['berlen_derejesi'];
    $Talyp_Mugall = $row['derejesi'];
    if($derejesi!=1 && $Talyp_Mugall!='mugallym'){header("Location:../../login/");}
    $username = $row['username'];
    $suraty = $row['suraty'];
    $fakulteti = $row['fakulteti'];
    $user_fakulteti = $row['fakulteti'];

} 

$sahypa = 'defoult';
if(isset($_GET['page'])){
	$sahypa = $_GET['page'];
	if($sahypa == 'yolbascy'){$sahypa = 'defoult';}
	else if($sahypa == 'zamDekan'){$sahypa = 'defoult';}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Dekan</title>
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
			<center><a href="index.php"><img class="dekanAdmin" src="icons/Dekan.png"></a></center>
			<div>
	            <label for="nav1"><img class="teach size" src="icons/navBar.png">Mugallymlar</label>
	            <input id="nav1" type="checkbox">
	                <div class="hidden1 hidden">
	                    <a href="index.php?page=mugallymlar">Ähli mugallymlar</a><br>
	                    <a href="index.php?page=zamDekan">Zam dekanlar</a><br>
	                    <a href="index.php?page=yolbascy">Ýolbaşçylar</a><br>
	                    <a href="index.php?page=MgTassyklanmadyk">Tassyklanmadyklar</a><br>
	                </div>
            </div>

            <div>
	            <label for="nav2"><img class="teach size" src="icons/navBar.png">Talyplar</label>
	            <input id="nav2" type="checkbox">
	                <div class="hidden2 hidden">
	                    <a href="index.php?page=talyplar">Ähli talyplar</a><br>
	                    <a href="index.php?page=starstalar">Starstalar</a><br>
	                    <a href="index.php?page=gurnakcylar">Gurnakçylar</a><br>
	                    <a href="index.php?page=TpTassyklanmadyk">Tassyklanmadyklar</a><br>
	                </div>
            </div>
            <div>
	            <label for="nav3"><img class="teach size" src="icons/navBar.png">Habarlar</label>
	            <input id="nav3" type="checkbox">
	                <div class="hidden3 hidden">
	                    <a href="index.php?page=bildirisler">Täzelikller</a><br>
	                    <a href="index.php?page=tazelikler">TITU-täzelikller</a><br>
	                </div>
            </div>
           
            <div>
	            <label for="nav4"><img class="teach size" src="icons/navBar.png">Sözlük</label>
	            <input id="nav4" type="checkbox">
	                <div class="hidden4 hidden">
	                    <a href="index.php?page=sozluk">Ähli sözler</a><br>
	                    <a href="index.php?page=rugsatsyz_sozler_mg">Rugsatsyz sözler mg</a><br>
	                    <a href="index.php?page=rugsatsyz_sozler_tp">Rugsatsyz sözler tp</a><br>
	                </div>
            </div>		
		</div>



		<div class="mainBody">


			<?php
				@$link=$_GET['page'];

				switch($link){
					case 'mugallymlar':include("mugallymlar/mugallymlar.php");break;
					case 'zamDekan':include("mugallymlar/zamDekanlar.php");break;
					case 'yolbascy':include("mugallymlar/yolbascylar.php");break;
					case 'MgTassyklanmadyk':include("mugallymlar/Tassyklanmadyklar.php");break;




					case 'talyplar':include("talyplar/talyplar.php"); break;
					case 'starstalar':include("talyplar/starstalar.php"); break;
					case 'gurnakcylar':include("talyplar/gurnakcylar.php"); break;
					case 'TpTassyklanmadyk':include("talyplar/TpTassyklanmadyklar.php"); break;




					case 'bildirisler':include("bildirisler/bildirishler.php");break;         
					case 'tazelikler':include("tazelikler/tazelikler.php");break;   

				    case 'sozluk':include("sozluk/sozluk.php");break;
				    case 'rugsatsyz_sozler_mg':include("sozluk/rugsatsyz_sozler_mg.php");break;
                    case 'rugsatsyz_sozler_tp':include("sozluk/rugsatsyz_sozler_tp.php");break;

					default: include('functions/chart.php');;break;
				}
			?>

		</div>
		
	</div>

</body>
</html>