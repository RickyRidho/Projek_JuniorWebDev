<?php
// Memasukan file konfigurasi
include_once dirname(__DIR__) . '/koneksi.php';

/**
 * File ini berisi fungsi untuk berkomunikasi dengan database
 */

// Koneksi ke database
function connect()
{
	// Koneksi ke database
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check connection
	if ($mysqli->connect_errno) {
		throw new Exception("Database error : " . $mysqli->connect_error);
	}

	// Mengembalikan nilai koneksi
	return $mysqli;
}
// Menambahkan data ke database dari function daftar simpan
function save_daftar(
	$nama,
	$email,
	$nomor_hp,
	$semester,
	$ipk,
	$pilih_beasiswa,
	$nama_berkas_baru,
	$status_ajuan,
) {

	//query mengirim data ke database
	$sql = "INSERT INTO `daftar`(`nama`, `email`, `nomor_hp`, `semester`, `ipk`, `pilih_beasiswa`, `berkas`, `status_ajuan`) VALUES
    ('$nama','$email','$nomor_hp','$semester','$ipk','$pilih_beasiswa', '$nama_berkas_baru', '$status_ajuan')";

	// membuka koneksi database
	$mysqli = connect();

	//mengirim data ke database
	$result = $mysqli->query($sql);

	// tutup koneksi
	$mysqli->close();

	// mengembalikan data
	return $result;
}

//Mengambil data dari database berupa daftar beasiswa A
function akademik()
{
    // Query sql
    $sql = "SELECT Count(pilih_beasiswa) as akademik FROM daftar WHERE pilih_beasiswa = 'Beasiswa akademik';";

    // Koneksi ke database
    $mysqli = connect();
    
    // Eksekusi query
    $result = $mysqli -> query($sql);

    // Ambil data dari hasil query menjadi array
    $hasil = $result -> fetch_all(MYSQLI_ASSOC);

    // fungsi membebaskan memori yang terkait dengan hasil.
    $result -> free_result();

    // Tutup koneksi
    $mysqli -> close();

	//Menyimpan data ke dalam array yang akan di tampilkan
    return $hasil[0]['akademik'];
}

//Mengambil data dari database berupa daftar beasiswa B
function non_akademik()
{
    // Query sql
    $sql = "SELECT Count(pilih_beasiswa) as non_akademik FROM daftar WHERE pilih_beasiswa = 'Beasiswa non-akademik';";

    // Koneksi ke database
    $mysqli = connect();
    
    // Eksekusi query
    $result = $mysqli -> query($sql);

    // Ambil data dari hasil query menjadi array
    $hasil = $result -> fetch_all(MYSQLI_ASSOC);

    // fungsi membebaskan memori yang terkait dengan hasil.
    $result -> free_result();

    // Tutup koneksi
    $mysqli -> close();

	//Menyimpan data ke dalam array yang akan di tampilkan
    return $hasil[0]['non_akademik'];
}


// Mengambil semua data pendaftar dari database
function list_hasil()
{
    // Query sql
    $sql = "SELECT * FROM daftar";

    // Koneksi ke database
    $mysqli = connect();
    
    // Eksekusi query
    $result = $mysqli -> query($sql);

    // Ambil data dari hasil query menjadi array
	$hasil = $result->fetch_all(MYSQLI_ASSOC);

	// fungsi membebaskan memori yang terkait dengan hasil.
	$result->free_result();

	// Tutup koneksi
	$mysqli->close();

	//Mengembalikan data yang sudah diambil dari database
	return $hasil;
}