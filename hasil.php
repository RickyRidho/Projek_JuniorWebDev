<!-- Memanggil fungsi yang telah di definisikan sebelumnya -->
<?php include_once 'function.php'; ?>

<!-- Mengambil komponen header -->
<?php load_component('header'); ?>

<!--Mengecek jika data kosong maka mengembalikan ke daftar.php -->
<?php
if (empty($data)) {
    return redirect("daftar.php");
}
?>

<div class="container" style="margin: 50px auto 50px auto;">
    <div class="container align-center text-center pb-5">
        <h1 class="border-bottom pb-2 text-uppercase">Konfirmasi</h1>
    </div>
    <!-- Memanggil data dari daftar.php -->
    <table class="w-100">
        <tr>
            <td>
                Nama Lengkap
            </td>
            <td style="width: 10px" class="text-center">:</td>
            <td>
                <?= $data['nama'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td style="width: 10px" class="text-center">:</td>
            <td>
                <?= $data['email'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Nomor HP
            </td>
            <td style="width: 10px" class="text-center">:</td>
            <td>
                <?= $data['nomor_hp'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Semester
            </td>
            <td style="width: 10px" class="text-center">:</td>
            <td>
                <?=  $data['semester'] ?>
            </td>
        </tr>
        <tr>
            <td>
                IPK
            </td>
            <td style="width: 10px" class="text-center">:</td>
            <td>
                <?=  $data['ipk'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Beasiswa
            </td>
            <td style="width: 10px" class="text-center">:</td>
            <td>
                <?= $data['pilih_beasiswa'] ?>
            </td>
        </tr>
        <tr>
            <td>
                File
            </td>
            <td style="width: 10px" class="text-center">:</td>
            <td>
                <a href="assets/uploads/<?=$data['berkas'] ?>"><?=$data['berkas'] ?></a>
            </td>
        </tr>
        <tr>
            <td>
                Status
            </td>
            <td style="width: 10px" class="text-center">:</td>
            <td>
                <?= $data['status_ajuan']  ?>
            </td>
        </tr>

    </table>

    <br>

    <a href="<?= URL ?>" type="button" class="btn btn-primary">
        Selesai
    </a>

</div>

<!-- Mengambil komponen footer -->
<?php load_component('footer'); ?>