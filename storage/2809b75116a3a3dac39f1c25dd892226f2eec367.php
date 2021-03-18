
<?php $__env->startSection('main-content'); ?>
<div class="product">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="<?php echo e(PUBLIC_URL . $product->image); ?>">
                                    <div class="thumb-image"> <img src="<?php echo e(PUBLIC_URL . $product->image); ?>"
                                        style="height: 300px;"    data-imagezoom="true" class="img-responsive" alt="" /> </div>
                                </li>
                                <li data-thumb="<?php echo e(PUBLIC_URL . $product->image); ?>">
                                    <div class="thumb-image"> <img src="<?php echo e(PUBLIC_URL . $product->image); ?>"
                                    style="height:300px"    data-imagezoom="true" class="img-responsive" alt="" /> </div>
                                </li>
                                <li data-thumb="<?php echo e(PUBLIC_URL . $product->image); ?>">
                                    <div class="thumb-image"> <img src="<?php echo e(PUBLIC_URL . $product->image); ?>"
                                    style="height:300px"    data-imagezoom="true" class="img-responsive" alt="" /> </div>
                                </li>
                            </ul>
                        </div>
                        <!-- FlexSlider -->
                        <script src="<?php echo e(THEME_FONTEND_URL); ?>js/imagezoom.js"></script>
                        <script defer src="<?php echo e(THEME_FONTEND_URL); ?>js/jquery.flexslider.js"></script>
                        <link rel="stylesheet" href="<?php echo e(THEME_FONTEND_URL); ?>css/flexslider.css" type="text/css"
                            media="screen" />

                        <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                        </script>
                    </div>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?php echo e($product->name); ?></h2>
                            <div class="star-on">
                                <ul class="star-footer">
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                </ul>
                                <!-- <div class="review">
                                <a href="#"> 1 customer review </a>

                            </div> -->
                                <div class="clearfix"> </div>
                            </div>
                            <h5 class="item_price">$ <?php echo e(number_format($product->price, 0)); ?></h5>
                            <p><?php echo $product->description; ?></p>
                            <a href="<?php echo e(BASE_URL . 'add-to-cart/' . $product->id); ?>" class="add-cart item_add">ADD TO CART</a>

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="tabs">
                    <ul class="menu_drop">
                        <li class="item1"><a href="#"><img src="<?php echo e(THEME_FONTEND_URL); ?>images/arrow.png"
                                    alt="">Description</a>
                            <ul>
                                <li class="subitem1"><a href="#"><?php echo $product->description; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="latestproducts">
                    <h1 style="text-align:center; padding-top: 25px">RELATED PRODUCT</h1>
                    <div class="product-one">
                        <?php $__currentLoopData = $relateProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 product-left p-left">
                            <div style="height: 400px" class="product-main simpleCart_shelfItem">
                                <a href="<?php echo e(BASE_URL . 'product-detail/' . $rp->id); ?>" class="mask"><img class="img-responsive zoom-img"
                                    src="<?php echo e(PUBLIC_URL . $rp->image); ?>" alt="" style="height: 200px;" /></a>
                                <div style="padding: 0 15px" class="product-bottom">
                                    <h3><?php echo e($rp->name); ?></h3>
                                    <p>Explore Now</p>
                                    <h4>
                                        <!-- <a class="item_add" href="#"><i></i></a>  -->
                                        <span class=" item_price">$ <?php echo e($rp->price); ?></span>
                                    </h4>
                                </div>
                                <div class="srch">
                                    <span>-<?php echo e($rp->discount); ?>%</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 single-right">
                <div class="w_sidebar">
                    <section class="sky-form">
                        <h4>Catogories</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All
                                    Accessories</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women
                                    Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids
                                    Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men
                                    Watches</label>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>Brand</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"
                                        checked=""><i></i>kurtas</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>Colour</h4>
                        <ul class="w_nav2">
                            <li><a class="color1" href="#"></a></li>
                            <li><a class="color2" href="#"></a></li>
                            <li><a class="color3" href="#"></a></li>
                            <li><a class="color4" href="#"></a></li>
                            <li><a class="color5" href="#"></a></li>
                            <li><a class="color6" href="#"></a></li>
                            <li><a class="color7" href="#"></a></li>
                            <li><a class="color8" href="#"></a></li>
                            <li><a class="color9" href="#"></a></li>
                            <li><a class="color10" href="#"></a></li>
                            <li><a class="color12" href="#"></a></li>
                            <li><a class="color13" href="#"></a></li>
                            <li><a class="color14" href="#"></a></li>
                            <li><a class="color15" href="#"></a></li>
                            <li><a class="color5" href="#"></a></li>
                            <li><a class="color6" href="#"></a></li>
                            <li><a class="color7" href="#"></a></li>
                            <li><a class="color8" href="#"></a></li>
                            <li><a class="color9" href="#"></a></li>
                            <li><a class="color10" href="#"></a></li>
                        </ul>
                    </section>
                    <section class="sky-form">
                        <h4>discount</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and
                                    above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                            </div>
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
<div class="container">
    <div class="breadcrumbs-main">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(BASE_URL); ?>">Home</a></li>
            <li class="active">
                <a href="<?php echo e(BASE_URL . '/category/' . $product['category']['id']); ?>"><?php echo e($product['category']['name']); ?></a>
            </li>
            <li><?php echo e($product->name); ?></li>
        </ol>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.layout2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/frontend/detailPage.blade.php ENDPATH**/ ?>