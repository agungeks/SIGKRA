<?php
@session_start(); // memulai session
include "dbconfig2.php"; // memanggil koneksi

if(@$_SESSION['admin'] || @$_SESSION['operator']) { // jika sudah ada session admin atau session operator, maka ke halaman index
?>

<?php 
 if(@$_SESSION['admin']) { //apabila sessionnya admin
  $userlogin = @$_SESSION['admin']; 

 } else if(@$_SESSION['operator']) { //apabila sessionnya admin
  $userlogin = @$_SESSION['operator'];
 }
 // menuliskan query mysql dimana kode_user = $userlogin
 // yaitu session pada script di atas
 $sql = mysql_query("select * from login where iduser = '$userlogin'") or die(mysql_error());
 
 //menjadikan data sebagai arrray
 $data = mysql_fetch_array($sql);
}else {
  header("location: index.php"); 
  //jika tidak maka kembali ke halaman login.php
} 
?>