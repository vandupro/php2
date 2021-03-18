
<?php $__env->startSection('title', 'Cập nhật sản phẩm'); ?>
<?php
    if(isset($_SESSION['error-product']))
        $err = $_SESSION['error-product'];
?>
<?php $__env->startSection('main-content'); ?>
<form style="width: 80%" action="<?php echo e(ADMIN_URL . 'product/update'); ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="hidden" name="id" value="<?php echo e($model->id); ?>">
        <input class="form-control" type="text" name="name" value="<?php echo e($model->name); ?>">
        <span style="color:red"><?php echo e(isset($err['name']) ? $err['name'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="cate_id">Danh mục</label>
        <select class="form-control" name="cate_id" >
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($model->cate_id == $cate->id): ?>
            <option selected value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
            <?php else: ?>
            <option  value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" name="image">
        <input type="hidden" name="old_image" value="<?php echo e($model->image); ?>">
        <img width="80" src="<?php echo e(PUBLIC_URL . $model->image); ?>" alt=""><br>
        <span style="color:red"><?php echo e(isset($err['image']) ? $err['image'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="price">Giá sản phẩm</label>
        <input class="form-control" type="number" name="price" value="<?php echo e($model->price); ?>">
        <span style="color:red"><?php echo e(isset($err['price']) ? $err['price'] : ''); ?></span>
    </div>
    <div class="form-group">
        <label for="discount">Giảm giá</label>
        <input class="form-control" type="number" min="0" name="discount" value="<?php echo e($model->discount); ?>">
    </div>
    <input type="hidden" class="form-control" type="date" name="updated_at" value="<?php echo e(date("Y-m-d h:i:sa")); ?>">
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo e($model->description); ?></textarea>
    </div>
    <button class="btn btn-success mb-3">Cập nhật</button>
</form>
<script src ="https://cdn.tiny.cloud/1/7e7tgoj644o1jcg3cut6nzp82u7lgn1bh244u4rtdr5voxgp/tinymce/5/tinymce.min.js"
 referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/backend/product/edit.blade.php ENDPATH**/ ?>