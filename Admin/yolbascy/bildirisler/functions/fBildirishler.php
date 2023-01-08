<?php 
function BildirishSearch($var){
	$ady = $_POST['search'];	
	$connect = mysqli_connect('localhost','root','','oguzhan');		
	$query = "SELECT * FROM postlar where degisli_fakulteti = '$var' and post_name like '$ady%'";
	$result = mysqli_query($connect,$query);
	$id_count=0;
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['id']; $id_count++;	
		$post_name = $row['post_name'];
		$post_img = $row['post_img'];
		$post_text = $row['post_text'];
		$post_date = $row['post_date'];
		$post_view_count = $row['post_view_count'];
		$mugallym_id = $row['mugallym_id'];
	?>
	  <tr>
		<td><?php echo $id_count ;  ?></td>
		<td><?php echo $post_name ; ?></td>
		<td ><a target="_blank" href="../img/news/<?php echo $post_img ?>"><img class="post_news_img" src="../img/post/<?php echo $post_img ?>"></a></td>
		<td class="text"><?php echo $post_text; ?></td>
		<td ><?php echo $post_date; ?></td>
		<td><?php echo $post_view_count; ?></td>
		<?php 
           $query = "SELECT * FROM agzalar where id = $mugallym_id";
           $res = mysqli_query($connect,$query);
           $row = mysqli_fetch_array($res);
           $surat = $row['suraty']; 
		  ?>
		<td><a target="_blank" href="../img/post/<?php echo $surat?>"><img class="agzalar_imgg" alt="surat ýok!" src="../../register/img/<?php echo $surat ?>"></a></td>


		<td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam bu bildirişi aýyrmakçymy!');" class="delete" href="index.php?page=bildirishler&update=delete&id=<?php echo $id;?>">delete</a></td>
	 </tr>
               

<?php } } ?>




<?php
function AhliBildirishler($var){
	$connect = mysqli_connect('localhost','root','','oguzhan');
	$query = "SELECT * FROM postlar where degisli_fakulteti = '$var' order by id desc";
	$result = mysqli_query($connect,$query);
	$id_count=0;
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['id']; $id_count++;	
		$post_name = $row['post_name'];
		$post_img = $row['post_img'];
		$post_text = $row['post_text'];
		$post_date = $row['post_date'];
		$post_view_count = $row['post_view_count'];
		$mugallym_id = $row['mugallym_id'];
	?>
	  <tr>
		<td><?php echo $id_count ;  ?></td>
		<td><?php echo $post_name ; ?></td>
		<td ><a target="_blank" href="../img/news/<?php echo $post_img; ?>"><img class="post_news_img" src="../img/post/<?php echo $post_img; ?>"></a></td>
		<td class="text"><?php echo $post_text; ?></td>
		<td ><?php echo $post_date; ?></td>
		<td><?php echo $post_view_count; ?></td>


		<?php 
           $query = "SELECT * FROM agzalar where id = $mugallym_id";
           $res = mysqli_query($connect,$query);
           $row = mysqli_fetch_array($res);
           $surat = $row['suraty']; 
		  ?>
		<td><a target="_blank" href="../img/post/<?php echo $surat;?>"><img class="agzalar_imgg" alt="surat ýok!" src="../../register/img/<?php echo $surat ;?>"></a></td>


		<td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam bu bildirişi aýyrmakçymy!');" class="delete" href="index.php?page=bildirishler&update=delete&id=<?php echo $id;?>">delete</a></td>
	 </tr>
               

<?php }  }   ?>