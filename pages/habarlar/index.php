<?php  ob_start(); session_start();
$connect = mysqli_connect('localhost','root','','oguzhan');
global $connect; 
@$id=$_SESSION['id'];
@$username = $_COOKIE["username"];
@$password = $_COOKIE["password"];
@$logged = $_SESSION['loginAUTHO'];
if((empty($id) && empty($username)) || (empty($username) && empty($logged))){
   header("Location:../../login/");
}else{
$query = "SELECT * FROM agzalar where username = '$username' and password = '$password'";
$result = mysqli_query($connect,$query);
$userSany = mysqli_num_rows($result);

}


if($userSany>0 or $logged == 'loged_in'){
    $_SESSION['habarlar_bolumi'] = 'yes';
    if($logged == 'loged_in'){
        $user = $_SESSION['username'];
        $pass = $_SESSION['password'];
        $query = "SELECT * FROM agzalar where id=$id and username = '$user' and password = '$pass' "; 
    }
    $result = mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $agza_id = $row['id'];
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
    <title>Täzelikler we bildirişler!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style2.css" />

    <link rel="shortcut icon" href="icons/news.png" type="image/x-icon" />
</head>
<body>
    <div class="header">
        <ul class="linkler">
            <li class="active"><a href="#">Habarlar</a></li>
            <li class="notActive"><a href="../sozluk/indexEN.php">Sözlük</a></li>
            <li class="notActive"><a href="../ondebaryjylar/index.php">Öňdebaryjylar</a></li>
           <!--  <li class="notActive"><a href="#" >Chat</a></li> -->
            <?php
                if($Talyp_Mugall=='mugallym'){
                    if($derejesi==1){echo "<li class='notActive'><a target='_blank' href='../../Admin/Dekan/'>Admin</a></li>";}
                    else if($derejesi==2){echo "<li class='notActive'><a target='_blank' href='../../Admin/zamDekan/'>Admin</a></li>";}
                    else if($derejesi==3){echo "<li class='notActive'><a target='_blank' href='../../Admin/yolbascy/'>Admin</a></li>";}
                }else if($Talyp_Mugall=='talyp'){
                    if($derejesi==4){echo "<li class='notActive'><a target='_blank' href='../../Admin/starsta/' >Admin</a></li>";}
                }if($derejesi== -100){echo "<li class='notActive'><a target='_blank' href='../../Admin/superAdmin/'>Admin</a></li>";}
            ?>
        </ul>

        <ul class="USN">
            <li><label for="toggle1"> <a class="show"><?php echo @$username; ?></a></label></li>
                            <input type="checkbox" id="toggle1">
                           
                           <div class="hidden">
                               <center>
                                   <a href="#">my profile</a>
                                   <a href="../../login/index.php?cookieClean">log out</a>
                               </center>
                           </div> 

        </ul>    
        <div class="usrImg cover"></div>
    </div>
<style>    
    .usrImg{ background-image: url(../../register/img/<?php echo $suraty;?>) }       
</style>
<!-- Bildirisler STARTED -->
<?php   
    $connect = mysqli_connect('localhost','root','','oguzhan');
    $query = "SELECT * FROM postlar";
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);

    $count = ceil($count/5);

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    if($page == 1){
        $page_start = 0;
    }else{
        $page_start = $page*5-5; 
    }
