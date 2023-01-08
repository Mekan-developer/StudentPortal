<?php ob_start();
$connect = mysqli_connect('localhost','root','','oguzhan');

//DELETE part start 
if($_GET['get'] == 'delete'){	
	$id=$_GET['id'];
	$page = $_GET['page'];
	$query = "DELETE FROM vocabulary where id=$id";
	$result = mysqli_query($connect,$query);
	if(!$result){
		echo "This word do not delet";
	}else{
		if($page=='tm'){
		    header('Location:../indexTM.php?style=soz_gos');
		}else{
			header('Location:../indexEN.php?style=soz_gos');
		}
	}
}


// DELETE part end

// LIKE part started
else if($_GET['get'] == 'like'){	
    $user_id=$_GET['user_id'];
	$voc_id=$_GET['voc_id'];
	$soz_gosan_id = $_GET['soz_gosan_id'];
	$page = $_GET['page'];

	$query = "SELECT * FROM vocabulary_like where vocabulary_id = $voc_id and user_id=$user_id";
	$result = mysqli_query($connect,$query);
    $rows = mysqli_num_rows($result);    
    	if($rows > 0){
    		$query = "UPDATE vocabulary SET halanyp_ulanylyan_sany = halanyp_ulanylyan_sany - 1 where id = $voc_id";
    		mysqli_query($connect,$query);//sol bir sozun halanyp ulanylyan sanyny azaltyar

    		$query = "UPDATE agzalar SET baly = baly - 1 where id = $soz_gosan_id";
    		mysqli_query($connect,$query);//ulanyjynyn halanyp ulanylyan sanyny azaltyar

    		$query = "DELETE FROM `vocabulary_like` WHERE vocabulary_id = $voc_id and user_id = $user_id";
    		mysqli_query($connect,$query);


    	}else{
    		$query = "UPDATE vocabulary SET halanyp_ulanylyan_sany = halanyp_ulanylyan_sany + 1 where id = $voc_id";
    		mysqli_query($connect,$query);

    		$query = "UPDATE agzalar SET baly = baly + 1 where id = $soz_gosan_id";
    		mysqli_query($connect,$query);//ulanyjynyn halanyp ulanylyan sanyny azaltyar

    		$query = "INSERT INTO `vocabulary_like`(`vocabulary_id`, `user_id`) VALUES ($voc_id,$user_id)";
    		 mysqli_query($connect,$query);
    	}
    

	if($page=='tm'){
	    header('Location:../indexTM.php');
	}else{
		header('Location:../indexEN.php');
	}
	
}













ob_end_flush();
?>