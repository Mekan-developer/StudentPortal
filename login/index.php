<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>Hasabyňa girmek uçin sahypa</title>
</head>
<body>

	<div class="flex">

		<div class="left">
             <div class="studentsIMG"></div>
		</div>

		<div class="right">

			<div class="container">

				<div class="rightTopIMG"></div>
	            <center>
				<form autocomplete="off" method="post" action="index.php">
					
					<div class="icon"><input type="text" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>" name="username" placeholder="username:"><img class="usr" src="icons/usr.png"></div>
					<div class="icon"><input type="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" name="password" placeholder="password:"><img class="pass" src="icons/pass.png"></div>
					<div class="flexRemember">
						<div>
					    <input id="click" type="checkbox" name="rememberME">	
					    <label for="click">ýatda saklat!</label>
					    </div>
					    <a class="HasapLink" href="../register/index.php">Hasap aç!</a>
					</div>
					<input type="submit" name="submit" value="IÇERI GIR">
				</form>
				</center>

			</div>
			
		</div>
		
	</div>

</body>
</html>

<?php 
    session_start();
	$connect = mysqli_connect('localhost','root','','oguzhan');
	 @$user_name = $_SESSION['username'];
     @$passwor = $_SESSION['password'];
	$query = "SELECT * FROM agzalar where username ='$user_name' and password = '$passwor' ";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
    	$id = $row['id'];
		$_SESSION['id'] = $id; $_SESSION['loginAUTHO'] = 'loged_in';
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];
		header("Location:../pages/habarlar/index.php");
    }



?>


<?php
if(isset($_POST['submit'])){
	$connect = mysqli_connect('localhost','root','','oguzhan');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM agzalar where username ='$username' and password = '$password' ";
	$result = mysqli_query($connect,$query);
    
    $row = mysqli_fetch_assoc($result);
	if(!$row){
		echo"<script>alert('Ulanyjy adyňyzy ýa-da koduňyzy ýalňyş girizdiňiz!')</script>";

	}else{
		session_start();
		$id = $row['id'];
        if(!empty($_POST['rememberME'])){	
			$_SESSION['id'] = $id;
			setcookie('username',$username,time()+(60*60*24*365),'/');
			setcookie('password',$password,time()+(60*60*24*365),'/');
			header("Location:../pages/habarlar/index.php");
        }else{
        	$_SESSION['id'] = $id; $_SESSION['loginAUTHO'] = 'loged_in';
        	$_SESSION['username'] = $row['username'];
        	$_SESSION['password'] = $row['password'];
        	header("Location:../pages/habarlar/index.php");
        }
	}
}

// Log out un start
if(isset($_GET['cookieClean'])){
	// asakdakylar session fayllaryny ocuryar
	session_start();
	session_unset();
	session_destroy();
	// asaky coockie fayllaryny duybunden ocuryar
	unset($_COOKIE['username']);
	unset($_COOKIE['password']);
	setcookie('username','',time()-(60*60*24*365),'/');
	setcookie('password','',time()-(60*60*24*365),'/');
}
ob_end_flush();
?>