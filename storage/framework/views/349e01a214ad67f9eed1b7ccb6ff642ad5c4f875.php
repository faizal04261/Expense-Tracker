<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(config('app.name')); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <!-- <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet"> -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo \Livewire\Livewire::styles(); ?>

    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <?php echo $__env->yieldContent('third_party_stylesheets'); ?>

    <?php echo $__env->yieldPushContent('page_css'); ?>

  
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<?php echo \Livewire\Livewire::scripts(); ?>

<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo e(asset('img/user.png')); ?>"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline"><?php echo e(Auth::user()->name); ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="<?php echo e(asset('img/user.png')); ?>"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                            <?php echo e(Auth::user()->fullname); ?>

                            <small>Member since <?php echo e(Auth::user()->created_at->format('M. Y')); ?></small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                       
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <section class="content">
         
            <!-- <?php echo $__env->yieldContent('content'); ?> -->
            <?php echo e($slot); ?>

        </section>
    </div>


    <!-- Main Footer -->
    <footer class="main-footer">
        
        <strong>Copyright &copy; 2022.</strong> All rights
        reserved.
    </footer>
</div>

<!-- <script src="<?php echo e(mix('js/app.js')); ?>" defer></script> -->


<script src="<?php echo e(asset('js/sweetalert2@11.js')); ?>"></script>
<script>
    window.addEventListener('swal', event => {
        Swal.fire({
            title: event.detail.title,
            icon: event.detail.icon,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
        });
    });
</script>
<?php echo $__env->yieldPushContent('modals'); ?>
<?php echo $__env->yieldContent('third_party_scripts'); ?>
<?php echo $__env->yieldContent('scripts'); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php echo $__env->yieldPushContent('page_scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\expenseTracker\resources\views/layouts/app.blade.php ENDPATH**/ ?>