?>
    <div class="bildirish">
        <?php
        $connect = mysqli_connect('localhost','root','','oguzhan');


        $query = "SELECT * FROM postlar order by id desc LIMIT $page_start,5";
        $result = mysqli_query($connect,$query);

        while($row=mysqli_fetch_assoc($result)){
            $post_name = $row['post_name'];
            $post_img = $row['post_img'];
            $post_text = $row['post_text'];
            $post_date = $row['post_date'];
            $degisli_fakultet = $row['degisli_fakulteti'];
            $degisli_id = $row['id'];
            $post_gosan_id = $row['mugallym_id'];
        ?>
                <center>               
                    <p class="bildirishName"><a target="_blank" href="ginisleyin/index.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>&post_gosan=<?php echo $post_gosan_id;?>"><?php echo $post_name; ?></a></p>
                    
                    <img class="bildirishImg blur cover" src="../../admin/img/post/<?php echo $post_img;?>">
                    <a target="_blank" href="ginisleyin/index.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>&post_gosan=<?php echo $post_gosan_id;?>"><img class="bildirishImg cover postIMG" src="../../admin/img/post/<?php echo $post_img;?>"></a>  
                                                 
                    <div class="bildirisAddedTime">
                        <a target="_blank" href="ginisleyin/index.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>&post_gosan=<?php echo $post_gosan_id;?>"><img class="bildirishTimeLogo" src="icons/timeLogo.png"><?php echo $post_date; ?></a>
                    </div>
                    <a target="_blank" href="ginisleyin/index.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>&post_gosan=<?php echo $post_gosan_id;?>"> <div class="bildirishText">
                           <?php echo str_repeat("&nbsp;",5).substr($post_text,0,350)."..."; ?>
                    </div> </a>
                    <svg class="bildirisSVG" height="10"  version="1.1"> 
                          <line stroke-dasharray="12, 6" x1="0" y1="5" x2="752" y2="5" />
                    </svg>
                 
                
        </center>
        <?php   }//while   ?>

        <center>
                <ul class="pagination">
            <?php 
            for($i=1;$i<=$count;$i++){
                if($i==$page){
                    echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                }else{
                    echo "<li><a  href='index.php?page={$i}'>{$i}</a></li>";  
                }
            }
            ?>
                </ul>
        </center>

    </div>


    <div class="tazelik">
        <center>
            <div class="LogoTazelik">
                <img src="icons/newsLOGO.png">
            </div>
            <div class="scroll">
            <?php
            $query = "SELECT * FROM news order by id desc";
            $result = mysqli_query($connect,$query);
            while($row=mysqli_fetch_assoc($result)){
                $news_gosan_id = $row['mugallym_id'];
                $news_name = $row['news_name'];
                $news_img = $row['news_img'];
                $news_text = $row['news_text'];
                $news_date = $row['news_added_date'];
                $degisli_fakultet = $row['degisli_fakulteti'];
                $degisli_id = $row['id'];

            ?>

                <center>
                    <p class="newsName"><a target="_blank" href="ginisleyin/news.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>&news_gosan=<?php echo $news_gosan_id;?>"><?php echo $news_name; ?></a></p>
                    <img class="Newsimg blur" src="../../admin/img/news/<?php echo $news_img; ?>">
                    <a target="_blank" href="ginisleyin/news.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>&news_gosan=<?php echo $news_gosan_id;?>"><img class="Newsimg newsIMG"  src="../../admin/img/news/<?php echo $news_img; ?>"></a>

                    <div class="newsAddedTime"> 
                         <a target="_blank" href="ginisleyin/news.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>&news_gosan=<?php echo $news_gosan_id;?>"><img class="NewstimeLogo" src="icons/newsPost.svg"><?php echo $news_date; ?></a>
                     </div>
                    <div class="newsText">
                           <a target="_blank" href="ginisleyin/news.php?faculty=<?php echo $degisli_fakultet;?>&idi=<?php echo $degisli_id;?>&news_gosan=<?php echo $news_gosan_id;?>"><?php echo str_repeat("&nbsp;",4).substr($news_text,0,335)."..."; ?></a>
                    </div>
                    <svg class="newsSVG" height="10"  version="1.1"> 
                      <line stroke-dasharray="6, 6" x1="0" y1="1" x2="752" y2="1" />
                    </svg>
                </center>
            <?php  }//while  ?>
                            
            </div>
         </center>
    </div>



    

</body>
</html>

<?php ob_end_flush(); ?>