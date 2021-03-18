
<?php $__env->startSection('main-content'); ?>
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Danh sách sản phẩm</h2>
                    <div class="product-carousel">
                        <?php $__currentLoopData = $latesProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img style="height: 300px!important; padding: 0 15px;" src="<?php echo e(PUBLIC_URL . $p->image); ?>" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                        cart</a>
                                    <a href="<?php echo e(BASE_URL . 'product/' . $p->id); ?>" class="view-details-link"><i class="fa fa-link"></i>
                                        See details</a>
                                </div>
                            </div>

                            <h2><a href="single-product.html"><?php echo e($p->name); ?></a></h2>

                            <div class="product-carousel-price">
                                <ins>$<?php echo e($p->price); ?></ins> <del><?php echo e($p->discount == 0 ? '' : $p->discount); ?>%</del>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/homePage.blade.php ENDPATH**/ ?>