
<?php $__env->startSection('title', 'Danh sách order'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- section: định nghĩa ra vùng thay đổi trong view -->

<table class="table table-stripped" border="1">
    <thead>
        <th>STT</th>
        <th>Tên khách hàng </th>
        <th>Ngày đặt</th>
        <th>Trạng thái</th>
        <th>Chi tiết</th>
        <th>Hành động</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($c->customer_name); ?></td>
            <td><?php echo e($c->created_at); ?></td>
            <td>
                <?php if($c->status == 0): ?> Chưa thanh toán
                <?php elseif($c->status == 1): ?> Thanh toán
                <?php endif; ?>
            </td>
            <td>
                <a href="<?php echo e(ADMIN_URL . 'order/detail/' . $c->id); ?>" class="btn btn-info">Chi tiết </a>
            </td>
            <td>
                <a class="btn btn-danger" href="<?php echo e(ADMIN_URL . 'order/delete/' . $c->id); ?>">Xóa</a>
                <a class="btn btn-warning" href="<?php echo e(ADMIN_URL . 'order/edit/' . $c->id); ?>">Sửa</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/order/index.blade.php ENDPATH**/ ?>