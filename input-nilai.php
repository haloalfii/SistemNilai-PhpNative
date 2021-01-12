<?php
    include_once 'proses.php';
    $siswaku = new Siswaku;
    if(isset($_POST['submit'])){
        $update = $siswaku->InputNilai($_POST['nilai_indo'], $_POST['nilai_inggris'], $_POST['nilai_mtk'], $_POST['id_nilai']);
        if($update){
            echo "<script>alert('Data Siswa berhasil diupdate');window.location = 'lihat-nilai.php';</script>";
        }
    }
    $id_nilai=$_GET['id_nilai'];
    $data = $siswaku->getByIdNilai($id_nilai);
    foreach($data as $data){                                                  
?>

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
                <main>
                    <form action="" method="post">
                    <div class="container">
                        <div>
                            <table border="0">
                                <tr>
                                    <td>Nilai Indo</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="nilai_indo" type="text" name="nilai_indo"  value="<?=$data['nilai_indo'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Nilai Inggris</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="nilai_inggris" type="text" name="nilai_inggris" value="<?=$data['nilai_inggris'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Nilai Matematika</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="nilai_mtk" type="text" name="nilai_mtk" value="<?=$data['nilai_mtk'] ?>"></td>
                                </tr>
                            </table>
                        <input type="hidden" name="id_nilai" value="<?=$data['id_nilai']?>">
                        <div class="form-group mt-4 mb-0"><input type="submit" value="Input Nilai" name="submit" class="btn btn-primary"></div>
                        </div>
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
