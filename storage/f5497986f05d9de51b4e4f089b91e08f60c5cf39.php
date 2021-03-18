
<?php $__env->startSection('title', 'Danh sách User'); ?>

<?php $__env->startSection('main-content'); ?>
        <?php if($_SESSION[AUTH]['role'] != 900): ?>
            <?php echo $_SESSION[MESSAGE]; ?>

        <?php else: ?>
            <a href="<?php echo e(ADMIN_URL . 'user/insert'); ?>" class="btn btn-primary mb-3">Thêm mới</a>
            <table class="table table-stripped" border="1">
                <thead>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Hành động</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($u->name); ?></td>
                        <td><?php echo e($u->email); ?></td>
                        <td>
                            <img width="80" src="<?php echo e(PUBLIC_URL . $u->image); ?>" alt="">
                        </td>
                        <td>
                            <?php if($u->role == 200): ?>
                            ADMIN
                            <?php elseif($u->role == 0): ?>
                            MEMBER
                            <?php elseif($u->role == 900): ?>
                            SUPER ADMIN
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="<?php echo e(ADMIN_URL . 'user/delete/' . $u->id); ?>">Xóa</a>
                            <a class="btn btn-warning" href="<?php echo e(ADMIN_URL . 'user/edit/' . $u->id); ?>">Sửa</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/user/index.blade.php ENDPATH**/ ?>