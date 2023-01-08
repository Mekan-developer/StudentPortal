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

 global $user_topary;
if($userSany>0 or $logged == 'loged_in'){
    if($logged == 'loged_in'){
        $user = $_SESSION['username'];
        $pass = $_SESSION['password'];
        $query = "SELECT * FROM agzalar where id=$id and username = '$user' and password = '$pass' "; 
    }
    $result = mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $derejesi = $row['berlen_derejesi'];
    $Talyp_Mugall = $row['derejesi'];
    if($derejesi!=4 && $Talyp_Mugall!='talyp'){header("Location:../../login/");}
    $user_id = $row['id'];

    $username = $row['username'];
    $suraty = $row['suraty'];
    $fakulteti = $row['fakulteti'];
    $user_topary = $row['topary'];
    $kursy = $row['kursy'];

} 

$sahypa = 'defoult';
if(isset($_GET['page'])){
	$sahypa = $_GET['page'];
	if($sahypa == 'yolbascy'){$sahypa = 'defoult';}
	else if($sahypa == 'ZamDekan'){$sahypa = 'defoult';}
	else if($sahypa == 'yolbascylar'){$sahypa = 'defoult';}
	else if($sahypa == 'ToparyňGosany'){$sahypa = 'defoult';}
	else if($sahypa == 'Tassyklanmadyklar'){$sahypa = 'defoult';}
	else if($sahypa == 'zamDekan'){$sahypa = 'defoult';}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Jogapkär talyp</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="shortcut icon" href="icons/shortcut.png" type="image/x-icon" />
</head>
<body>

	<div class="header">
			<?php if($sahypa == 'defoult'){ ?>
            <ul class="USN">
            	<li class="liFLEX">
            	<form autocomplete="off" method="post" action="index.php?page=<?php echo $sahypa;?>">
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
			<center><a href="index.php"><img class="starsta" src="icons/starsta.png"></a></center>
			<div>
	            <label for="nav1"><img class="teach size" src="icons/navBar.png">Mugallymlar</label>
	            <input id="nav1" type="checkbox">
	                <div class="hidden1 hidden">
	                    <a href="index.php?page=mugallymlar">Mugallymlar</a><br>
	                    <a href="index.php?page=yolbascylar">Ýolbaşçylar</a><br>
	                    <a href="index.php?page=ZamDekan">Zam dekan</a><br>
	                </div>
            </div>

            <div>
	            <label for="nav2"><img class="teach size" src="icons/navBar.png">Talyplar</label>
	            <input id="nav2" type="checkbox">
	                <div class="hidden2 hidden">
	                    <a href="index.php?page=talyplar">Talyplar</a><br>
	                    <a href="index.php?page=starstalar">starstalar</a><br>
	                    <a href="index.php?page=toparym">Öz toparyň</a><br>
	                    <a href="index.php?page=tassyksyzlar">Tassyklanmadyklar</a><br>
	                </div>
            </div>           
            <div>
	            <label for="nav3"><img class="teach size" src="icons/navBar.png">Sözlük</label>
	            <input id="nav3" type="checkbox">
	                <div class="hidden3 hidden">
	                    <a href="index.php?page=ToparyňGosany">Öz toparyňky</a><br>
                        <a href="index.php?page=Tassyklanmadyklar">Tassyklanmadyklar</a><br>
	                    
	                </div>
            </div>		
		</div>


		<div class="mainBody">

			<?php
				@$link=$_GET['page'];

				switch($link){
					case 'mugallymlar':include("mugallymlar/mugallymlar.php");break;
					case 'yolbascylar':include("mugallymlar/yolbascylar.php");break;
					case 'ZamDekan':include("mugallymlar/ZamDekanlar.php");break;



					case 'talyplar':include("talyplar/talyplar.php"); break;
					case 'starstalar':include("talyplar/starstalar.php"); break;
					case 'toparym':include("talyplar/toparym.php"); break;
					case 'tassyksyzlar':include("talyplar/TpTassyklanmadyklar.php"); break;




					case 'bildirishler':include("bildirishler/bildirisler.php");break;    
					case 'tazelikler':include("tazelikler/tazelikler.php");break;  


				    case 'ToparyňGosany':include("sozluk/Toparyňyň_sözlügi.php");break;
				    case 'Tassyklanmadyklar':include("sozluk/Tassyklanmadyklar.php");break;


					default: include('functions/chart.php');;break;
				}
			?>


		</div>
		
	</div>

</body>
</html>