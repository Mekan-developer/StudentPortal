<?php
function agza_kesgitleyji(){
$kesgitleyji = "";
global $kesgitleyji;
$connect = mysqli_connect('localhost','root','','oguzhan');
$user = $_COOKIE['username'];
$pass = $_COOKIE['password'];
$query = "SELECT * FROM agzalar where username = '$user' and password = '$pass' ";
$result = mysqli_query($connect,$query);
  $row = mysqli_fetch_assoc($result);

  if(!$row){
    $kesgitleyji = "yok";
  }else{
    session_start();
    $_SESSION['id']=$row['id'];
    setcookie('username',$user,time() + 60*60*24*3,'/');//3 gun yatda saklatmak u/n;
    setcookie('password',$pass,time() + 60*60*24*3,'/');
    $kesgitleyji = "bar";
  }  
// Cookiede on bar bolsa loginsiz girmek(3 gunin icinde);END 
}

?>