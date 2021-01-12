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
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Hp</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                                <?php
                                    $j = 1;
                                    include_once 'proses.php';
                                    $siswa = new Siswaku;
                                    $row = $siswa->GetAllGuru();
                                    foreach($row as $row){
                                ?>
                                <tr>
                                    <td><?php echo $j++?></td>    
                                    <td><?php echo $row["nip"]?></td>
                                    <td><?php echo $row["nama_guru"]?></td>
                                    <td><?php echo $row["jeniskelamin_guru"]?></td>
                                    <td><?php echo $row["nohp_guru"]?></td>
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
