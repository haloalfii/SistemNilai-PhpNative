<?php
    include_once 'proses.php';
    $siswaku = new Siswaku;
    if(isset($_POST['submit'])){
        $update = $siswaku->update($_POST['nis'], $_POST['nama'], $_POST['jeniskelamin'], $_POST['nohp_siswa'], $_POST['thn_lahir'], $_POST['id_users'], $_POST['nip'], $_POST['id_nilai'],  $_POST['id_kelas']);
        if($update){
            echo "<script>alert('Data Siswa berhasil diupdate');window.location = 'lihat-siswa.php';</script>";
        }
    }
    //tampilkan data sesuai id yang dilempar
    $nis=$_GET['nis'];
    $data = $siswaku->getById($nis);
    foreach($data as $data){                                                  
?>

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
                    <h4>Edit Data Siswa</h4>
                        <table border="0">
                            <tr>
                                <td>Nama</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="nama" type="text" name="nama" value="<?=$data['nama'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jeniskelamin" type="text" name="jeniskelamin" value="<?=$data['jeniskelamin'] ?>"></td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="nohp_siswa" type="text" name="nohp_siswa" value="<?=$data['nohp_siswa'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Tahun Lahir</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="thn_lahir" type="text" name="thn_lahir" value="<?=$data['thn_lahir'] ?>"></td>
                            </tr>
                            <tr>
                                <td>ID User</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="id_users" type="text" name="id_users" value="<?=$data['id_users'] ?>"></td>
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
                        <input class="form-control py-2" id="nis" type="text" name="nis"  value="<?=$data['nis'] ?>">
                        <input class="form-control py-2" id="id_nilai" type="text" name="id_nilai" value="<?=$data['id_nilai'] ?>">
                        <div class="form-group mt-4 mb-0"><input type="submit" value="Edit Category" name="submit" class="btn btn-primary"></div>
                    </div>
                    </form>
                <?php
                    }           
                ?>   
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