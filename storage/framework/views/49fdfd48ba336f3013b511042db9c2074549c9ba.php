
            <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-question"></i>
                <p>Dashboard</p>
            </a>
<li class="nav-item has-treeview <?php echo e(Request::is('user','role') ? 'menu-open' : ''); ?>">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
            <p>User Management
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo e(route('user')); ?>" class="nav-link <?php echo e(Request::is('user') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-question"></i>
                    <p>User</p>
                </a>
            </li>
            <?php if(Auth::user()->user_roleID  == 1): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('role')); ?>" class="nav-link <?php echo e(Request::is('role') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-question"></i>
                        <p>Role</p>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li>

    <li class="nav-item has-treeview <?php echo e(Request::is('expensecategory','Expenses') ? 'menu-open' : ''); ?>">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
            <p>Expense Management
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <?php if(Auth::user()->user_roleID  == 1): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('expensecategory')); ?>" class="nav-link <?php echo e(Request::is('expensecategory') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-question"></i>
                        <p>Expense Categories</p>
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="<?php echo e(route('Expenses')); ?>" class="nav-link <?php echo e(Request::is('Expenses') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Expenses</p>
                </a>
            </li>
        </ul>
    </li>










<?php /**PATH C:\laragon\www\expenseTracker\resources\views/layouts/menu.blade.php ENDPATH**/ ?>