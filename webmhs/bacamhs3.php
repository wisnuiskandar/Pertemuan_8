<?php
	include('crudmhs.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h2>Daftar Mahasiswa</h2>
	Pilih Jurusan
	<form action="bacamhs3.php" method="post">
		<input type="radio" name="jurusan" value="TI">TI
		<input type="radio" name="jurusan" value="SI">SI
		<input type="radio" name="jurusan" value="MI">MI
        <br>
		<input type="submit" name="submit" value="- OK -"> <br><br>
	</form>
	<?php
		//Latihan
		if(isset($_POST['jurusan'])){ //mengecek isi dari jurusan
			$jurusan = $_POST['jurusan'];

			$data = bacaMhsPerjurusan($jurusan);
			if($data == null){
				echo "Tidak ada data mahasiswa";
			}else{
				?>
                Jurusan <?php echo $jurusan; ?><br><br>
				<table border="1">
					<tr>
						<th>NIM</th>
						<th>Nama</th>
						<th>Kelamin</th>
					</tr>
				<?php 
					foreach($data as $mhs){
						$nim = $mhs['nim'];
						$nama = $mhs['nama'];
						$kelamin = $mhs['kelamin'];
						echo "
							<tr>
								<td>$nim</td>
								<td>$nama</td>
								<td>$kelamin</td>
							</tr>
						";
					}
					echo '</table>';
			}
		}
	?>
</body>
</html> 
