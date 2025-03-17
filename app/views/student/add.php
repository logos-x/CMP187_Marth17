<?php include 'app/views/shares/header.php'; ?>

<h1>Thêm Sinh viên mới</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form action="/Student/save" method="post" onsubmit="return validateForm();" enctype="multipart/form-data">
    <div class="form-group">
        <label for="MaSV">Mã Sinh viên:</label>
        <input type="text" id="MaSV" name="MaSV" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="HoTen">Họ tên:</label>
        <input type="text" id="HoTen" name="HoTen" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="GioiTinh">Giới tính:</label>
        <input type="text" id="GioiTinh" name="GioiTinh" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="NgaySinh">Ngày sinh:</label>
        <input type="text" id="NgaySinh" name="NgaySinh" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="MaNganh">Mã ngành:</label>
        <input type="text" id="MaNganh" name="MaNganh" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*">
    </div>

    <button class="btn btn-primary" type="submit">Thêm</button>
</form>
<a href="/Student/index" class="btn btn-secondary mt-2">Quay lại</a>
<?php include 'app/views/shares/footer.php'; ?>
