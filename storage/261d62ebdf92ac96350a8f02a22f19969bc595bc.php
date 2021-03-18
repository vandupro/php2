<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">
                <div class="drop">
                    <div class="box">
                        <select tabindex="4" class="dropdown drop">
                            <option value="" class="label">Dollar :</option>
                            <option value="1">Dollar</option>
                            <option value="2">Euro</option>
                        </select>
                    </div>
                    <div class="box1">
                        <select tabindex="4" class="dropdown">
                            <option value="" class="label">English :</option>
                            <option value="1">English</option>
                            <option value="2">French</option>
                            <option value="3">German</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    <a href="<?php echo e(BASE_URL . 'cart'); ?>">
                        <span>
                            <?php echo e(isset($_SESSION['money']) ? number_format($_SESSION['money'], 0) : 'empty'); ?>

                        </span>
                        <img src="<?php echo e(THEME_FONTEND_URL); ?>images/cart-1.png" alt="" />
                    </a>
                    <!-- <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> -->
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/layouts/frontend/header.blade.php ENDPATH**/ ?>