<?php  ob_start(); session_start();
$connect = mysqli_connect('localhost','root','','oguzhan');
@$id_user=$_SESSION['id'];
@$username = $_COOKIE["username"];
@$password = $_COOKIE["password"];
@$logged = $_SESSION['loginAUTHO'];
if(empty($id_user) && empty($username) && empty($username) && empty($logged)){
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
        $query = "SELECT * FROM agzalar where id=$id_user and username = '$user' and password = '$pass' "; 
    }
    $result = mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $id_user = $row['id'];
    $derejesi = $row['berlen_derejesi'];
    $username = $row['username'];
    $Talyp_Mugall = $row['derejesi'];
    $suraty = $row['suraty'];
    $topary = $row['topary'];
    $user_fakulteti = $row['fakulteti'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EN&TM sözlük</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php if(isset($_REQUEST['style'])){
         $style = $_REQUEST['style'];
         if($style=='soz_gos'){ ?>
    <link rel="stylesheet" type="text/css" media="screen" href="style/soz_gos.css" />
         <?php } }else{ ?>
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css" />
          <?php  } ?>
    <link rel="shortcut icon" href="icons/vocabulary.png" type="image/x-icon" />      
</head>
<body>
    <?php include('functions/header.php'); ?>

<div class="mainDIV">
    <div class="left">
        <?php include('functions/leftSide.php'); ?>

        <?php include('functions/middle.php'); ?>        

    </div>
    

    <div class="right">
        <?php include('functions/rightSide.php'); ?>  
    </div>
    
</div>

    

</body>
</html>