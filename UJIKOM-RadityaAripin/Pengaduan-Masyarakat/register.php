<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Pengaduan Masyarakat</title>
	<link rel="shortcut icon" href="https://cepatpilih.com/image/logo.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

</head>

	<div class="container">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="row">
  <div class="col mb-3 mb-sm-0">
      <div class="card-body">
<div class="row mt-5">
    <div class="col">
    <div class="text-center">
              <img src="https://png.pngtree.com/png-vector/20190726/ourmid/pngtree-human-character-logo-sign-png-image_1602831.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

<div class="row">
  <div class="col mb-3 mb-sm-0">
  <div class="card-body">
<div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
        <h2 class="text-dark mt-5">Registrasi</h2>
        <div class="text-center mb-5 text-dark"></div>
        <div class="card-center" style=" margin-left: 450px; width: 18rem;">
<form method="POST">
		<div class="input_field">
			<label for="nik">Nik</label>
			<input class="form-control" placeholder="masukan nik" id="nik" type="text" name="nik" required>
		</div>
        <div class="input_field">
			<label for="nama">Nama</label>
			<input class="form-control" placeholder="masukan nama" id="nama" type="text" name="nama" required>
		</div>
        <div class="input_field">
			<label for="username">Username</label>
			<input class="form-control" placeholder="masukan username" id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input class="form-control" placeholder="masukan password" id="password" type="password" name="password" required>
		</div>
        <div class="input_field">
			<label for="telp">Nomor Telpon</label>
			<input class="form-control" placeholder="masukan Nomor Telp" id="telp" type="text" name="telp" required>
		</div>
        <div class="text-dark mt-5">
        <button type="submit" name="Register" value="register"  class="btn btn-primary">register</button>
        </div>
    <div class="form-text text-center mt-5 text-dark">Sudah Punya Akun? <a href="index.php">Login</a></div>
	<div id="emailHelp" class="form-text text-center mt-2 text-dark">
    <a href="register_pa.php">Daftar Sebagai Admin / Petugas</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<?php 
include 'koneksi.php';
	if(isset($_POST['Register'])){
        $nik=$_POST['nik'];
        $nama=$_POST['nama'];
        $username=$_POST['username'];
		$password = md5($_POST['password']);
        $telp=$_POST['telp'];

        $query=mysqli_query($koneksi, "insert into masyarakat values('$nik','$nama','$username','$password','$telp')");
        if($query){
            ?>
            <script type="text/javascript">
                alert ('Daftar Berhasil, Silahkan Login');
                window.location="index.php";
            </script>
        <?php
        }
    }
 ?>