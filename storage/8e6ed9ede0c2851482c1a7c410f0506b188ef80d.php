
<?php $__env->startSection('main-content'); ?>
<div class="product">
    <h3 style="text-align:center">LATEST PRODUCT</h3>
    <div class="container">
        <div class="product-top">
            <div class="row product-one">
                <?php $__currentLoopData = $latesProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 product-left">
                    <div style="height: 400px" class="product-main simpleCart_shelfItem">
                        <a href="<?php echo e(BASE_URL . 'product-detail/' . $lp->id); ?>" class="mask"><img class="img-responsive zoom-img"
                                src="<?php echo e(PUBLIC_URL . $lp->image); ?>" alt="" style="height: 200px" /></a>
                        <div style="padding: 0 15px" class="product-bottom">
                            <h3 ><?php echo e($lp->name); ?></h3>
                            <p>Explore Now</p>
                            <h4>
                                <!-- <a class="item_add" href="#"><i></i></a>  -->
                                <span class=" item_price">$ <?php echo e(number_format($lp->price, 0)); ?></span>
                            </h4>
                        </div>
                        <div class="srch">
                            <span>-<?php echo e($lp->discount); ?>%</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <div class="clearfix"></div> -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.layout1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/frontend/index.blade.php ENDPATH**/ ?>