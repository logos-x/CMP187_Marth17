<?php include 'app/views/shares/header.php'; ?>

<h1>Thông tin chi tiết</h1>
<?php //if (!empty($errors)): ?>
<!--    <div class="alert alert-danger">-->
<!--        <ul>-->
<!--            --><?php //foreach ($errors as $error): ?>
<!--                <li>--><?php //echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?><!--</li>-->
<!--            --><?php //endforeach; ?>
<!--        </ul>-->
<!--    </div>-->
<?php //endif; ?>
<div class="row">
    <div class="col-md-8">
        <div>
            <label for="">Mã sinh viên</label>
            <h3><?php echo htmlspecialchars($student->MaSV, ENT_QUOTES, 'UTF-8') ?></h3>
        </div>
        <div>
            <label for="">Họ tên</label>
            <h4><?php echo htmlspecialchars($student->HoTen, ENT_QUOTES, 'UTF-8') ?></h4>
        </div>
        <div>
            <label for="">Ngày sinh</label>
            <p><?php echo date("d/m/Y", strtotime($student->NgaySinh)); ?></p>
        </div>
        <div>
            <label for="">Giới tính</label>
            <p><?php echo htmlspecialchars($student->GioiTinh, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <div>
            <label for="">Mã ngành</label>
            <p><?php echo htmlspecialchars($student->MaNganh, ENT_QUOTES, 'UTF-8') ?></p>

        </div>

    </div>
    <div class="col-md-4">
        <label for="image">Hình ảnh:</label>
        <div class="mb-3">
            <img id="previewImage" src="<?php echo htmlspecialchars($student->Hinh, ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Ảnh sản phẩm" class="img-fluid rounded" style="max-width: 100%; height: auto;">
        </div>
    </div>
</div>

<a href="/Student/index" class="btn btn-secondary mt-2">Quay lại</a>

<?php include 'app/views/shares/footer.php'; ?>;
