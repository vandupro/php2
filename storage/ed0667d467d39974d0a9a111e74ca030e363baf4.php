
<?php $__env->startSection('title', 'Cập nhật thông tin người dùng'); ?>
<?php $__env->startSection('main-content'); ?>
<?php
    if(isset($_SESSION['error-user']))
        $err = $_SESSION['error-user'];
?>
<form style="width: 80%" action="<?php echo e(ADMIN_URL . 'user/update'); ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Họ tên</label>
        <input type="hidden" name="id" value="<?php echo e($model->id); ?>">
        <input class="form-control" type="text" name="name" value="<?php echo e($model->name); ?>">
        <span style="color:red"><?php echo e(isset($err['name']) ? $err['name'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role" id="">
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($r['id'] == $model->role): ?>
            <option selected value="<?php echo e($r['id']); ?>"><?php echo e($r['name']); ?></option>
            <?php else: ?>
            <option value="<?php echo e($r['id']); ?>"><?php echo e($r['name']); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span style="color:red"><?php echo e(isset($err['role']) ? $err['role'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="image">Avatar</label>
        <input type="file" name="image">
        <input type="hidden" name="old_image" value="<?php echo e($model->image); ?>">
        <img width="80" src="<?php echo e(PUBLIC_URL . $model->image); ?>" alt=""><br>
        <span style="color:red"><?php echo e(isset($err['image']) ? $err['image'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo e($model->email); ?>">
        <span style="color:red"><?php echo e(isset($err['email']) ? $err['email'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password">
        <span style="color:red"><?php echo e(isset($err['password']) ? $err['password'] : ''); ?></span>
    </div>
    <input name="updated_at" type="hidden" value="<?php echo e(date("Y-m-d h:i:sa")); ?>">
    <button class="btn btn-success mb-3">Cập nhật</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/user/edit.blade.php ENDPATH**/ ?>