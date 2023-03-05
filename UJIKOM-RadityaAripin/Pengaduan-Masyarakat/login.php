
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
        <h2 class="text-dark mt-5">Login</h2>
        <div class="text-center mb-5 text-dark"></div>
        <div class="card-center" style=" margin-left: 450px; width: 18rem;">
<form method="POST">
		<div class="input_field">
			<label for="username">Username</label>
			<input class="form-control" placeholder="masukan username" id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input class="form-control" placeholder="masukan password" id="password" type="password" name="password" required>
		</div>
        <div class="text-dark mt-5">
        <button type="submit" name="login" value="Login"  class="btn btn-primary">login</button>
        </div>
    <div class="form-text text-center mt-5 text-dark">Belum Punya Akun? <a href="register.php">Registrasi</a></div>
	<div id="emailHelp" class="form-text text-center mt-2 text-dark">
    <a href="register_petugas.php">Daftar Sebagai Admin / Petugas</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>


<?php 
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi,$_POST['username']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
	
		$sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['data']=$data;
			$_SESSION['level']='masyarakat';
			header('location:masyarakat/index.php?p=beranda');
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:admin/');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('Gagal Login')</script>";
		}

	}
 ?>