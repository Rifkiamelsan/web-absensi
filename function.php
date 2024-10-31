<?php


$koneksi=mysqli_connect("localhost","root","","test_db");

//login
if(isset($_POST['login'])){
$username = $_POST["uname"];
$Password = $_POST["psw"];

$cekuser= mysqli_query($koneksi,"select * from user where username='$username' and password='$Password'");
$hitung = mysqli_num_rows($cekuser);

if($hitung>0){
    //kalau data di temukan
    $ambildatarole = mysqli_fetch_array($cekuser);
    $role = $ambildatarole['role'];

    if($role=='admin'){
        //kalo dia admin
        $_SESSION['log'] = 'logged';
        $_SESSION['role'] = 'admin';
        header('location:admin');

    }else{
        //kalo dia user
        $_SESSION['log'] = 'logged';
        $_SESSION['role'] = 'user';
        header('location:user');

    }

 }else{
    //kalo tidak ditemukan

    echo'data tidak di temukan';
}



};





?>