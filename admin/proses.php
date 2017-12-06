<?php  
@session_start(); // memulai session
include "dbconfig2.php"; // memanggil koneksi

?>

 <?php
        $user = @$_POST['user']; // variabel user untuk user
        $pass = @$_POST['pass']; // variabel pass untuk pass
        $login = @$_POST['login']; // variabel login untuk login
        
        if($login) { // jika login di klik
         if($user == "" || $pass == "" ) { // dan jika text user dan pass masih kosong
    ?> 
        <!-- muncul peringatan dari javascript -->
        <script type="text/javascript">alert("Username atau password masih kosong"); window.location.href="index.php"</script> <?php
        } 
        //jika tidak kosong
        else { 
        // menuliskan query mysql dimana username = '$user' dan password = $ pass yang sudah di beri md5
        $sql = mysql_query("select * from login where username = '$user' and password = '$pass'") or die(mysql_error());
        //menjadikan data sebagai array
        $data = mysql_fetch_array($sql);
        //untuk mendapatkan jumlah baris pada database
        $cek = mysql_num_rows($sql);
        //jika kode user lebih sama dengan 1
        if($cek >= 1) {
         //dan jika levelnya admin
         if($data['level'] == "admin") {
             @$_SESSION['admin'] = $data['iduser'];
              // maka menuju ke halaman index.php
              header("location: home.php");
            //dan jika levelnya operator
            } else if($data['level'] == "operator") {
             @$_SESSION['operator'] = $data['iduser'];
              // maka menuju ke halaman index.php
              header("location: index.php");
           }
            //jika tidak
        }else {
           ?> 
          <!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Login Gagal ."); window.location.href="index.php"</script> <?php
            }
            }
      }
 ?>