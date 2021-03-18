
<?php $__env->startSection('main-content'); ?>
<?php
    if(isset($_SESSION['error-category'])){
        $err = $_SESSION['error-category'];
        unset($_SESSION['error-category']);
    }
?>
<form action="<?php echo e(ADMIN_URL . 'category/update'); ?>" method="post">
    <input type="hidden" name="id" value="<?php echo e($model->id); ?>">
    <input name="updated_at" type="hidden" value="<?php echo e(date("Y-m-d h:i:sa")); ?>">
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input class="form-control" type="text" name="name" value="<?php echo e($model->name); ?>">
        <span style="color:red"><?php echo e(isset($err) ? $err['name'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea class="form-control" name="description" id="" cols="50" rows="5"><?php echo e($model->description); ?></textarea>
    </div>
    <div>
        <label for="">Show menu</label><br>
        <?php if($model->show_menu == 1): ?>
            <input type="radio" name="show_menu" value="0"> Không
            <input type="radio" name="show_menu" checked value="1"> Có
        <?php else: ?>
            <input class="ml-3" type="radio" name="show_menu" checked value="0"> Không
            <input class="ml-3" type="radio" name="show_menu" value="1"> Có
        <?php endif; ?>
    </div>
    <div class="form-group">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Lưu</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/category/edit.blade.php ENDPATH**/ ?>