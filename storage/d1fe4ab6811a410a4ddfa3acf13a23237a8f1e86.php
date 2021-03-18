<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <?php $__currentLoopData = $productSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li >
                <img style="width: 20%!important" src="<?php echo e(PUBLIC_URL . $p->image); ?>" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        <?php echo e($p->name); ?>

                    </h2>
                    <h4 class="caption subtitle">Dual SIM</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/layouts/slide.blade.php ENDPATH**/ ?>