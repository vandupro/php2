
<?php $__env->startSection('main-content'); ?>
<div class="ckeckout">
    <div class="container">
        <div class="ckeck-top heading">
            <h2>CHECKOUT</h2>
        </div>
        <div class="ckeckout-top">
            <h3>My Shopping Bag (<?php echo e(count($cart)); ?>)</h3>
            <form action="<?php echo e(BASE_URL . 'cart/update'); ?>" method="POST">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 15%">Item</th>
                            <th style="width: 15%">Product name</th>
                            <th style="width: 15%">Unit price</th>
                            <th style="width: 25%">Quantity</th>
                            <th style="margin-right: 15%">Total price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sumMoney = 0;
                            $index = -1;
                        ?>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $index++;
                                $sumMoney += $c['quantity'] * $c['price'];
                                $_SESSION['money'] = $sumMoney;
                            ?>
                        <tr>
                            <td>
                                <img width="50" src="<?php echo e(PUBLIC_URL . $c['image']); ?>" />
                            </td>
                            <td><?php echo e($c['name']); ?></td>
                            <td><?php echo e(number_format($c['price'], 0)); ?></td>
                            <td>
                                <input type="number" name="quantity[<?php echo e($c['id']); ?>]" min="1" value="<?php echo e($c['quantity']); ?>">
                            </td>
                            <td><?php echo e(number_format($c['quantity'] * $c['price'], 0)); ?></td>
                            <td>
                                <a class="btn btn-danger" href="<?php echo e(BASE_URL . 'cart/delete/' . $index); ?>">Remove</a>
                            </td>
                        </tr>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div style="text-align: right">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a class="btn btn-success" href="<?php echo e(BASE_URL . 'checkout'); ?>">Checkout</a>
                </div>
            </form>
            <h3 >Total Money: <span style="color: green"><?php echo e(number_format($sumMoney, 0)); ?></span></h3>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
<div class="container">
    <div class="breadcrumbs-main">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Cart</li>
        </ol>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.layout2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/frontend/cartPage.blade.php ENDPATH**/ ?>