<?php include 'app/views/shares/header.php'; ?>

    <h1>Danh sách Sinh viên</h1>
    <a href="/Student/add" class="btn btn-success mb-2">Thêm Sinh viên mới</a>
    <table class="table table-striped">
        <thead>
            <th>Mã Sinh viên</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Hình</th>
            <th>Mã ngành</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php if (!empty($students)): ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td>
                            <a href="/Student/show/<?php echo $student->MaSV; ?>">
                                <?php echo htmlspecialchars($student->MaSV, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($student->HoTen, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($student->GioiTinh, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php echo date("d/m/Y", strtotime($student->NgaySinh)); ?>

                        </td>
                        <td>
                            <img src="<?php echo htmlspecialchars($student->Hinh, ENT_QUOTES, 'UTF-8'); ?>"
                                 class="img-fluid rounded" style="max-width: 100px; height: auto;"
                                 alt="Hình <?php echo htmlspecialchars($student->HoTen, ENT_QUOTES, 'UTF-8'); ?>">
                        </td>
                        <td>
                            <?php echo htmlspecialchars($student->MaNganh, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <a href="/Student/edit/<?php echo $student->MaSV ?>" class="btn btn-warning">Sửa</a>
                            <a href="/Student/delete/<?php echo $student->MaSV; ?>" class="btn btn-danger"
                               onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?');">Xoá</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

<?php include 'app/views/shares/footer.php'; ?>