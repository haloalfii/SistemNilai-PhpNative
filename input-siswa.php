<?php
    include_once 'proses.php';
    $siswaku = new Siswaku;
    if(isset($_POST['submit'])){
        $input = $siswaku->AddIdNilai($_POST['nis']);
        $insert = $siswaku->AddSiswa($_POST['nis'], $_POST['nama'], $_POST['jeniskelamin'], $_POST['nohp_siswa'], $_POST['thn_lahir'], $_POST['id_users'], $_POST['nip'],  $_POST['id_kelas']);
        if ($insert){
            echo "<script>alert('Data Siswa Berhasil Ditambahkan');window.location = 'lihat-siswa.php';</script>";
        }
    }
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
                <main>
                    <form action="" method="post">
                    <div class="container">
                    <h4>Input Data Siswa</h4>
                        <table border="0">
                            <tr>
                                <td>NIS</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="nis" type="text" name="nis"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="nama" type="text" name="nama"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jeniskelamin" type="text" name="jeniskelamin"></td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="nohp_siswa" type="text" name="nohp_siswa"></td>
                            </tr>
                            <tr>
                                <td>Tahun Lahir</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="thn_lahir" type="text" name="thn_lahir"></td>
                            </tr>
                            <tr>
                                <td>ID User</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="id_users" type="text" name="id_users"></td>
                                <td>defsiswa = Default Guru, defguru = Default Siswa</td>
                            </tr>
                            <tr>
                                <td>Wali Kelas</td>
                                <td> : </td>
                                <td>
                                    <input type="radio" id="nip" name="nip" value="000001">
                                    <label for="000001">Salsabila</label>
                                    <input type="radio" id="nip" name="nip" value="000002">
                                    <label for="000002">M Royyan</label>
                                    <input type="radio" id="nip" name="nip" value="000003">
                                    <label for="000003">Habib Dwi</label>
                                </td>
                            </tr>
                            <tr>
                                <td>ID Kelas</td>
                                <td> : </td>
                                <td>
                                    <input type="radio" id="id_kelas" name="id_kelas" value="10A">
                                    <label for="10A">10A</label>
                                    <input type="radio" id="id_kelas" name="id_kelas" value="10B">
                                    <label for="10B">10 B</label>
                                    <input type="radio" id="id_kelas" name="id_kelas" value="10C">
                                    <label for="10C">10C</label>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group mt-2 mb-0"><input type="submit" value="Add Category" name="submit" class="btn btn-primary"></div>
                    </div>
                    </form>
                </main>
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


