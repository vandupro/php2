
<?php $__env->startSection('title', 'Danh sách sản phẩm'); ?>
<?php $__env->startSection('main-content'); ?>
<a class="btn btn-primary mb-3" href="<?php echo e(ADMIN_URL . 'product/insert'); ?>">Thêm mới</a>
<table class="table table-hovered">
    <thead>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Tên danh mục</th>
        <th>Giá</th>
        <th>View</th>
        <th>Giảm giá(%)</th>
        <!-- <th>Ngày cập nhật</th> -->
        <th>Hành động</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($start + $loop->iteration); ?></td>
                <td><?php echo e($item->name); ?></td>
                <td>
                    <img width="80" style="height: 100px;" src="<?php echo e(PUBLIC_URL . $item->image); ?>" alt="">
                </td>
                <td><?php echo e($item->category->name); ?></td>
                <td><?php echo e(number_format($item->price, 0)); ?></td>
                <td><?php echo e($item->views); ?></td>
                <td><?php echo e($item->discount); ?></td>
                <td>
                    <a class="btn btn-warning" href="<?php echo e(ADMIN_URL . 'product/edit/' . $item->id); ?>">Sửa</a>
                    <a class="btn btn-danger" href="<?php echo e(ADMIN_URL . 'product/delete/' . $item->id); ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagination_page'); ?>
<nav aria-label="...">
    <ul class="pagination">
    <?php if(!isset($_GET['keyword'])): ?>
        <?php for($i = 1; $i <= $_SESSION['total_page']; $i++): ?>
            <li class="page-item  <?php echo e($i==$page?'active':''); ?>">
                <a class="page-link" href="<?php echo e(ADMIN_URL . 'product/'. $i); ?>"><?php echo e($i); ?> <span class="sr-only">(current)</span></a>
            </li>
        <?php endfor; ?>
    <?php else: ?>
        <?php for($i = 1; $i <= $_SESSION['total_page']; $i++): ?>
            <li class="page-item  <?php echo e($i==$page?'active':''); ?>">
                <a class="page-link" href="<?php echo e(ADMIN_URL . 'product?keyword='. $_GET['keyword'] . '&page=' . $i); ?>"><?php echo e($i); ?> <span class="sr-only">(current)</span></a>
            </li>
        <?php endfor; ?>
    <?php endif; ?>
    </ul>
</nav>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/product/index.blade.php ENDPATH**/ ?>