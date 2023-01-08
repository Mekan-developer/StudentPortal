<!-- eger login bolmadyk bolsa on bu fayyl ol ulanyja elyeterli dal start -->
<?php  ob_start(); session_start();
$connect = mysqli_connect('localhost','root','','oguzhan');
@$id=$_SESSION['id'];
@$username = $_COOKIE["username"];
@$password = $_COOKIE["password"];
@$logged = $_SESSION['loginAUTHO'];
if(empty($id) && empty($username) && empty($username) && empty($logged)){
   header("Location:../../../login/");
}else{
if($_SESSION['habarlar_bolumi'] != 'yes'){header("Location:../");}

}
?>
<!-- END -->




<?php  
$agza_id = $_SESSION['id'];
$connect = mysqli_connect('localhost','root','','oguzhan');

$maglumat= 'kompýuter ylymlary we maglumat tehnologiýalary';
$himiya = 'himiki we nanotehnologiýalar';
$biologiya = 'biotehnologiýalar we ekologiýa';
$innowatika = 'innowasiýalaryň ykdysadyýeti';
$kyber = 'kiberfiziki ulgamalar';

    if((!empty($_GET['faculty']) and !empty($_GET['idi'])) || (!empty($_GET['faculty']) and !empty($_GET['id']))){
        $mut = 'notActive';$him = 'notActive'; $bio = 'notActive'; $cyber = 'notActive'; $inno = 'notActive';
        @$full_name_faculty =  $_GET['faculty'];
        @$fakultet = strtok($full_name_faculty, " ");
        @$tazeligin_idi = $_GET['idi'];
        @$fakultetin_ilkinji_tazeligi = $_GET['id'];
        @$news_gosan = $_GET['post_gosan'];
        if($fakultet == 'kompýuter'){$mut='active';}
        else if($fakultet == 'himiki'){$him = 'active';}
        else if($fakultet == 'biotehnologiýalar'){$bio = 'active';}
        else if($fakultet == 'innowasiýalaryň'){$inno = 'active';}
        else if($fakultet == 'kiberfiziki'){$cyber = 'active';}




//view count started
                $query0 = "SELECT * FROM news_view where user_id = $agza_id";
                $result0 = mysqli_query($connect,$query0);
                if(!empty($result0)){
                    $seen_count=0;
                    while($row = mysqli_fetch_assoc($result0)){
                        $id_news = $row['news_id'];

                        if($tazeligin_idi == $id_news){$seen_count++;}
                    } 
                    if($seen_count==0){//eger bu ulanyjy on bu posta girmedik bolsa
                            $query1 = "UPDATE news SET news_view_count = news_view_count + 1 where id = $tazeligin_idi";
                            mysqli_query($connect,$query1);

                            $query2 = "INSERT INTO news_view( `news_id`, `user_id`) VALUES ($tazeligin_idi,$agza_id)";
                            mysqli_query($connect,$query2);

                            $query3 = "UPDATE agzalar SET baly = baly + 1 where id = $news_gosan";
                            mysqli_query($connect,$query3);
                    }
                }else{//eger on bu ulanyjy hic-hili post gormedik bolsa
                    $query1 = "UPDATE news SET news_view_count = news_view_count + 1 where id = $tazeligin_idi";
                    $result1 = mysqli_query($connect,$query1);
                    

                    $query2 = "INSERT INTO news_view( `news_id`, `user_id`) VALUES ($tazeligin_idi,$agza_id)";
                    $result2 = mysqli_query($connect,$query2);

                    $query3 = "UPDATE agzalar SET baly = baly + 1 where id = $news_gosan";
                    mysqli_query($connect,$query3);
                }
//view count ended;











  }else{
    header("Location:../");
  }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TÄZELIKLER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css" />
    <link rel="shortcut icon" href="../icons/news.png" type="image/x-icon" />
