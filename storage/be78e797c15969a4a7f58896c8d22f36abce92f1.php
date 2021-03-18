<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="<?php echo e(BASE_URL); ?>">Home</a></li>
                        <li ><a href="<?php echo e(BASE_URL . 'product'); ?>">All</a></li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="grid"><a href="<?php echo e(BASE_URL . 'category/' . $cate->id); ?>"><?php echo e($cate->name); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="<?php echo e(BASE_URL . 'search'); ?>" method="POST">
                        <input type="text" name="keyword" value="<?php echo e(isset($keyword) ? $keyword : 'Search'); ?>" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/layouts/frontend/menu.blade.php ENDPATH**/ ?>