<?php ob_start(); $connect = mysqli_connect("localhost","root","","oguzhan"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style/style1.css">
	<title>Hasap döredilýän sahypa</title>
</head>
<body>
               
<div class="flex">
	<div class="left">
         <div class="eduIMG"></div>
	</div>

	<div class="right">
          <div class="descIMG">
               
				<form autocomplete="off" method="post" action="index.php" enctype="multipart/form-data" >
					<span class="OGUZHAN">OGUZHAN</span>

				<div class="setir">
				<input type="text" name="name" required placeholder="Adyňyz:"  value=<?php if(!empty($_POST['name']))echo $_POST['name'];  ?>>
				<input type="text" name="surname" placeholder="Familýaňyz:" required value=<?php if(!empty($_POST['surname']))echo $_POST['surname'];?>>
				</div>
				<input type="text" name="username" placeholder="Ulanyjy adyňyz:" required value=<?php if(!empty($_POST['username']))echo $_POST['username'];?>>
				<div class="setir">	
				<input type="password" name="passwordOne" placeholder="Parolyňyz:" required value=<?php if(!empty($_POST['passwordOne']))echo $_POST['passwordOne'];?>>
				<input type="password" name="passwordTwo" placeholder="Tassyklaň:" required value=<?php if(!empty($_POST['passwordTwo']))echo $_POST['passwordTwo'];?>>
				</div>

                    <?php if(isset($_POST['faculty'])){ ?>
                       <input type="hidden" name="hidden1" value="<?php echo $_POST['faculty'];?>">
                    <?php  } ?>


				<select  class="facult" name="faculty">
					<option selected disabled><?php if(isset($_POST['faculty'])){ echo $_POST['faculty']; }else {?>Fakultetiňizi saýlaň!<?php }?></option>

				<?php  
				    $query = "SELECT * FROM fakultetler";
				    $result = mysqli_query($connect,$query);
				    while($row = mysqli_fetch_assoc($result)){
				    	$id_fakultet = $row['id'];
				    	$fakultet = $row['fakultet'];
				    	?>
				    	<option class="select" value="<?php echo $fakultet; ?>">
						<?php echo $fakultet; ?>
				        </option>
				       

				<?php   } ?>

				</select>

				<label for="img" ><center>suratyňyzy saýlaň!</center></label>
				<input id="img" type="file" name="surat" class="file_upload"  value="">


				<div class="setirBTN">
					<!-- Talyp -->
					<div class="radioBTN">	
					<input id="ok1" type="radio" checked name="MgTp" value="talyp">
					<label for="ok1">Talyp</label>	

					<div class="setir checkedTp">

						<?php if(isset($_POST['tpHunar'])){ ?>
                              <input type="hidden" name="hidden2" value="<?php echo $_POST['tpHunar'];?>">
                        <?php  } ?>


						<select name="tpHunar" >

						<option selected disabled><?php if(isset($_POST['tpHunar'])){ echo $_POST['tpHunar']; }else{?>Hünäriňizi saýlaň!<?php }?></option>

						<?php  
						$query = "SELECT * FROM hunarler";
						$result = mysqli_query($connect,$query);
						while($row = mysqli_fetch_assoc($result)){
						      $id_hunar = $row['id'];
                        $fakultet_id = $row['fakultet_id'];
						      $hunar = $row['hunar_ady'];
						?>
						    <option value="<?php echo $hunar; ?>">
						         <?php echo $hunar; ?>
						    </option>
						    
						<?php   } ?>

						</select>

						<select name="kurs" >
							<option selected <?php if(!empty($_POST['kurs'])){echo "value=".$_POST['kurs'];}else{echo 'disabled';}?>><?php if(!empty($_POST['kurs'])){echo "<center>".$_POST['kurs']."</center>";}else{echo "Kursuňyzy saýlaň"; }?></option>
							<option value="0">LLD</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</div>
					<!-- Talyp -->
					<!-- Mugallym -->
					</div>
					<div class="radioBTN">	
						<input id="ok2" type="radio" name="MgTp" value="mugallym">
						<label for="ok2">Mugallym</label>
						<input class="checkedMg" type="text" name="MugHunar" placeholder="Hunariňizi giriziň:">
					</div>   
					<!-- Mugallym -->
				</div>
				<a class="HasapLink" href="../login/index.php">öz hasabyňa gir!</a>
				<input type="submit" name="submit" value="HASAP AÇ">

				</form>
			</div>	
			<div class="resposiveIMG"></div>

          </div>
	</div>	

</body>
</html>

<?php

if(isset($_POST['submit'])){
	session_start();
	$username = $_POST['username'];
	$userNameCount=0;
	$connect = mysqli_connect('localhost','root','','oguzhan');


	// Username basga birininka gabat gelmezligi un
	$query = "SELECT * FROM agzalar";
	$result = mysqli_query($connect,$query);
	while($row = mysqli_fetch_assoc($result)){
		$user = $row['username'];
		if($username == $user){
			
	        $userNameCount++;break;
		}
 }
 
 // Username basga birininka gabat gelmezligi un 
 if($userNameCount !=0 ){echo"<script>alert('Girizen ulanyjy adyňyz ulanylýar!')</script>";}else{
	$userpassword = $_POST['passwordOne'];
	$userpasswordTwo = $_POST['passwordTwo'];

	if($userpassword !=$userpasswordTwo){
		echo"<script>alert('Koduňuzy nädogry girizdiňiz!')</script>";
	}else{
		  $derejesi = $_POST['MgTp'];
	if($derejesi == 'talyp'){
		$hidden2 = $_POST['hidden2'];
		$hunari = $_POST['tpHunar'];
		$kursy = $_POST['kurs'];


		if(empty($hunari)){
		    if(!empty($hidden2)){$hunari = $hidden2;}else{echo"<script>alert('Hünäriňizi saýlamadyňyz!')</script>";}
		}else  if(empty($kursy)){echo"<script>alert('Kursuňyzy saýlamadyňyz!')</script>";}

	   	
	}else if($derejesi == 'mugallym'){
		    $hunari = $_POST['MugHunar'];
		    $kursy = 0;
	}



	$ady = $_POST['name'];
	$fam = $_POST['surname'];
	$fakulteti = $_POST['faculty'];
	$hidden1 = $_POST['hidden1'];
	
	// Adynyzy,kursunyzy, fakultetinizi,
    if(empty($ady)){echo"<script>alert('Adyňyzy girizmediňiz!')</script>";}else if(empty($fam)){echo"<script>alert('Familýaňyzy girizmediňiz!')</script>";}

    if(empty($fakulteti)){
    	if(!empty($hidden1)){$fakulteti = $hidden1;}else{echo"<script>alert('Fakultetiňizi saýlamadyňyz!')</script>";}
    }




	$place_img = $_FILES['surat']['tmp_name'];
	if(empty($place_img)){echo"<script>alert('Suratyňyzy saýlamadyňyz!')</script>";die();}
    $newfilename =date('dmYHis').str_replace(" ", "", basename($_FILES["surat"]["name"]));
	move_uploaded_file($place_img,"img/" . $newfilename);

	$query = "INSERT INTO agzalar(name,surname,username,password,fakulteti,hunari,kursy,suraty,derejesi) VALUES ('$ady','$fam','$username','$userpassword','$fakulteti','$hunari',$kursy,'$newfilename','$derejesi')";

	    $result = mysqli_query($connect,$query);
	    if(!$result){
	    	die("baza maglumat gitmedi".musqli_error($connect));
	    }else{   
    		$id = mysqli_insert_id($connect);
            $_SESSION['id']=$id;  $_SESSION['loginAUTHO'] = 'loged_in';
        	$_SESSION['username'] = $username;
        	$_SESSION['password'] = $userpassword;
    		header("Location:../pages/habarlar/index.php"); 
	    }
	  }//Password denesdiyan else
	}//Username barlayan if
	ob_end_flush();
}//submit
   
?>