</head>
<body>
    <div class="header">

        <ul class="linkler">
            <li class="<?php echo $mut;?>"><a href="news.php?faculty=<?php echo $maglumat;?>&id=1">Maglumat ulgamlary</a></li>
            <li class="<?php echo $him;?>"><a href="news.php?faculty=<?php echo $himiya;?>&id=1">Himiki tehnologiýalary</a></li>
            <li class="<?php echo $bio;?>"><a href="news.php?faculty=<?php echo $biologiya;?>&id=1">Biotehnologiýa</a></li>
            <li class="<?php echo $cyber;?>"><a href="news.php?faculty=<?php echo $kyber;?>&id=1" >Kiberfiziki ulgamlar</a></li>
            <li class="<?php echo $inno;?>"><a href="news.php?faculty=<?php echo $innowatika;?>&id=1" >Innowasiýalaryň ykdysadyýeti</a></li>
        </ul>

       
        <div class="habarIMG" >TÄZELIKLER</div>
    </div>





    



    <div class="tazelik">
        <center>
            <div class="scroll">
            <?php
            
            if($fakultetin_ilkinji_tazeligi==1){
                $query = "SELECT * FROM news where degisli_fakulteti = '$full_name_faculty' order by id desc limit 0,1";
                $result = mysqli_query($connect,$query);
                $rows=mysqli_fetch_assoc($result);
                @$tazeligin_idi = $rows['id'];
            }
            if(empty($tazeligin_idi)){die("<span  class='span' style='color:white;'>BU FAKULTETDE HIÇ-HILI TÄZELIK ÝOK</span>");}

            $quer = "SELECT * FROM news where id != $tazeligin_idi and degisli_fakulteti = '$full_name_faculty' order by id desc";
            $res = mysqli_query($connect,$quer);

            while($row=mysqli_fetch_assoc($res)){
                $degisli_id = $row['id'];
                $degisli_fakultet = $row['degisli_fakulteti'];
                $news_name = $row['news_name'];
                $news_img = $row['news_img'];
                $news_text = $row['news_text'];
                $news_date = $row['news_added_date'];
            ?>

                <center>
                    <p class="newsName"><a href="news.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>"><?php echo $news_name;?></a></p>
                    <a href="news.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>"><img class="Newsimg newsIMG"  src="../../../Admin/img/news/<?php echo $news_img; ?>"></a>

                    <div class="newsAddedTime"> 
                         <a href="news.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>"><img class="NewstimeLogo" src="icons/timeLogo.png"><?php echo $news_date;?></a>
                     </div>
                    <div class="newsText">
                           <a href="news.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>"><?php echo str_repeat("&nbsp;",4).substr($news_text,0,175)."..."; ?></a>
                    </div>
                    <svg class="newsSVG" height="10"  version="1.1"> 
                      <line stroke-dasharray="6, 6" x1="0" y1="1" x2="752" y2="1" />
                    </svg>
                </center>

        <?php   }//while   ?>


                
            </div>
         </center>


    </div>



    

    <div class="bildirish">
        <?php           

                $query = "SELECT * FROM news where id = $tazeligin_idi order by id desc";
                $result = mysqli_query($connect,$query);
                $row=mysqli_fetch_assoc($result);
                $tazeligi_gosan = $row['mugallym_id'];
                $news_name = $row['news_name'];
                $news_img = $row['news_img'];
                $news_text = $row['news_text'];
                $news_date = $row['news_added_date'];
                $news_view_count = $row['news_view_count'];
            ?>
        <center>
                    <p class="bildirishName"><?php echo $news_name;?></p>
                    <div class="displayIMGtext">
                        <div class="float">
                        <img class="bildirishImg cover postIMG" src="../../../Admin/img/news/<?php echo $news_img; ?>">
                                                     
                        <div class="bildirisAddedTime">
                           <div > <img class="seen" src="icons/seen.png"><span><?php echo $news_view_count;?></span> </div>
                           <div class="time"><img class="bildirishTimeLogo" src="icons/timeLogo.png"><span><?php echo $news_date;?></span></div>
                        </div>
                      </div>

                   <div class="bildirishText"><?php echo str_repeat("&nbsp;",2).$news_text;?></div> 
                    </div> 

 <?php 
$query = "SELECT * FROM agzalar where id = $tazeligi_gosan";
$rslt = mysqli_query($connect,$query);
$setr = mysqli_fetch_assoc($rslt);
if(!empty($setr)){
$name = $setr['name'];
$surname = $setr['surname'];
$ady =$name." ".$surname;
}else{$ady = 'Bildirişi goşan näbelli!';}



 ?>
        <div class="space"><address class="aboutOWNER">Bildirişi goşan: <?php echo $ady; ?></address></div><br>
        </center>
    </div>
</body>
</html>