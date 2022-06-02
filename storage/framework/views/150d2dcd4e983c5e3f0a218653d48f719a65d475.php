<!-- need to remove -->
<li class="nav-item has-treeview <?php echo e(Request::is('user-maintenance','training','category','account') ? 'menu-open' : ''); ?>">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Maintenance
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php if(Auth::user()->user_level <> 1): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('training')); ?>" class="nav-link <?php echo e(Request::is('training') ? 'active' : ''); ?>">
                    <i class="nav-icon fab fa-leanpub"></i>
                    <p>Training</p>
                </a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a href="<?php echo e(route('user')); ?>" class="nav-link <?php echo e(Request::is('user-maintenance') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('training')); ?>" class="nav-link <?php echo e(Request::is('training') ? 'active' : ''); ?>">
                    <i class="nav-icon fab fa-leanpub"></i>
                    <p>Training</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('category')); ?>" class="nav-link <?php echo e(Request::is('category') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Category</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('account')); ?>" class="nav-link <?php echo e(Request::is('account') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>Vertical and Account</p>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</li>



<li class="nav-item has-treeview <?php echo e(Request::is('examresult', 'report') ? 'menu-open' : ''); ?>">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>Exam
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
       
        <li class="nav-item">
            <a href="<?php echo e(route('examresult')); ?>" class="nav-link <?php echo e(Request::is('examresult') ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-poll"></i>
                <p>Exam and Result</p>
            </a>
        </li>
        <?php if(Auth::user()->user_level <> 1): ?>
            
        <?php else: ?>
            <li class="nav-item">
                <a href="<?php echo e(route('report')); ?>" class="nav-link <?php echo e(Request::is('report') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>Exam Report</p>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</li>

<?php if(Auth::user()->user_level <> 1): ?>
            
<?php else: ?>
    <li class="nav-item has-treeview <?php echo e(Request::is('questionrepo','examrepo') ? 'menu-open' : ''); ?>">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
            <p>Repository
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo e(route('questionrepo')); ?>" class="nav-link <?php echo e(Request::is('questionrepo') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-question"></i>
                    <p>Question Repository</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('examrepo')); ?>" class="nav-link <?php echo e(Request::is('examrepo') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Exam Repository</p>
                </a>
            </li>
        </ul>
    </li>
<?php endif; ?><?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/layouts/menu.blade.php ENDPATH**/ ?>