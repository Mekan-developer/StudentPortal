<?php ob_start(); include('functions/fToparym.php'); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>id</th>
        <th>Ady</th>
        <th>Familyasy</th>                    
        <th>Hünäri</th>
        <th>Topary</th>                  
        <th>Suraty</th>   
        <th>Derejesi</th>
        </tr>
    </thead>

    <tbody align="center">

<?php    
    if(isset($_POST['submit']) && $_POST['search']!=''){
        TparymSearch($user_topary,$fakulteti);
    } else{
         AhliToparym($user_topary,$fakulteti);
    }
?>


<?php 
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $query = "DELETE FROM agzalar WHERE id = $id";             
        mysqli_query($connect,$query); 
        header ("Location:index.php?page=toparym") ;
    }
    else if(isset($_GET['bashgaTopar'])){
        $id = $_GET['bashgaTopar'];
        $query = "UPDATE agzalar set topary = 0 where id = $id ";
        mysqli_query($connect,$query);
        header ("Location:index.php?page=toparym");
    }


        ob_end_flush();
?>
    </tbody>
</table>
</div>