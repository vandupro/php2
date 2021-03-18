<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(BASE_URL); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(ADMIN_URL); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(ADMIN_URL . 'category'); ?>" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Danh mục</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(ADMIN_URL . 'product'); ?>">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Sản phẩm</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(ADMIN_URL . 'user'); ?>">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Người dùng</span>
        </a>
    </li>
    
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(ADMIN_URL . 'order'); ?>">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Đơn hàng</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul><?php /**PATH D:\xampp\htdocs\php2\mvc\app\views/layouts/sidebar.blade.php ENDPATH**/ ?>