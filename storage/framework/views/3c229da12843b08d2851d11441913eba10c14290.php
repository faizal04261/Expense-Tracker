<div >
   
   
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>Category Maintenance</h3>
        </div>
        <div class="p-2 mr-4">
            <!-- <button id="toggleaddDepartment"  data-toggle="collapse" data-target="#paramDiv" class="btn btn-lg btn-primary">+ Add File type</button>        -->
        </div> 
    </div>

    <hr style="margin: 1px !important;">
    
    <!-- <div  id="paramDiv" class="collapse"> -->
    <div>
        <form wire:submit.prevent ="saveCategory" id="addcate"  style="display:block">
            

            <div class="row">
                <div class="col my-3">
                    <label for="accountName">Category Name:</label>
                    <input class="form-control" type="text" wire:model ="scatname" required>
                    <span id="accountName-span"></span>
                </div>
                <div class="col my-3">
                    <label for="accountDesc">Category Description:</label>
                    <input class="form-control" type="text" wire:model ="scatdesc" required>
                    <span id="accountDesc-span"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button >
            <div class="col-xs-2 float-right">
                <input class="form-control" type="text" placeholder="Search Category..." wire:model="searchCategory">
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table id="cqaccount_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
                <tr>      
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Description</th>        
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    
                    <td><?php echo e($category->id); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->description); ?></td>
                    <?php if($category->statusID =='1'): ?> 
                        <td>Active</td>
                    <?php else: ?>
                        <td>Inactive</td>        
                    <?php endif; ?>
                    <td><button  
                        wire:click="showCateDatabyID(<?php echo e($category->id); ?>)" 
                        id="<?php echo e($category->id); ?>" 
                        type="button" class="btn btn-primary edit-department" data-toggle="modal" 
                        data-target="#categoryModal">Modify
                    </button></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($categorylist->links('vendor.livewire.bootstrap')); ?>

    </div>


       
    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="categoryModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">Modify</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body-->      
                <form wire:submit.prevent ="updateCate">
                
        
                <div class="modal-body">
                    <label class="mr-2" for="accountNameModal">Category Name: </label>
                    <input class="form-control mb-2" type="text" wire:model ="ucatname" required>
                    <label class="mr-2" for="accountDescModal">Category Description: </label>
                    <input class="form-control mb-2" type="text" wire:model ="ucatdesc" required>
                
                    <label for="accountStatus">Status:</label>
                    <select class="form-control mb-2" wire:model ="ucatstat" >
                        <option value=1>Active</option>
                        <option value=2>Inactive</option>
                    </select>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>


</div>
<?php /**PATH C:\laragon\www\MandatoryComplianceTraining\resources\views/livewire/lw-category.blade.php ENDPATH**/ ?>