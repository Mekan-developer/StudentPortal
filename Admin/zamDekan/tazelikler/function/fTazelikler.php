<?php
function TazelikSearch($var){
	$ady = $_POST['search'];	
	$connect = mysqli_connect('localhost','root','','oguzhan');		
	$query = "SELECT * FROM news where degisli_fakulteti = '$var' and news_name like '$ady%'";
	$result = mysqli_query($connect,$query);
	$id_count=0;
	while($row = mysqli_fetch_assoc($result)){
	$id = $row['id']; $id_count++;	
	$news_name = $row['news_name'];
	$news_img = $row['news_img'];
	$news_text = $row['news_text'];
	$news_added_date = $row['news_added_date'];
	$news_view_count = $row['news_view_count'];
	$mugallym_id = $row['mugallym_id'];
	?>

	<tr>
		<td><?php echo $id_count ;  ?></td>
		<td><?php echo $news_name ; ?></td>
		<td ><a target="_blank" href="../img/news/<?php echo $news_img ?>"><img class="post_news_img" src="../img/news/<?php echo $news_img ?>"></a></td>
		<td><?php echo $news_text; ?></td>
		<td><?php echo $news_added_date; ?></td>
		<td><?php echo $news_view_count; ?></td>
		<?php 
           $query = "SELECT * FROM agzalar where id = $mugallym_id";
           $res = mysqli_query($connect,$query);
           $row = mysqli_fetch_array($res);
           $surat = $row['suraty']; 
	    ?>
	    <td><a target="_blank" href="../img/news/<?php echo $suraty?>"><img class="agzalar_imgg" alt="surat ýok!" src="../../register/img/<?php echo $surat ?>"></a></td>

		<td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam bu täzeligi aýyrmakçymy!');" class="delete" href="index.php?page=tazelikler&update=delete&id=<?php echo $id;?>">delete</a></td>
	</tr>
	       

<?php } } ?>






<?php
function AhliTazelikler($var){
	$connect = mysqli_connect('localhost','root','','oguzhan');
	$query = "SELECT * FROM news where degisli_fakulteti = '$var' order by id desc";
	$result = mysqli_query($connect,$query);
	$id_count=0;
	while($row = mysqli_fetch_assoc($result)){
	$id = $row['id']; $id_count++;	
	$news_name = $row['news_name'];
	$news_img = $row['news_img'];
	$news_text = $row['news_text'];
	$news_added_date = $row['news_added_date'];
	$news_view_count = $row['news_view_count'];
	$mugallym_id = $row['mugallym_id'];
	?>

<tr>
	<td><?php echo $id_count ;  ?></td>
	<td><?php echo $news_name ; ?></td>
	<td ><a target="_blank" href="../img/news/<?php echo $news_img ?>"><img class="post_news_img" src="../img/news/<?php echo $news_img ?>"></a></td>
	<td><?php echo $news_text; ?></td>
	<td><?php echo $news_added_date; ?></td>
	<td><?php echo $news_view_count; ?></td>
	<?php 
           $query = "SELECT * FROM agzalar where id = $mugallym_id";
           $res = mysqli_query($connect,$query);
           $row = mysqli_fetch_array($res);
           @$surat = $row['suraty']; 
	?>
	<td><a target="_blank" href="../img/news/<?php echo $suraty?>"><img class="agzalar_imgg" alt="surat ýok!" src="../../register/img/<?php echo $surat ?>"></a></td>

	<td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam bu täzeligi aýyrmakçymy!');" class="delete" href="index.php?page=tazelikler&update=delete&id=<?php echo $id;?>">delete</a></td>
</tr>
	       

<?php } } ?>