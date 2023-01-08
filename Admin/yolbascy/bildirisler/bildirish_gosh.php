<?php ob_start();?>
<link rel="stylesheet" type="text/css" href="bildirisler/style/style.css">
<div class="MAINcontainer">
<div class="container">
	  <div>
	    <div class="bildirisTITLE">BILDIRIŞ GOŞMAK</div>
	    <center>
        <form action="index.php?page=bildirish_gosh" method="post" enctype="multipart/form-data" autocomplete="off">
				<input class="input" type="text" name="postName" placeholder="BILDIRIŞIŇ ADY" required>

				<label class="input" for="ok" required>SURAT SAÝLAŇ</label>
				<input type="file" id="ok" name="img" style="display: none;">


				<textarea name="postText" placeholder="BILDIRIŞ HAKYNDA MAGLUMAT" required></textarea>


				<input class="input" type="hidden" name="gosan_id" value="<?php echo $user_id; ?>">
				<input class="input" type="hidden" name="fakultet" value="<?php echo $fakulteti; ?>">

				<input class="input" type="submit" name="yolla" value="ÝATDA SAKLAT!">
        </form>
        <div>  </div>
        </center>
        </div>
</div>
</div>


<?php
if(isset($_POST['yolla'])){
   $postName = $_POST['postName'];
   $postText = $_POST['postText'];
   $gosanyn_fakulteti = $_POST['fakultet'];
   $gosan_id = $_POST['gosan_id'];

   $place_img = $_FILES['img']['tmp_name'];
	if(empty($place_img)){echo"<script>alert('SURAT SAÝLAMADYŇYZ!')</script>";die();}
	$newfilename =date('dmYHis').str_replace(" ", "", basename($_FILES["img"]["name"]));
	move_uploaded_file($place_img,"../img/post/" . $newfilename);

    $connect = mysqli_connect('localhost','root','','oguzhan');
   	$quer = "INSERT INTO postlar(post_name,post_img,post_text,post_date,degisli_fakulteti,mugallym_id) VALUES ('$postName','$newfilename','$postText',curdate(),'$gosanyn_fakulteti',$gosan_id)";
   	$result = mysqli_query($connect,$quer);
   	header("Location:index.php?page=bildirish_gosh");

}
ob_end_flush();


?>