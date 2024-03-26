<!-- Memanggil fungsi yang telah di definisikan sebelumnya -->
<?php
include_once 'function.php';
include_once 'koneksi.php';
?>
<!-- Mengambil komponen header -->
<?php load_component('header'); ?>
<?php
if (is_post()) {
  // Simpan data yang dikirimkan ke fungsi save_pemesanan
  $result = daftar_simpan();

  // Jika data berhasil disimpan, maka tampilkan kedalam view hasil.php
  return load_view('hasil', $result);
}
?>
<div class="container" onload='document.formhasil.email.focus()'>
  <nav>
    <div class="nav-item"></div>
  </nav>
  <main>
    <h2>Daftar Beasiswa</h2>
    <!--Form Pendaftaran -->
    <div class="form-daftar">
      <h4>Registrasi Beasiswa</h4>
      <form action="" name="formhasil" id="formhasil" method="POST" enctype="multipart/form-data" class="form">
        <div class="form-group">
          <label for="nama">Masukan Nama</label>
          <input name="nama" id="nama_lengkap" type="text" />
        </div>
        <div class="form-group">
          <label for="">Masukan email</label>
          <input type="email" id="email" name="email" autocomplete="email" />
        </div>
        <div class="form-group">
          <label for="">Nomor HP</label>
          <input type="text" id="nomor_hp"name="nomor_hp" autocomplete="nomor_hp" />
        </div>
        <!--Mendefinisikan sebuah div dengan class sebagai wadah untuk element-elemen form -->
        <div class="form-group">
          <!--Label yang terkait dengan elemen form yang memiliki ID Kosong ("for") -->
          <label for="">Semester saat ini</label>
          <!--Membuat dropdown list dengan nama dan id semester yang memiliki fungsi onchange untuk memanggil fungsi "smt(this)"-->
          <select name="semester" id="semester" onchange="smt(this)">
          <!--Delapan opsi pilihan dalam dropdown -->
            <option value="">--Pilih--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">IPK terakhir</label>
          <input name="ipk" type="text" id="ipk" readonly />
        </div>
        <div class="form-group">
          <label for="">Pilihan beasiswa</label>
          <select name="pilih_beasiswa" id="pilih_beasiswa" disabled="false">
            <option value="">--Pilih--</option>
            <option value="Beasiswa akademik">Beasiswa Akademik</option>
            <option value="Beasiswa non-akademik">Beasiswa Non Akademik</option>
          </select>
        </div>

        <div class="form-group">
          <label for="">Masukan berkas</label>
          <input name="berkas" type="file" id="berkas" accept="application/pdf"/>
        </div>

        <div class="btn-group">
          <button id="btnSubmit" type="button" onclick="ValidateEmail(document.formhasil.email)">Daftar</button>
          <a href="#">Batal</a>
        </div>
      </form>
    </div>
  </main>
</div>
<script>
  function smt(semester) {
    const nilai = [2.4, 3.5, 3.0, 2.5, 3.4, 1.8, 3.8, 3.1];
    const ipk = nilai[semester.value - 1];

    if (semester.value != 0) {
      document.querySelector("#ipk").value = ipk;
      checkIpk(ipk)
    } else {
      document.querySelector("#ipk").value = "";
    }
  };

  //Fungsi untuk check IPK
  function checkIpk(ipk) {
   //Mengecek nilai ipk lebih dari 3. jika iya maka kode di dalam {} akan di eksekusi
    if (ipk > 3) {
      //Mengaktifkan element HTML dengan id 'pilih_beasiswa'
      document.querySelector("#pilih_beasiswa").disabled = false;
      //Memfokuskan kursor pada elemen HTML dengan id 'pilih_beasiswa'
      document.querySelector("#pilih_beasiswa").focus();
      //Mengaktifkan element HTML dengan id 'berkas'
      document.querySelector("#berkas").disabled = false;
      //Mengaktifkan element HTML dengan id 'btnsubmit'
      document.querySelector("#btnSubmit").disabled = false;
      //Jika nilai IPK kurang dari atau sama dengan 3
    } else {
      //Menonaktifkan elemen HTML dengan id 'pilih_beasiswa'
      document.querySelector("#pilih_beasiswa").disabled = true;
      //Menonaktifkan element HTML dengan id 'berkas'
      document.querySelector("#berkas").disabled = true;
      //Menonaktifkan element HTML dengan id 'btnSUbmit'
      document.querySelector("#btnSubmit").disabled = true;
    }
  };


  $('#btnSubmit').click(function() {
    var nama = $('#nama_lengkap').val();
    var email = $('#email').val();
    var nomor_hp = $('#nomor_hp').val();
    var semester = $('#semester').val();
    var pilih_beasiswa = $('#pilih_beasiswa').val();

    // Jika nomor identitas tidak 16 digit
    if (!nama ) {
      // tampilkan pesan error
      alert('Nama Harus Di Lengkapi');
      return;
    }

    // jika total bayar adalah 0 atau NaN
    if (!email) {
      // tampilkan pesan error
      alert('Email Harus Di Lengkapi');
      return;
    }
    // jika total bayar adalah 0 atau NaN
    if (!nomor_hp) {
      // tampilkan pesan error
      alert('Nomor HP Harus Di Lengkapi');
      return;
    }
    // jika total bayar adalah 0 atau NaN
    if (!semester) {
      // tampilkan pesan error
      alert('Semester Harus Di Lengkapi');
      return;
    }
    // jika total bayar adalah 0 atau NaN
    if (!pilih_beasiswa) {
      // tampilkan pesan error
      alert('Beasiswa Harus Di Lengkapi');
      return;
    }


    $('#formhasil').submit();

  });

  //Fungsi Cek Email
  function ValidateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.value.match(mailformat)) {
      return true;
    } else {
      alert("Masukan Email dengan format yang benar");
      document.formhasil.email.focus();
      return false;
    }
  }
</script>