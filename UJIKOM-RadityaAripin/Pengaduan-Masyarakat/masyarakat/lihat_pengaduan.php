<div class="row">
          <div class="col s12 mt-5">
            <h3 class="black-text">Pengaduan</h3> 
			<div class="col mt-3">
				<a type=button class="btn btn-dark text-light" class="nav-link" href="index.php?p=tulis_pengaduan">Tulis Pengaduan</a>
			</div>
			</div>
        </div>
</div>
</div>

	<div class="row">
          <div class="col s12 mt-5">
            <h3 class="black-text">Pengaduan Yang Belum Ditanggapi</h3> 
			</div>
		</div>
          
          <table class="table table-light table-striped-columns">
				<tr>
                <th>NO</th>
				<th>ID</th>
				<th>TANGGAL</th>
				<th>NIK</th>
				<th>ISI LAPORAN</th>
                <th>FOTO</th>
				<th>STATUS</th>
				<th>ACTION</th>
				</tr>
                
	</div>
	</div>
	</div>
				<?php 
					$no=1;
					$pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status = 'proses'");
					//var_dump($pengaduan);
					while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $r['id_pengaduan']; ?></td>
						<td><?php echo $r['tgl_pengaduan']; ?></td>
						<td><?php echo $r['nik']; ?></td>
						<td><?php echo $r['isi_laporan']; ?></td>
                        <td><?php echo $r[''];
	{ ?>
        <img width="100" src="../img/<?php echo $r['foto']; ?>">
    <?php }?></td>
						<td><?php echo $r['status']; ?></td>
						<td>
						<!-- <a class="btn green modal-trigger text-light" href="#edit&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Update</a> -->
						<a class="btn red text-light" onclick="return confirm('Anda Yakin Ingin Menghapus Laporan')" href="index.php?p=pengaduan_hapus&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Hapus</a></td>

<!-- ini buat diupdate -->

<!-- <div id="edit&id_pengaduan=<?php echo $r['id_pengaduan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="orange-text">Update</h4>
			
            <form method="POST">
            <div class="col s12 input-field">
					<input type="hidden" name="id_pengaduan" value="<?php echo $r['id_pengaduan']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="isi_laporan">Isi Laporan</label>
					<input id="isi_laporan" type="text" name="isi_laporan" value="<?php echo $r['isi_laporan']; ?>">
				</div>
				<div class="col s12 input-field">
					<input type="submit" name="Update" value="Simpan" class="btn right">
				</div>
			</form>

			<?php 
            $id = $_GET['id_pengaduan'];
				if(isset($_POST['Update'])){
					$update=mysqli_query($koneksi,"UPDATE pengaduan SET isi_laporan = 'isi_laporann' WHERE id_pengaduan = '$id' ");
					if($update){
						echo "<script>alert('Data Tersimpan')</script>";
						echo "<script>location='location:index.php?p=lihat_pengaduan';</script>";
					}
				}
			 ?>
          </div>
        </div>
</tr>
            <?php  }
             ?>

          </tbody> -->
        </table>     




        
		<div class="row">
          <div class="col s12 mt-5">
            <h3 class="black-text">Pengaduan Yang Sudah Selesai Ditanggapi</h3> 
			</div>
		</div>
		
          <table class="table table-light table-striped-columns">
				<tr>
				<th>NO</th>
                <th>ID</th>
				<th>TANGGAL</th>
				<th>NIK</th>
				<th>ISI LAPORAN</th>
                <th>FOTO</th>
				<th>STATUS</th>
				<th>ACTION</th>
				</tr>
                </form>
	</div>
	</div>
	</div>
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas ORDER BY tanggapan.id_pengaduan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['id_pengaduan']; ?></td>
			<td><?php echo $r['tgl_pengaduan']; ?></td>
			<td><?php echo $r['nik']; ?></td>
			<td><?php echo $r['isi_laporan']; ?></td>
			<td><?php echo $r[''];
	{ ?>
        <img width="100" src="../img/<?php echo $r['foto']; ?>">
    <?php }?></td>
			<td><?php echo $r['status']; ?></td>
			<td><a class="btn blue text-light modal-trigger" href="#more?id_tanggapan=<?php echo $r['id_tanggapan'] ?>">Detail</a> <a class="btn red text-light" onclick="return confirm('Anda Yakin Ingin Menghapus Laporan?')" href="index.php?p=tanggapan_hapus&id_tanggapan=<?php echo $r['id_tanggapan'] ?>">Hapus</a></td>
		

 <!-- ini buat detail kalo udah selsai -->

        <div id="more?id_tanggapan=<?php echo $r['id_tanggapan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="dark-text">Detail</h4>
            <div class="col s12">
				<p>NIK : <?php echo $r['nik']; ?></p>
            	<p>Dari : <?php echo $r['nama']; ?></p>
            	<p>Petugas : <?php echo $r['nama_petugas']; ?></p>
				<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
				<p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
				<?php 
					if($r['foto']=="kosong"){ ?>
						<img src="../img/noImage.png" width="100">
				<?php	}else{ ?>
					<img width="100" src="../img/<?php echo $r['foto']; ?>">
				<?php }
				 ?>
				<br><b>Pesan</b>
				<p><?php echo $r['isi_laporan']; ?></p>
				<br><b>Respon</b>
				<p><?php echo $r['tanggapan']; ?></p>
            </div>

          </div>
        </div>

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>        