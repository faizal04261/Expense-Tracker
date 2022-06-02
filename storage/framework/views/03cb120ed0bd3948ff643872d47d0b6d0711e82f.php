<div>


    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>User Maintenance</h3>
        </div>
        <div class="p-2 mr-4">
            <!-- <button id="toggleaddDepartment"  data-toggle="collapse" data-target="#paramDiv" class="btn btn-lg btn-primary">+ Add File type</button>        -->
        </div>
    </div>
    <hr style="margin: 1px !important;">

    <!-- <div  id="paramDiv" class="collapse"> -->
    <div >
        <form wire:submit.prevent ="store" style="display:block">
            <?php echo csrf_field(); ?>
            
            <div class="row">

                <div class="col mt-3 mb-2">
                    <label for="empnum">Employee Number:</label>
                    <input class="form-control" type="text" wire:model.defer ="emp_num" required>
                    <span id="empnum-span"></span>
                    <?php $__errorArgs = ['emp_num'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col mt-3 mb-2">
                    <label for="ntlogin">Username (NT Login):</label>
                    <input class="form-control" type="text" wire:model.defer ="username" required>
                    <span id="ntlogin-span"></span>
                    <?php $__errorArgs = ['nt_login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col mt-3 mb-2">
                    <label for="accountStatus">User Level:</label>
                    <select class="form-control mb-2" wire:model.defer ="user_level" >
                        <option value=1>Admin</option>
                        <option value=2>Regular</option>
                        <option value=3>New Hire</option>
                    </select>
                </div>
                <div class="col mt-3 mb-2">
                    <label for="account">Account & LOB:</label>
                    <select class="form-control mb-2" wire:model.defer ="acct" >                      
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value=<?php echo e($account->id); ?>><?php echo e($account->acct_lob); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="userFname">First Name:</label>
                    <input class="form-control" type="text" wire:model.defer ="fname" required>
                    <span id="userFname-span"></span>
                    <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col mb-3">
                    <label for="userlname">Last Name:</label>
                    <input class="form-control" type="text" wire:model.defer ="lname" required>
                    <span id="userlname-span"></span>
                    <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col mb-3">
                    <label for="useremail">Email:</label>
                    <input class="form-control" type="text" wire:model.defer ="email" required>
                    <span id="useremail-span"></span>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <button   type="submit" class="btn btn-primary">Save</button >
            <div class="col-xs-2 float-right">
                <input class="form-control" type="text" placeholder="Search User..." wire:model="searchUser">
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
            <tr>
                <th>User ID</th>
                <th>Employee Number</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>User Level</th>
                <th>Account/LOB</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $userlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->emp_num); ?></td>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->fname); ?></td>
                    <td><?php echo e($user->lname); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <?php if($user->user_level ==1): ?>
                        <td>Admin</td>
                    <?php elseif($user->user_level ==2): ?>
                        <td>Regular</td>
                    <?php else: ?>
                        <td>New Hire</td>
                    <?php endif; ?>
                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($user->acctlob_id == $acct->id): ?>
                            <td><?php echo e($acct->acct_lob); ?></td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->status =='1'): ?>
                        <td>Active</td>
                    <?php else: ?>
                        <td>Inactive</td>
                    <?php endif; ?>
                    <td><button
                            wire:click="show(<?php echo e($user->id); ?>)"
                            id="<?php echo e($user->id); ?>"
                            type="button" class="btn btn-primary edit-department" data-toggle="modal"
                            data-target="#filetypeModel">Modify
                        </button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <?php echo e($userlist->links('vendor.livewire.bootstrap')); ?>



        <!-- Modal -->
        <div  wire:ignore.self class="modal fade" id="filetypeModel" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal content-->
                    <div class="modal-header">
                        <h4 class="modal-title">Modify</h4>
                        <button type="button" class="close" wire:click="clear" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body-->
                    <form wire:submit.prevent ="update">
                        

                        <div class="modal-body">

                            <label class="mr-2" for="empnum">Employee Number:</label>
                            <input class="form-control mb-2" type="text" wire:model ="emp_num" required>
                            <span id="empnum-span"></span>

                            <label class="mr-2" for="ntlogin">Username (NT Login):</label>
                            <input class="form-control mb-2" type="text" wire:model ="username" required>
                            <span id="ntlogin-span"></span>

                            <label class="mr-2" for="userFname">First Name:</label>
                            <input class="form-control mb-2" type="text" wire:model ="fname" required>
                            <span id="userFname-span"></span>

                            <label class="mr-2" for="userlname">Last Name:</label>
                            <input class="form-control mb-2" type="text" wire:model ="lname" required>
                            <span id="userlname-span"></span>

                            <label class="mr-2" for="useremail">Email:</label>
                            <input class="form-control mb-2" type="text" wire:model ="email" required>
                            <span id="useremail-span"></span>

                            <label class="mr-2" for="user_levelupdate">User Level:</label>
                            <select class="form-control mb-2" wire:model ="user_level" >
                                <option value=1>Admin</option>
                                <option value=2>Regular</option>
                                <option value=3>New Hire</option>
                            </select>

                           <label class="mr-2" for="userstatus">Status:</label>
                            <select class="form-control mb-2" wire:model ="status" >
                                <option value=1>Active</option>
                                <option value=2>Inactive</option>
                            </select>

                            <label class="mr-2" for="account">Account & LOB:</label>
                            <select class="form-control mb-2" wire:model.defer ="acct" >
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($account->id); ?>><?php echo e($account->acct_lob); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-danger" wire:click="clear" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/livewire/lw-user.blade.php ENDPATH**/ ?>