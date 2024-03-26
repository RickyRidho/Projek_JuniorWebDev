<?php

/**
 * File ini berisi fungsi untuk berkomunikasi dengan database
 */

// Mengambil file model
include_once __DIR__ . "/model/test.php";

// Untuk mengambil komponen dari folder component
function load_component($component)
{
    include_once __DIR__ . '/component/' . $component . '.php';
}

// Untuk Memuat halaman 
function load_view($view, $data = [])
{
    include_once __DIR__ . '/' . $view . '.php';
    die();
}

// Untuk mengalihkan halaman
function redirect($page)
{
    header("Location: $page");
    die();
}

// Untuk mengecek apakah metode request adalah POST
function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

// Untuk mengambil data dari request
function request($parameter)
{
    return isset($_REQUEST[$parameter]) ? $_REQUEST[$parameter] : null;
}
function daftar_simpan()
{
    // tangkap data dari request
    $nama = request('nama');
    $email = request('email');
    $nomor_hp  = request('nomor_hp');
    $semester = request('semester');
    $ipk = request('ipk');
    $pilih_beasiswa = request('pilih_beasiswa');
    $berkas = $_FILES['berkas']['name'];
    $status_ajuan = "belum di verifikasi";

    if ($berkas != "") {
        $ekstensi_diperbolehkan = array('pdf'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $berkas); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['berkas']['tmp_name'];
        $angka_acak     = rand(1, 999);
        $nama_berkas_baru = $angka_acak . '-' . $berkas; //menggabungkan angka acak dengan nama file sebenarnya
        if (!in_array($ekstensi, $ekstensi_diperbolehkan)) {

            header("location:daftar.php?alert=gagal_ekstensi");
        } else {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                move_uploaded_file($file_tmp, 'assets/uploads/' . $nama_berkas_baru); //memindah file gambar ke folder assets

                // Simpan data ke database
                save_daftar(
                    $nama,
                    $email,
                    $nomor_hp,
                    $semester,
                    $ipk,
                    $pilih_beasiswa,
                    $nama_berkas_baru,
                    $status_ajuan,
                );
            }
        }
    }

    // Mengembalikan nilai
    return [
        'nama' => $nama,
        'email' => $email,
        'nomor_hp' => $nomor_hp,
        'semester' => $semester,
        'ipk' => $ipk,
        'pilih_beasiswa' => $pilih_beasiswa,
        'berkas' => $nama_berkas_baru,
        'status_ajuan' => $status_ajuan
    ];
}
