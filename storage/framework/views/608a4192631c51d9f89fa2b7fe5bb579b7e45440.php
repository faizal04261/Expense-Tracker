<div>


    <div class="d-flex justify-content-between mt-3">
        <div class="p-2">
            <h1>Account & LOB Maintenance</h1>
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
            <div>
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-2 my-3">
                    <label for="account">Vertical:</label>
                    <select class="form-control" wire:model.defer ="vertical_id" >
                        <option></option>
                        <?php $__currentLoopData = $verticals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vertical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value=<?php echo e($vertical->id); ?>><?php echo e($vertical->vertical); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['vertical_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-4 my-3">
                    <label for="acctlob">Account:</label>
                    <input class="form-control" type="text" wire:model.defer ="acct_lob" required>
                    <span id="acctlob-span"></span>
                    <?php $__errorArgs = ['acct_lob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-6 my-3">
                    <label for="desc">Description:</label>
                    <input class="form-control" type="text" wire:model.defer ="acct_description" required>
                    <span id="desc-span"></span>
                    <?php $__errorArgs = ['acct_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button >
            <div class="col-xs-2 float-right">
                <input class="form-control" type="text" placeholder="Search Account..." wire:model="searchAccount">
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Vertical</th>
                <th>Account & LOB </th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($acct->id); ?></td>
                    <?php $__currentLoopData = $verticals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vertical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($vertical->id == $acct->vertical_id): ?>
                        <td><?php echo e($vertical->vertical); ?></td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($acct->acct_lob); ?></td>
                    <td><?php echo e($acct->acct_description); ?></td>
                    <?php if($acct->status =='1'): ?>
                        <td>Active</td>
                    <?php else: ?>
                        <td>Inactive</td>
                    <?php endif; ?>
                    <td><button
                            wire:click="show(<?php echo e($acct->id); ?>)"
                            id="<?php echo e($acct->id); ?>"
                            type="button" class="btn btn-primary edit-department" data-toggle="modal"
                            data-target="#filetypeModel">Modify
                        </button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <?php echo e($accounts->links('vendor.livewire.bootstrap')); ?>



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
                        <div>
                            <?php if(session()->has('errU')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(session('errU')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(session()->has('update')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('update')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="modal-body">

                            <label class="mr-2" for="acctlob">Account & LOB:</label>
                            <input class="form-control mb-2" type="text" wire:model ="acct_lob" required>
                            <span id="acctlob-span"></span>

                            <label class="mr-2" for="acct_description">Description:</label>
                            <input class="form-control mb-2" type="text" wire:model ="acct_description" required>
                            <span id="acct_description-span"></span>

                            <label for="account">Vertical:</label>
                            <select class="form-control mb-2" wire:model.defer ="vertical_id" >
                                <?php $__currentLoopData = $verticals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vertical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($vertical->id); ?>><?php echo e($vertical->vertical); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <label class="mr-2" for="userstatus">Status:</label>
                            <select class="form-control mb-2" wire:model ="status" >
                                <option value=1>Active</option>
                                <option value=2>Inactive</option>
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
<?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/livewire/lw-account.blade.php ENDPATH**/ ?>