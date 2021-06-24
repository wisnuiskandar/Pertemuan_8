<?php
include('crudMhs.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>DaftarMahasiswa</title>
</head>
<body>
<h2>DaftarMahasiswa</h2>

<form action="carimhs.php" method="post">
NIM:
<input type="text" name="nim">
<input type="submit" name="submit" value="cari">
</form>
<?php
//Latihan
if(isset($_POST['nim'])){
	$nim = $_POST['nim'];
	$data = cariMhsDariNim($nim);
	if($data == null){
	echo "Tidak ada data mahasiswa";
	}else{
	?>
	<table>

	<?php
foreach($data as $mhs){
$nim = $mhs['nim'];
$nama = $mhs['nama'];
$kelamin = $mhs['kelamin'];
$jurusan = $mhs['jurusan'];
echo "
<tr>
<td>&emsp; $nim</td>
</tr><br>
<tr>
<td>&emsp; $nama</td>
</tr><br>
<tr>
<td>&emsp; $kelamin</td>
</tr><br>
<tr>
<td>&emsp; $jurusan</td>
</tr>
";
}
echo '</table>';
}
}
?>
</body>
</html>