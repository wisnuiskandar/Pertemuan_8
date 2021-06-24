<?php
require_once 'koneksiakad.php';
// membaca (select) tabelmahasiswa
// jikaberhasil, hasil array drbaris-baris data
// dansetiapbaris data berupa array darinama-nama field
// jikatidakada,hasilberupanilai null
Function bacaMhs($sql){
$data = array();
$koneksi = koneksiAkademik();
$hasil = mysqli_query($koneksi, $sql);
// jikatidakada record, hasilberupa null
if (mysqli_num_rows($hasil) == 0) {
mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data[$i]['nim']= $baris['nim'];
$data[$i]['nama'] = $baris['nama'];
$data[$i]['kelamin'] = $baris['kelamin'];
$data[$i]['jurusan'] = $baris['jurusan'];
$i++;
}
mysqli_close($koneksi);
return $data;
}
function tambahMhs($nim, $nama, $kelamin, $jurusan) {
    $koneksi = koneksiAkademik();
    $sql = "insert into mahasiswa values('$nim', '$nama' , '$kelamin, '$jurusan')";
    $hasil = 0;
    
    if (!mysqli_query($koneksi, $sql)) {
    $hasil = 1;
    mysqli_close($koneksi);
    
    return $hasil;
}
}
// menghapus 1 record berdasar field kunci nim
function hapusMhs($nim){
    $koneksi = koneksiAkademik();
    $sql = "delete from mahasiswa where nim='$nim'";
    if (!mysqli_query($koneksi, $sql)){
    die('Error: ' . mysqli_error());
    }
    $hasil = mysqli_affected_rows($koneksi);
    mysqli_close($koneksi);
    return $hasil;
    }

    // =============================

    // mencari data berdasar nim
// jika ada, hasil array dengan indeks berupa nama field
// jika tidak ada hasil berupa nilai null
function cariMhs($nim){
    $koneksi = koneksiAkademik();
    $sql = "select * from mahasiswa where nim='$nim'";
    $hasil = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($hasil)>0){
    $baris=mysqli_fetch_assoc($hasil);
    $data['nim']=$baris['nim'];
    $data['nama'] = $baris['nama'];
    $data['kelamin'] = $baris['kelamin'];
    $data['jurusan'] = $baris['jurusan'];
    mysqli_close($koneksi);
    return $data;
    }else{
    mysqli_close($koneksi);
    return null;
    }
    }


// Menambahkan Fungsi "bacaSemuaMhs"
 Function bacaSemuaMhs(){
    return bacaMhs("select*from mahasiswa");
}

// Menambahkan Fungsi "bacaMhsPerjurursan"
Function bacaMhsPerJurusan($jurusan){
    return bacaMhs("select*from mahasiswa where jurusan = '$jurusan'");
}

// Menambahkan Fungsi "cariMhsDariNim"
function cariMhsDariNim($nim){
        return bacaMhs("select*from mahasiswa where nim = '1937029'");
}

function cariSemuaMhs($kondisi){
    $sql = "select * from mahasiswa where $kondisi";
    return bacaMhs($sql);
    }