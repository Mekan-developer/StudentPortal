<?php include('functions/fMugallymlar.php'); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>id</th>
        <th>Ady</th>
        <th>Familyasy</th>                    
        <th>Hünäri</th>
        <th>suraty</th>                     
        </tr>
    </thead>
    <tbody align="center">

<?php
if(isset($_POST['submit']) && $_POST['search']!=''){
    MgSearch($fakulteti);
} else{
    AhliMugallymlar($fakulteti);
}
?>


    </tbody>
</table>
</div>