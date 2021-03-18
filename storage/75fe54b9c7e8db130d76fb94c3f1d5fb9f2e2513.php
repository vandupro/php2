
<?php $__env->startSection('title', 'Thêm mới người dùng'); ?>
<?php $__env->startSection('main-content'); ?>
<?php
    if(isset($_SESSION['error-user']))
        $err = $_SESSION['error-user'];
    if(isset($_SESSION['data-user']))
        $data = $_SESSION['data-user'];
?>
<form style="width: 80%" action="<?php echo e(ADMIN_URL . 'user/store'); ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Họ tên</label>
        <input class="form-control" value="<?php echo e(isset($data['name']) ? $data['name'] : ''); ?>" type="text" name="name">
        <span style="color:red"><?php echo e(isset($err['name']) ? $err['name'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role" id="">
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role['id']); ?>"><?php echo e($role['name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span style="color:red"><?php echo e(isset($err['role']) ? $err['role'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="image">Avatar</label>
        <input type="file" name="image"><br>
        <span style="color:red"><?php echo e(isset($err['image']) ? $err['image'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo e(isset($data['email']) ? $data['email'] : ''); ?>">
        <span style="color:red"><?php echo e(isset($err['email']) ? $err['email'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" value="<?php echo e(isset($data['password']) ? $data['password'] : ''); ?>">
        <span style="color:red"><?php echo e(isset($err['password']) ? $err['password'] : ''); ?></span>
    </div>
    <input name="created_at" type="hidden" value="<?php echo e(date("Y-m-d h:i:sa")); ?>">
    <button class="btn btn-success mb-3">Thêm mới</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/user/insert.blade.php ENDPATH**/ ?>