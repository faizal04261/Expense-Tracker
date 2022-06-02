<div>


    <div class="d-flex justify-content-between mt-3">
        <div class="p-2">
            <h1>Training</h1>
        </div>
        <div class="p-2 mr-4">
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
                <?php elseif(session()->has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="tittle">Title:</label>
                    <input class="form-control" type="text" wire:model.defer ="title" required>
                    <span id="acctlob-span"></span>
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col mb-3">
                    <label for="desc">Description:</label>
                    <input class="form-control" type="text" wire:model.defer ="description" required>
                    <span id="desc-span"></span>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col mb-3">
                    <label for="desc">File:</label>
                    <input class="form-control" type="file" wire:model.defer="file" id='upload(<?php echo e($ctr); ?>)' required>
                    <span id="desc-span"></span>
                    <?php $__errorArgs = ['file'];
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
                <input class="form-control" type="text" placeholder="Search Training..." wire:model="searchTraining">
            </div>
        </form>
    </div>
     <div class="table-responsive">
        <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($training->id); ?></td>
                    <td><a href="<?php echo e(asset('storage/'.$training->storage.'#toolbar=0')); ?>" target="_BLANK"><?php echo e($training->title); ?></a></td>
                    <td><?php echo e($training->description); ?></td>
                    <td><button
                            wire:click="show(<?php echo e($training->id); ?>)"
                            id="<?php echo e($training->id); ?>"
                            type="button" class="btn btn-primary edit-department" data-toggle="modal"
                            data-target="#filetypeModel">Modify
                        </button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($trainings->links('vendor.livewire.bootstrap')); ?>


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

                            <label class="mr-2" for="title">Title:</label>
                            <input class="form-control mb-2" type="text" wire:model ="title" required>
                            <span id="title-span"></span>

                            <label class="mr-2" for="description">Description:</label>
                            <input class="form-control mb-2" type="text" wire:model ="description" required>
                            <span id="description-span"></span>

                            <label for="file">Update File:</label>
                            <input type="text" hidden wire:model.defer="file_uploaded">
                            <input class="form-control" type="file" wire:model.defer ="file">
                            <span id="file-span"></span>
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
<?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/livewire/lw-training.blade.php ENDPATH**/ ?>