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
                                    <th>ID_Siswa</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tahun Lahir</th>
                                    <th>Kelas</th>
                                    <th>Wali Kelas</th>
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
                                    <td><?php echo $row["jeniskelamin"]?></td>
                                    <td><?php echo $row["thn_lahir"]?></td>
                                    <td><?php echo $row["nama_kelas"]?></td>
                                    <td><?php echo $row["nama_guru"]?></td>
                                    <td> <a href="edit-siswa.php?nis=<?=$row['nis']?>">Edit </a>| <a href="delete-siswa.php?nis=<?=$row['nis']?>">Delete</a></td>
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
