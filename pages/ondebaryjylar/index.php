<?php
$fact1 = 'kompýuter ylymlary we maglumat tehnologiýalary';
$fact2 = 'himiki we nanotehnologiýalar';
$fact3 = 'biotehnologiýalar we ekologiýa';
$fact4 = 'innowasiýalaryň ykdysadyýeti';
$fact5 = 'kiberfiziki ulgamalar';
?>

<?php  ob_start(); session_start();
$connect = mysqli_connect('localhost','root','','oguzhan');
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
    $result = mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $derejesi = $row['berlen_derejesi'];
    $username = $row['username'];
    $Talyp_Mugall = $row['derejesi'];
    $suraty = $row['suraty'];
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>* * * * * STUDENTS * * * * *</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css" />
    <link rel="shortcut icon" href="icons/student.png" type="image/x-icon" />
</head>
</head>
<body>
    <div class="header">
        <ul class="linkler">
            <li class="notActive"><a href="../habarlar/index.php">Habarlar</a></li>
            <li class="notActive"><a href="../sozluk/indexEN.php">Sözlük</a></li>
            <li class="active"><a href="../ondebaryjylar/index.php">Öňdebaryjylar</a></li>
            <!-- <li class="notActive"><a href="#" >Chat</a></li> -->
            <?php
                if($Talyp_Mugall=='mugallym'){
                    if($derejesi==1){echo "<li class='notActive'><a target='_blank' href='../../Admin/Dekan/'>Admin</a></li>";}
                    else if($derejesi==2){echo "<li class='notActive'><a target='_blank' href='../../Admin/zamDekan/'>Admin</a></li>";}
                    else if($derejesi==3){echo "<li class='notActive'><a target='_blank' href='../../Admin/yolbascy/'>Admin</a></li>";}
                }else if($Talyp_Mugall=='talyp'){
                    if($derejesi==4){echo "<li class='notActive'><a target='_blank' href='../../Admin/starsta/' >Admin</a></li>";}
                }if($derejesi==-100){echo "<li class='notActive'><a target='_blank' href='../../Admin/superAdmin/'>Admin</a></li>";}
            ?>
        </ul>
