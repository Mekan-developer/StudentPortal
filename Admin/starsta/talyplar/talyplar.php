<?php include('functions/fTalyplar.php'); ?>
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
        TpSearch($fakulteti);
    } else{
         AhliTalyplar($fakulteti);
    }
?>
    </tbody>
</table>
</div>