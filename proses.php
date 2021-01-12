<?php
    class Siswaku {
        public $siswaku;
        public $pdo;

        public function __construct(){
            $host="localhost";
            $database="sekolahfinal";
            $user="root";
            $password="";
            $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
        }
        
        public function GetAll(){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM siswa INNER JOIN guru ON guru.nip = siswa.nip JOIN kelas ON kelas.id_kelas = siswa.id_kelas JOIN nilai ON nilai.id_nilai = siswa.id_nilai";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function GetAllGuru(){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM guru";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function AddSiswa($nis, $nama, $jeniskelamin, $nohp_siswa, $thn_lahir, $id_users, $nip, $id_kelas){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="INSERT INTO siswa(nis, nama, jeniskelamin, nohp_siswa, thn_lahir, id_users, nip, id_nilai, id_kelas) VALUES ('".$nis."','".$nama."','".$jeniskelamin."','".$nohp_siswa."', '".$thn_lahir."','".$id_users."','".$nip."','".$nis."', '".$id_kelas."')";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
        }

        public function AddIdNilai($nis){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "INSERT INTO nilai(id_nilai) VALUES ('".$nis."')";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
        }

        public function getById($nis){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM siswa WHERE nis= '".$nis."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll();
            return $result;
        }

        public function getByIdNilai($id_nilai){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM nilai WHERE id_nilai= '".$id_nilai."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            $result=$stmt->fetchAll();
            return $result;
        }

        public function update($nis, $nama, $jeniskelamin, $nohp_siswa, $thn_lahir, $id_users, $nip, $id_nilai,$id_kelas){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="INSERT INTO siswa (nis, nama, jeniskelamin, nohp_siswa, thn_lahir, id_users, nip, id_nilai,id_kelas) VALUES ('".$nis."','".$nama."','".$jeniskelamin."', '".$nohp_siswa."', '".$thn_lahir."','".$id_users."','".$nip."','".$id_nilai."','".$id_kelas."')
            ON DUPLICATE KEY UPDATE nis=VALUES(nis), nama=VALUES(nama), jeniskelamin=VALUES(jeniskelamin), nohp_siswa=VALUES(nohp_siswa), thn_lahir=VALUES(thn_lahir), id_users=VALUES(id_users), nip=VALUES(nip), id_nilai=VALUES(id_nilai), id_kelas=VALUES(id_kelas)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
        }   

        public function InputNilai($nilai_indo, $nilai_inggris, $nilai_mtk, $id_nilai) {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rata = ($nilai_indo + $nilai_inggris + $nilai_mtk)/3;
            $query = "INSERT INTO nilai (nilai_indo, nilai_inggris, nilai_mtk, rata, id_nilai) VALUES ('".$nilai_indo."', '".$nilai_inggris."', '".$nilai_mtk."', '".$rata."', '".$id_nilai."')
            ON DUPLICATE KEY UPDATE nilai_indo = VALUES(nilai_indo), nilai_inggris = VALUES(nilai_inggris), nilai_mtk = VALUES(nilai_mtk), rata = VALUES(rata), id_nilai = VALUES(id_nilai)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
        }
        
        public function delete($nis){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="DELETE FROM siswa WHERE nis='".$nis."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
        }

        public function deleteNilai($nis){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="DELETE FROM nilai WHERE id_nilai='".$nis."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }
?>