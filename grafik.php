<!-- Memanggil fungsi yang telah di definisikan sebelumnya -->
<?php include_once 'function.php'; ?>

<!-- Mengambil komponen header -->
<?php load_component('header'); ?>

<div class="container" style="margin: 50px auto 50px auto;">
    <div class="container align-center text-center pb-2">
        <h1 class="border-bottom pb-2 text-uppercase">Grafik Beasiswa</h1>
    </div>
    <canvas id="myChart" width="100%"></canvas>
</div>

<!-- Menampilkan grafik -->
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Akademik', 'Non Akademik'
            ],
            datasets: [{
                label: 'Grafik Akademik',
                data: [
                    <?= akademik() ?>,
                    <?= non_akademik() ?>

                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- Mengambil komponen footer -->
<?php load_component('footer'); ?>