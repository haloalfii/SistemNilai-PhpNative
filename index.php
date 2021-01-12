<?php
    include_once 'koneksi.php';

    $A1 = mysqli_query($con, "SELECT jeniskelamin FROM siswa WHERE jeniskelamin = 'L'");
    $A2 = mysqli_query($con, "SELECT jeniskelamin FROM siswa WHERE jeniskelamin = 'P'");

    $B1 = mysqli_query($con, "SELECT jeniskelamin_guru FROM guru WHERE jeniskelamin_guru = 'L'");
    $B2 = mysqli_query($con, "SELECT jeniskelamin_guru FROM guru WHERE jeniskelamin_guru = 'P'");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include_once 'header.php';
        ?>
        </br>
    </head>
    <body class="sb-nav-fixed">
       <?php
        include_once 'navbar.php';
       ?>
        <div id="layoutSidenav">
            <?php
                include_once 'sidebar.php';
            ?> 
            <div id="layoutSidenav_content">
                <div class="container">
                    <main>
                        <div class="container-graph">
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Jenis Kelamin Siswa
                                        
                                    </div>
                                    <div class="card-body"><canvas id="myChart"></canvas></canvas></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Jenis Kelamin Guru
                                        
                                    </div>
                                    <div class="card-body"><canvas id="myChart1"></canvas></canvas></div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var ctx = document.getElementById("myChart1");
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ['Laki-Laki', 'Perempian'],

                                    datasets: [{
                                        label: 'Jenis Kelamin Guru',

                                        data: [
                                            <?php echo mysqli_num_rows($B1); ?>,
                                            <?php echo mysqli_num_rows($B2);?>,
                                        ],

                                        backgroundColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                        ],

                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },

                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>

                        <script>
                            var ctx = document.getElementById("myChart");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Laki-Laki', 'Perempian'],

                                    datasets: [{
                                        label: 'Jenis Kelamin Siswa',

                                        data: [
                                            <?php echo mysqli_num_rows($A1); ?>,
                                            <?php echo mysqli_num_rows($A2);?>,
                                        ],

                                        backgroundColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                        ],

                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },

                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>

                    </main>
                </div>
                <?php
                    include_once 'footer.php';
                ?>  
            </div>
        </div>
        <?php
            include_once 'script-js.php';
        ?>
    </body>
</html>