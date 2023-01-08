 <?php ob_start();?>
<center> 
  <div class="scroll">  
     <table border="" align="center">
         <thead>
             <tr>
                 <th>id</th>
                 <th>bildiriş ady</th>
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
        $query = "SELECT * FROM postlar where post_name LIKE '$name%'";
        $result = mysqli_query($connect,$query);
        $id_count=0;
        while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++; 
        $post_name = $row['post_name'];
        $post_img = $row['post_img'];
        $post_text = $row['post_text'];
        $post_date = $row['post_date'];
        $post_view_count = $row['post_view_count'];
        $degisli_fakulteti = $row['degisli_fakulteti'];
        
        ?>
<tr>
    <td><?php echo $id_count ;  ?></td>
    <td><?php echo $post_name ; ?></td>
    <td><a target="_blank" href="../img/post/<?php echo $post_img ?>"><img class="post_news_img" src="../img/post/<?php echo $post_img ?>"></a></td>
    <td><?php echo $post_text; ?></td>
    <td ><?php echo $post_date; ?></td>
    <td><?php echo $post_view_count; ?></td>
    <td><?php echo $degisli_fakulteti; ?></td>

    <td class="back" ><a onClick="javascript: return confirm('Siz hakykatdanam bu bildirişi udalit etmekçimi!');" class='delete' href="index.php?page=bildirishler&update=delete&id=<?php echo $id;?>">delete</a></td>
</tr>


    <?php     } } else{ 

            $query = "SELECT * FROM postlar order by id desc";

            $result = mysqli_query($connect,$query);
            $id_count=0;
            while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $post_name = $row['post_name'];
            $post_img = $row['post_img'];
            $post_text = $row['post_text'];
            $post_date = $row['post_date'];
            $post_view_count = $row['post_view_count'];
            $degisli_fakulteti = $row['degisli_fakulteti'];
        ?>

<tr>
    <td><?php echo $id_count ;  ?></td>
    <td><?php echo $post_name ; ?></td>
    <td ><a target="_blank" href="../img/post/<?php echo $post_img ?>"><img class="post_news_img" src="../img/post/<?php echo $post_img ?>"></a></td>
    <td><?php echo $post_text; ?></td>
    <td ><?php echo $post_date; ?></td>
    <td><?php echo $post_view_count; ?></td>
    <td><?php echo $degisli_fakulteti; ?></td>

    <td class="back" ><a onClick="javascript: return confirm('Siz hakykatdanam bu bildirişi udalit etmekçimi!');" class='delete' href="index.php?page=bildirishler&update=delete&id=<?php echo $id;?>">delete</a></td>
</tr>
     <?php   }   ?>
               

<?php } ?>


<!-- Update basylanda islap baslayar start -->
<?php 


if(isset($_GET['update'])){
$update = $_GET['update'];
$id = $_GET['id'];
if($update == 'delete'){
    $query = "DELETE FROM postlar WHERE id = $id"; 
    $result = mysqli_query($connect,$query); 
}
header ("Location:index.php?page=bildirishler") ;
ob_end_flush();
} ?>
<!-- Update basylanda islap baslayar ended -->



             
     </tbody>
 </table>
 </div>
</center>






















