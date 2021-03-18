
<?php $__env->startSection('title', 'Danh sách danh mục'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- section: định nghĩa ra vùng thay đổi trong view -->
<a href="<?php echo e(ADMIN_URL . 'category/insert'); ?>" class="btn btn-primary mb-3">Thêm mới</a>
<table class="table table-stripped" border="1">
    <thead>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>Miêu tả</th>
        <th>Show menu</th>
        <th>Số sản phẩm</th>
        <th>Hành động</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($start + $loop->iteration); ?></td>
            <td><?php echo e($c->name); ?></td>
            <td><?php echo e($c->description); ?></td>
            <td><?php echo e($c->show_menu?'có':'không'); ?></td>
            <td><?php echo e(count($c->products)); ?></td>
            <td>
                <a class="btn btn-danger" href="<?php echo e(ADMIN_URL . 'category/delete/' . $c->id); ?>">Xóa</a>
                <a class="btn btn-warning" href="<?php echo e(ADMIN_URL . 'category/edit/' . $c->id); ?>">Sửa</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
</body>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagination_page'); ?>
<nav aria-label="...">
    <ul class="pagination">
    <?php if(!isset($_GET['keyword'])): ?>
        <?php for($i = 1; $i <= $_SESSION['total_page']; $i++): ?>
            <li class="page-item  <?php echo e($i==$page?'active':''); ?>">
                <a class="page-link" href="<?php echo e(ADMIN_URL . 'category/'. $i); ?>"><?php echo e($i); ?> <span class="sr-only">(current)</span></a>
            </li>
        <?php endfor; ?>
    <?php else: ?>
        <?php for($i = 1; $i <= $_SESSION['total_page']; $i++): ?>
            <li class="page-item  <?php echo e($i==$page?'active':''); ?>">
                <a class="page-link" href="<?php echo e(ADMIN_URL . 'category?keyword='. $_GET['keyword'] . '&page=' . $i); ?>"><?php echo e($i); ?> <span class="sr-only">(current)</span></a>
            </li>
        <?php endfor; ?>
    <?php endif; ?>
    </ul>
</nav>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/category/index.blade.php ENDPATH**/ ?>