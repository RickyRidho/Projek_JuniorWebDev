<!-- Memanggil fungsi yang telah di definisikan sebelumnya -->
<?php
include_once 'function.php';
?>
<!-- Mengambil komponen header -->
<?php load_component('header'); ?>
<div class="container">
    <div style="margin: 0px auto 0px auto;">
        <div class="align-center text-center pb-2">
            <h1 style="color:black">List Pendaftar Beasiswa</h1>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <!--Head Table-->
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor Hp</th>
                        <th scope="col">Semester</th>
                        <th scope="col">IPK</th>
                        <th scope="col">Beasiswa</th>
                        <th scope="col">Berkas</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count(list_hasil()); $i++) { ?>

                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <!--Menampilkan data menggunakan perulangan dari database-->
                            <td><?= list_hasil()[$i]['nama'] ?></td>
                            <td><?= list_hasil()[$i]['email'] ?></td>
                            <td><?= list_hasil()[$i]['nomor_hp'] ?></td>
                            <td><?= list_hasil()[$i]['semester'] ?></td>
                            <td><?= list_hasil()[$i]['ipk'] ?></td>
                            <td><?= list_hasil()[$i]['pilih_beasiswa'] ?></td>
                            <td>
                                <!--Mengambil lokasi data dan nama berkas-->
                                <a href="assets/uploads/<?= list_hasil()[$i]['berkas'] ?>"><?= list_hasil()[$i]['berkas'] ?></a>
                            </td>
                            <td><?= list_hasil()[$i]['status_ajuan'] ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>