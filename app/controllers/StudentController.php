<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/StudentModel.php';
class StudentController {
    private $studentModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->studentModel = new StudentModel($this->db);
    }
    public function index()
    {
        $students = $this->studentModel->getAllStudents();
        include __DIR__ .'/../views/student/list.php';
    }

    public function show($id)
    {
        $student = $this->studentModel->getStudentById($id);

        if ($student) {
            include __DIR__ . '/../views/student/show.php';
        } else {
            echo "Không thấy sinh viên";
        }
    }

    public function add()
    {
        include_once 'app/views/student/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $masv = $_POST['MaSV'] ?? '';
            $hoten = $_POST['HoTen'] ?? '';
            $gioitinh = $_POST['GioiTinh'] ?? '';
            $ngaysinh = $_POST['NgaySinh'] ?? null;
            $manganh = $_POST['MaNganh'] ?? '';

            $image = null;
            $hinh = '';

            if (!empty($_FILES['image']['name'])) {
                $uploadDir = __DIR__ . '/../../public/Content/images/';
                $originalFileName = basename($_FILES['image']['name']);
                $image = time() . '_' . $originalFileName;
                $relative_path = "/Content/images/" . $image;
                $uploadPath = $uploadDir . $image;

                // Kiểm tra và di chuyển file vào thư mục public/image
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    $hinh = $relative_path;
                } else {
                    die('Lỗi khi tải ảnh lên.');
                }
            }

            $result = $this->studentModel->addStudent($masv, $hoten, $gioitinh, $ngaysinh, $hinh, $manganh);

            if (is_array($result)) {
                $erros = $result;
                include 'app/views/student/add.php';
            } else {

                header('Location: /Student');
            }
        }
    }

    public function edit($id)
    {
        $student = $this->studentModel->getStudentById($id);

        if ($student) {
            include 'app/views/student/edit.php';
        } else {
            echo "Không thấy sinh viên";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $masv = $_POST['MaSV'] ?? '';
            $hoten = $_POST['HoTen'] ?? '';
            $gioitinh = $_POST['GioiTinh'] ?? '';
            $ngaysinh = $_POST['NgaySinh'] ?? null;
            $manganh = $_POST['MaNganh'] ?? '';

            $student = $this->studentModel->getStudentById($masv);
            $oldImage = $student->Hinh;

            $newImageName = $oldImage;

            if (!empty($_FILES['image']['name'])) {
                $uploadDir = __DIR__ . '/../../public/Content/images/';
                $originalFileName = basename($_FILES['image']['name']);
                $newImageName = time() . '_' . $originalFileName;
                $relative_path = "/Content/images/" . $newImageName;
                $uploadPath = $uploadDir . $newImageName;

                // Kiểm tra và di chuyển file vào thư mục public/image
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    $newImageName = $relative_path;
                    if (!empty($oldImage) && file_exists($uploadDir . $oldImage)) {
                        unlink($uploadDir . $oldImage);
                    }
                } else {
                    die('Lỗi khi tải ảnh lên.');
                }
            }


            $result = $this->studentModel->updateStudent($masv, $hoten, $gioitinh, $ngaysinh, $newImageName, $manganh);

            if ($result) {
                header ('Location: /Student');
            } else {
                echo "Đã xảy ra lỗi khi lưu sinh viên.";
            }
        }
    }

    public function delete($id)
    {
        if ($this->studentModel->deleteStudent($id)) {
            header('Location: /Student');
        } else {
            echo "Đã xảy ra lỗi khi xoá sinh viên";
        }
    }
}
?>