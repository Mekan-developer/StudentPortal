<?php ob_start(); include('functions/fTpTassyklanmadyklar.php'); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
        <th>Id</th>
        <th>Ady</th>
        <th>Familyasy</th>                    
        <th>Hünäri</th>
        <th>Kursy</th>
        <th>Suraty</th>                    
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


<?php 
    if(isset($_POST['toparButton'])){
        $topary = $_POST['topar'];
        $id = $_POST['gizle'];        
        $query = "UPDATE agzalar SET topary=$topary, berlen_derejesi=4 where id=$id";
        $result = mysqli_query($connect,$query);
        
        header("Location:index.php?page=TpTassyklanmadyk");
        ob_end_flush();
    }else if(isset($_GET['update'])){
            $update = $_GET['update'];
            $id = $_GET['id'];
            $query = "DELETE FROM agzalar WHERE id = $id";            
            $result = mysqli_query($connect,$query);   
           
    header("Location:index.php?page=TpTassyklanmadyk");
    ob_end_flush();
    }else if(isset($_GET['modal'])){
        $id = $_GET['modal'];
        modl($id);
    }
?>
    </tbody>
</table>




<!-- starsta modal start -->

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 400px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  margin-top: 25px;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
input[name=topar]{
  border: none;
  border-bottom: 1px solid black;
  width: 150px;
  height: 23px;
  padding: 0 5px;
  font-size: 16px;
  outline: none;
  transform: scale(0.9);
}
input[name=toparButton]:active{
   transform: scale(0.9);
}
input[name=toparButton]{
  border: none;
  width: 150px;
  height: 25px;
  border-radius: 3px;
  margin-top: 15px;
  background-color: gray;
  color: white;
  outline: none;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

<?php
function modl($variable){ ?>
</head>
<body>




<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <center>
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Bellemekçi bolýan starstaňyzyň toparyny giriziň:</p>
    <form action="index.php?page=TpTassyklanmadyk" method="post">
         <input type="number" name="topar" max="9999" min="100" ><br>
         <input type="hidden" name="gizle" value="<?php echo $variable;?>">
         <input type="submit" name="toparButton" value="starsta belle">
    </form>
  </div>
  </center>

</div>



</body>
</html>

<?php  }   ?>   


<script>
// Get the modal
var modal = document.getElementById("myModal");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



</div>


<!-- starsta modal end -->