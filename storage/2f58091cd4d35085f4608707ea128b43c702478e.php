
<?php $__env->startSection('title', 'Chi tiết đơn hàng'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- section: định nghĩa ra vùng thay đổi trong view -->
<form style="width: 80%" action="<?php echo e(ADMIN_URL . 'order/detail/edit/'. $check); ?>" method="POST">
    <input type="hidden" value="<?php echo e($check); ?>">
    <table class="table table-stripped" border="1">
        <thead>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng sản phẩm</th>
            <th>Giảm giá</th>
            <th>giá</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orderDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($c->products->name); ?></td>
                <td>
                    <input type="number" min="1" name="quantity[]" value="<?php echo e($c->quantity); ?>">
                </td>
                <td><?php echo e($c->unit_discount); ?></td>
                <td><?php echo e(number_format($c->price, 0)); ?></td>
                <td>
                    <a class="btn btn-danger" 
                    href="<?php echo e(ADMIN_URL . 'order/detail/delete/'. $check . '/' . $c->products->id); ?>">Xóa</a>
                </td>
            </tr>
            <?php
            $money += $c->quantity * $c->price * (100 - $c->unit_discount)/100
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
    <div style="text-align:center">
        <button class="btn btn-warning mb-3" type="submit" >Cập nhật</button>
    </div>
</form>

<hr>
<table class="table table-striped">
    <thead>
        <th>Họ tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt</th>
    </thead>
    <tbody>
        <tr>
            <td><?php echo e($order['customer_name']); ?></td>
            <td><?php echo e($order['customer_phone_number']); ?></td>
            <td><?php echo e($order['customer_email']); ?></td>
            <td><?php echo e($order['customer_address']); ?></td>
            <td><?php echo e($order['created_at']); ?></td>
        </tr>

    </tbody>
</table>
<h3>Tổng tiền:<?php echo e(number_format($money, 0)); ?> VND</h3>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/order/detail.blade.php ENDPATH**/ ?>