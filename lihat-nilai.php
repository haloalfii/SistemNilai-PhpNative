<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include_once 'header.php';
        ?>
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Indonesia</th>
                                    <th>Inggris</th>
                                    <th>Matika</th>
                                    <th>Rata-rata</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                                <?php
                                    $j = 1;
                                    include_once 'proses.php';
                                    $siswa = new Siswaku;
                                    $row = $siswa->GetAll();
                                    foreach($row as $row){
                                ?>
                                <tr>
                                    <td><?php echo $j++?></td>    
                                    <td><?php echo $row["nis"]?></td>
                                    <td><?php echo $row["nama"]?></td>
                                    <td><?php echo $row["nama_kelas"]?></td>
                                    <td><?php echo $row["nilai_indo"]?></td>
                                    <td><?php echo $row["nilai_inggris"]?></td>
                                    <td><?php echo $row["nilai_mtk"]?></td>
                                    <td><?php echo $row["rata"]?></td>
                                    <td> <a href="input-nilai.php?id_nilai=<?=$row['id_nilai']?>">Input/Edit Nilai </a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>    
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