<?php   
if(!empty($_GET['page'])){ ?>
<ul class="USN">     
   <li class="liFLEX">  
        <form autocomplete="off" action="#" method="post">
                    <div class="searchStudents"></div>
        </form>     
    <label for="toggle1"> <a class="show"><?php echo @$username; ?></a></label>
   </li> 
    <input type="checkbox" id="toggle1">
   
    <div class="hidden">
       <center>
       <a href="#">my profile</a>
       <a href="../../login/index.php?cookieClean">log out</a>
       </center>
    </div> 

</ul>    
<?php }else{?>        
        <ul class="USN">
            <li class="liFLEX"> 
                
                <form autocomplete="off" action="index.php" method="post">
                <div class="searchStudents">
                    <input placeholder="Talyp gözle" class="tpSearch" type="text" name="tpName1">
                    <input type="submit" name="submit1" value=""></div>
                </form>

                <label for="toggle1"> <a class="show"><?php echo @$username; ?></a></label>
            </li>
            <input type="checkbox" id="toggle1">
           
            <div class="hidden">
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
    <div class="subHeader">
        <ul class="faculties">
<?php 
if(!empty($_GET['page'])){
    $active = $_GET['page'];
    $mut='';$him='';$bio='';$awto='';$inno='';
    if($active == 'MUT'){$mut = 'active';$fact = $fact1;}elseif($active == 'himiya'){$him = 'active';$fact = $fact2;}elseif($active == 'bio'){$bio = 'active';$fact = $fact3;}
    elseif($active == 'awtomatika'){$awto = 'active';$fact = $fact5;}elseif($active == 'innowatika'){$inno = 'active';$fact = $fact4;}
}
?>


            <li class="FacultyName <?php echo $mut; ?>"><a href="index.php?page=MUT">Maglumat ulgamlary</a></li>
            <li class="FacultyName <?php echo $him; ?> "><a href="index.php?page=himiya">Himiki tehnologiýalary</a></li>
            <li class="FacultyName <?php echo $bio; ?> "><a href="index.php?page=bio">Biotehnologiýa</a></li>
            <li class="FacultyName <?php echo $awto; ?> "><a href="index.php?page=awtomatika">Kiberfiziki ulgamlar</a></li>
            <li class="FacultyName <?php echo $inno; ?> "><a href="index.php?page=innowatika">Innowasiýalaryň ykdysadyýeti</a></li>
        </ul>
    </div>





 <div class="mainDIV">

<?php 

$quer = "SELECT * FROM agzalar where derejesi = 'talyp' and baly !=0 and berlen_derejesi != 3 ORDER BY baly DESC LIMIT 0,20";
function BalyPesi($var){
    $connect = mysqli_connect('localhost','root','','oguzhan');
    $result = mysqli_query($connect,$var);
    while($row = mysqli_fetch_assoc($result)){$baly = $row['baly'];}
    return $baly;
}
$Pes_bally = BalyPesi($quer);


if(isset($_POST['submit1']) && $_POST['tpName1'] !='' && $_POST['tpName1'] !=' ' ){
    $ady = $_POST['tpName1'];
    $TassyklananDerejesi='';
       $query = "SELECT * FROM agzalar where berlen_derejesi=3 and derejesi='talyp' and name LIKE '$ady%'";
       $query_ = "SELECT * FROM agzalar where derejesi = 'talyp' and baly >= $Pes_bally and berlen_derejesi != 3 and name LIKE '$ady%'";  
    
    function searching($var){
        $connect = mysqli_connect('localhost','root','','oguzhan');
        $res = mysqli_query($connect,$var);
        while($row = mysqli_fetch_assoc($res)){
            if(empty($row)){ $reslt = $res_; }
            $name = $row['name']; $surname = $row['surname'];
            $gurnakcynyn_ady = $name." ".$surname;
            $hunari = $row['hunari'];
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
            <div class="activeStudent font ActiveStudent"><a href="#"><?php echo $TassyklananDerejesi;?></a></div>
        </div>
        </div>

<?php       }
        }  //function 1      
        searching($query);
        searching($query_);
    } else if(!empty($_GET['page'])){
        $rout = $_GET['page'];
        if($rout == 'MUT'){ include('pages/maglumat.php');}
        else if($rout == 'himiya'){ include('pages/himiya.php'); }
        else if($rout == 'bio'){ include('pages/biologiya.php'); }
        else if($rout == 'awtomatika'){ include('pages/kiber_fizika.php'); }
        else if($rout == 'innowatika'){ include('pages/innowatika.php'); }
    }else{ 

$query1 = "SELECT * FROM agzalar where derejesi = 'talyp' and baly !=0 and berlen_derejesi != 3 ORDER BY baly DESC LIMIT 0,20";
$query2 = "SELECT * FROM agzalar where derejesi='talyp' and berlen_derejesi=3";

$id_count=0;$TassyklananDerejesi='';
function gurnakOndebaryjy($var){
    $connect = mysqli_connect('localhost','root','','oguzhan');
    $result = mysqli_query($connect,$var);
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['name']; $surname = $row['surname'];
        $gurnakcynyn_ady = $name." ".$surname;
        $hunari = $row['hunari'];
        $topary = $row['topary'];
        $suraty = $row['suraty'];
        $tassyknama = $row['berlen_derejesi'];
        if($tassyknama == 3){$TassyklananDerejesi='Active Student';}else{$TassyklananDerejesi='Active Student*';}
        

    ?>

    <div class="student">
        <div class="surat"><img src="../../register/img/<?php echo $suraty;?>"></div>
        <div class="data">
            <div class="name font"><?php echo $gurnakcynyn_ady;  ?></div>
            <div class="profession font hunar"><?php echo $hunari;?></div>
            <div class="topary font Topar"><?php echo $topary;?></div>
            <div class="activeStudent font ActiveStudent"><a href="#"><?php echo $TassyklananDerejesi;?></a></div>
        </div>
    </div>

    <?php }/*while*/   }/*fun */

gurnakOndebaryjy($query1);
gurnakOndebaryjy($query2);


}/*else*/  ?>
 </div>
</body>
</html>