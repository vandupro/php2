
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('title', 'Cập nhật đơn hàng'); ?>
<form style="width: 80%" action="<?php echo e(ADMIN_URL . 'order/update'); ?>" method="post">
    <input type="hidden" name="id" value="<?php echo e($model->id); ?>">
    <div class="form-group">
        <label for="">Địa chỉ giao hàng</label>
        <input class="form-control" type="text" name="customer_address" value="<?php echo e($model->customer_address); ?>">
    </div>
        <label for="">Trạng thái</label><br>
        <?php if($model->status == 1): ?>
            <input class="ml-3" type="radio" name="status" value="0"> Chưa thanh toán
            <input class="ml-3" type="radio" name="status" checked value="1"> Đã thanh toán
        <?php elseif($model->status == 0): ?>
            <input class="ml-3" type="radio" name="status" checked value="0"> Chưa thanh toán
            <input class="ml-3" type="radio" name="status" value="1"> Đã thanh toán
        <?php endif; ?>
    </div>
    <div class="form-group">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Lưu</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/order/edit.blade.php ENDPATH**/ ?>