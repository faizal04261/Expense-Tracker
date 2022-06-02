<div>


    <div class="d-flex justify-content-between mt-3">
        <div class="p-2">
            <h1>Settings</h1>
        </div>
        <div class="p-2 mr-4">
            <!-- <button id="toggleaddDepartment"  data-toggle="collapse" data-target="#paramDiv" class="btn btn-lg btn-primary">+ Add File type</button>        -->
        </div>
    </div>
    <hr style="margin: 1px !important;">

    <!-- <div  id="paramDiv" class="collapse"> -->
    <div >
        <form wire:submit.prevent ="storeUpdate" style="display:block">
            <?php echo csrf_field(); ?>
            <div>
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php elseif(session()->has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="num_days">Set number of days to retake:</label>
                    <input class="form-control w-25" type="text" wire:model.defer ="days_retake" required>
                    <span id="numdays-span"></span>
                    <?php $__errorArgs = ['days_retake'];
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
            
        </form>
    </div>

    <div class="table-responsive">
        <table id="Setting_table" class="table table-hover table-bordered mt-3">
            <thead class="thead-dark">
            <tr>
                <th>Settings</th>
                <th>Value</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $set): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id=<?php echo e($set->id); ?>>
                    <td>Days to retake</td>
                    <td><?php echo e($set->days_retake); ?></td>
                    <td><button
                            wire:click="show(<?php echo e($set->id); ?>)"
                            id="<?php echo e($set->id); ?>"
                            type="button" class="btn btn-primary edit-department" data-toggle="modal"
                            data-target="#filetypeModel">Modify
                        </button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($settings->links('vendor.livewire.bootstrap')); ?>


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
                    <form wire:submit.prevent ="storeUpdate">
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

                            <label class="mr-2" for="title">Days to retake:</label>
                            <input class="form-control mb-2" type="text" wire:model ="days_retake" required>
                            <span id="title-span"></span>
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
<?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/livewire/lw-setting.blade.php ENDPATH**/ ?>