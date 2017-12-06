<?php
@session_start(); // memulai session

session_destroy(); // menghancurkan session

header("location: index.php"); //kembali ke halaman login.php
?>