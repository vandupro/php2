
<?php $__env->startSection('title', 'Chi tiết đơn hàng'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- section: định nghĩa ra vùng thay đổi trong view -->
<div class="container" style="margin-bottom: 50px">
    <h3 style="text-align:center; margin-bottom: 20px">THÔNG TIN HÓA ĐƠN BẠN VỪA MUA</h3>
    <table class="table table-stripped" border="1">
        <thead>
            <th style="width: 15%">Stt</th>
            <th style="width: 25%">Tên sản phẩm</th>
            <th style="width: 25%">Ảnh sản phẩm</th>
            <th style="width: 15%">Số lượng sản phẩm</th>
            <th style="width: 15%">Giảm giá</th>
            <th>giá</th>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orderDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($c->products->name); ?></td>
                <td>
                    <img style="height: 100px" src="<?php echo e(PUBLIC_URL . $c->products->image); ?>" alt="">
                </td>
                <td>
                    <?php echo e($c->quantity); ?>

                </td>
                <td><?php echo e($c->unit_discount); ?></td>
                <td><?php echo e(number_format($c->price, 0)); ?></td>
            </tr>
            <?php
            $money += $c->quantity * $c->price * (100 - $c->unit_discount)/100
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <hr>
    <table class="table table-striped">
        <thead>
            <th style="width: 15%">Họ tên khách hàng</th>
            <th style="width: 15%">Số điện thoại</th>
            <th style="width: 15%">Email</th>
            <th style="width: 35%">Địa chỉ</th>
            <th >Ngày đặt</th>
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
    <div style="text-align:center">
        <a href="<?php echo e(BASE_URL . 'product'); ?>" class="btn btn-info">Tiếp tục mua hàng</a>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.layout2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/frontend/cartDetail.blade.php ENDPATH**/ ?>