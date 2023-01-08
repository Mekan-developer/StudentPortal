 <?php ob_start();?>
<center>  
<div class="scroll"> 
 <table border="" align="center">
     <thead>
         <tr>
             <th>id</th>
             <th>täzeligiň ady</th>
             <th>suraty</th>
             <th>maglumaty</th>
             <th>goşulan wagty</th>
             <th>görülen sany</th>
             <th>degişli fakulteti</th>
         </tr>
     </thead>

     <tbody align="center">

<?php

    if(isset($_POST['submit']) && $_POST['search']!=''){
        $name = $_POST['search'];
        $query = "SELECT * FROM news where news_name LIKE '$name%' order by id desc";

        $result = mysqli_query($connect,$query);
        $id_count=0;
        while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++;  
        $news_name = $row['news_name'];
        $news_img = $row['news_img'];
        $news_text = $row['news_text'];
        $news_added_date = $row['news_added_date'];
        $news_view_count = $row['news_view_count'];
        $degisli_fakulteti = $row['degisli_fakulteti'];
 
 ?>
    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $news_name ; ?></td>
        <td ><a target="_blank" href="../img/news/<?php echo $news_img ?>"><img class="post_news_img" src="../img/news/<?php echo $news_img ?>"></a></td>
        <td><?php echo $news_text; ?></td>
        <td><?php echo $news_added_date; ?></td>
        <td><?php echo $news_view_count; ?></td>
        <td><?php echo $degisli_fakulteti; ?></td>

        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam bu täzeligi udalit etmekçimi!');" class="delete" href="index.php?page=tazelikler&update=delete&id=<?php echo $id;?>">delete</a></td>

    </tr>
   <?php } }else{ 
$query = "SELECT * FROM news order by id desc";

$result = mysqli_query($connect,$query);
$id_count=0;
while($row = mysqli_fetch_assoc($result)){
$id = $row['id']; $id_count++;	
$news_name = $row['news_name'];
$news_img = $row['news_img'];
$news_text = $row['news_text'];
$news_added_date = $row['news_added_date'];
$news_view_count = $row['news_view_count'];
$degisli_fakulteti = $row['degisli_fakulteti'];;
?>
    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $news_name ; ?></td>
        <td ><a target="_blank" href="../img/news/<?php echo $news_img ?>"><img class="post_news_img" src="../img/news/<?php echo $news_img ?>"></a></td>
        <td><?php echo $news_text; ?></td>
        <td><?php echo $news_added_date; ?></td>
        <td><?php echo $news_view_count; ?></td>
        <td><?php echo $degisli_fakulteti; ?></td>

        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam bu täzeligi udalit etmekçimi!');" class="delete" href="index.php?page=tazelikler&update=delete&id=<?php echo $id;?>">delete</a></td>

    </tr>
  <?php    }  }?>


        


           

<?php 
if(isset($_GET['update'])){
        $update = $_GET['update'];
        $id = $_GET['id'];
    if($update == 'delete'){
        $query = "DELETE FROM tazelikler WHERE id = $id"; 
        $result = mysqli_query($connect,$query); 
    }
header ("Location:index.php?page=tazelikler") ;
ob_end_flush();
} ?>

         
     </tbody>
 </table>
</div>
</center>



<!-- <script type="text/javascript">
window.location='index.php?page=tazelikler';
</script> -->


















