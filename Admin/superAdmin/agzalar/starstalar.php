<?php ob_start(); include('functions/fStarstalar.php'); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>id</th>
        <th>Ady</th>
        <th>Familyasy</th>
        <th>Fakulteti</th>                     
        <th>Hünäri</th>
        <th>Kursy</th>
        <th>Suraty</th>   
        <th>Topary</th>                  
        <th>Derejesi</th>
        </tr>
    </thead>

    <tbody align="center">

    <?php
        
        if(isset($_POST['submit']) && $_POST['search']!=''){
            StarstaSearch();
        } else{

             Ahlistarstalar();

        }
    ?>


<?php 
    if(isset($_GET['update'])){
        $update = $_GET['update'];
        $id = $_GET['id'];
        $query = "DELETE FROM agzalar WHERE id = $id"; 
        $result = mysqli_query($connect,$query); 

        header ("Location:index.php?page=starstalar") ;
        ob_end_flush();
    }
?>
    </tbody>
</table>
</div>