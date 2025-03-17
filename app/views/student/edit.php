<?php include 'app/views/shares/header.php'; ?>

<h1>Sửa Sinh viên</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form action="/Student/update" method="post" onsubmit="return validateForm();" enctype="multipart/form-data">
    <input type="hidden" name="MaSV" value="<?php echo $student->MaSV ?>">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="HoTen">Tên Sản phẩm:</label>
                <input type="text" id="HoTen" name="HoTen" class="form-control" required
                       value="<?php echo htmlspecialchars($student->HoTen, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="form-group">
                <label for="GioiTinh">Giới tính:</label>
                <input name="GioiTinh" id="GioiTinh" class="form-control" required
                value="<?php echo htmlspecialchars($student->GioiTinh, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="form-group">
                <label for="NgaySinh">Ngày sinh:</label>
                <input name="NgaySinh" id="NgaySinh" class="form-control" required
                value="<?php echo htmlspecialchars($student->NgaySinh, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="form-group">
                <label for="MaNganh">Mã ngành:</label>
                <input type="text" id="MaNganh" name="MaNganh" class="form-control" required step="0.01"
                       value="<?php echo htmlspecialchars($student->MaNganh, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
        </div>
        <div class="col-md-4">
            <label for="image">Hình ảnh sinh viên:</label>
            <div class="mb-3">
                <img id="previewImage" src="<?php echo htmlspecialchars($student->Hinh, ENT_QUOTES, 'UTF-8'); ?>"
                     alt="Ảnh sản phẩm" class="img-fluid rounded" style="max-width: 100%; height: auto;">
            </div>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" onchange="previewFile()">
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
<a href="/Student/index" class="btn btn-secondary mt-2">Quay lại</a>

<script>
    function previewFile() {
        var preview = document.getElementById('previewImage');
        var file = document.getElementById('image').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
<?php include 'app/views/shares/footer.php'; ?>;
