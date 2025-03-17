<?php
class StudentModel {
    private $conn;
    private $table_name = 'SinhVien';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllStudents() {
        $query = "SELECT s.MaSV, s.HoTen, s.GioiTinh, s.NgaySinh, s.Hinh, s.MaNganh
                    FROM " . $this->table_name . " s";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getStudentById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaSV', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function addStudent($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $errors = [];
        if (empty($MaSV)) {
            $errors['MaSV'] = 'Mã sinh viên không được để trống';
        }
        if (empty($HoTen)) {
            $errors['HoTen'] = 'Họ tên không được để trống';
        }
        if (count($errors) > 0) {
            return $errors;
        }

        $query = "INSERT INTO " . $this->table_name . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh)
                    VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        $stmt = $this->conn->prepare($query);

        $masv = htmlspecialchars(strip_tags($MaSV));
        $hoten = htmlspecialchars(strip_tags($HoTen));
        $gioitinh = htmlspecialchars(strip_tags($GioiTinh));
        $ngaysinh = htmlspecialchars(strip_tags($NgaySinh));
        $hinh = htmlspecialchars(strip_tags($Hinh));
        $manganh = htmlspecialchars(strip_tags($MaNganh));

        $stmt->bindParam(':MaSV', $masv);
        $stmt->bindParam(':HoTen', $hoten);
        $stmt->bindParam(':GioiTinh', $gioitinh);
        $stmt->bindParam(':NgaySinh', $ngaysinh);
        $stmt->bindParam(':Hinh', $hinh);
        $stmt->bindParam(':MaNganh', $manganh);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function updateStudent($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $query = "UPDATE " . $this->table_name . "
        SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, Hinh = :Hinh, MaNganh = :MaNganh WHERE MaSV = :MaSv";
        $stmt = $this->conn->prepare($query);

        $masv = htmlspecialchars(strip_tags($MaSV));
        $hoten = htmlspecialchars(strip_tags($HoTen));
        $gioitinh = htmlspecialchars(strip_tags($GioiTinh));
        $ngaysinh = htmlspecialchars(strip_tags($NgaySinh));
        $hinh = htmlspecialchars(strip_tags($Hinh));
        $manganh = htmlspecialchars(strip_tags($MaNganh));

        $stmt->bindParam(':MaSv', $masv);
        $stmt->bindParam(':HoTen', $hoten);
        $stmt->bindParam(':GioiTinh', $gioitinh);
        $stmt->bindParam(':NgaySinh', $ngaysinh);
        $stmt->bindParam(':Hinh', $hinh);
        $stmt->bindParam(':MaNganh', $manganh);


        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function deleteStudent($MaSV) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaSV', $MaSV, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>