<div>
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>User Role</h3>
        </div>
        <!-- <div class="p-2 mr-4">
            <button id="rolediv"  data-toggle="collapse" data-target="#rolediv" class="btn btn-lg btn-primary">+ Add User Role</button>       
        </div>  -->
       
    </div>

    
    <hr style="margin: 1px !important;">
    
   
    <!-- <div  id="rolediv" class="collapse"> -->
    <div>
        <form wire:submit.prevent ="addRole" id="addrole"  style="display:block">
      

            <div class="row">
                <div class="col my-3">
                    <label for="roleName">Role Name:</label>
                    <input class="form-control" type="text" wire:model ="roleName" required>
                    <span id="roleName-span"></span>
                </div>
                <div class="col my-3">
                    <label for="roleDesc">Role Description:</label>
                    <input class="form-control" type="text" wire:model ="roleDesc" required>
                    <span id="roleDesc-span"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button >
           
        </form>
    </div>



    <div class="col-xs-2 float-right">
                <input class="form-control" type="text" placeholder="Search User Role..." wire:model="searchCategory">
    </div>
    <div class="table-responsive">
        <table id="role_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
                <tr>      
                    <th>Role ID</th>
                    <th>Role Name</th>
                    <th>Role Description</th>   
                    <th>Updated By</th>   
                    <th>Date updated</th>                      
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $roleList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roledata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    
                    <td><?php echo e($roledata->id); ?></td>
                    <td><?php echo e($roledata->name); ?></td>
                    <td><?php echo e($roledata->description); ?></td>
                    <td><?php echo e($roledata->fullname); ?></td>
                    <td><?php echo e($roledata->updated_at); ?></td>
                    <?php if($roledata->statusID =='1'): ?> 
                        <td>Active</td>
                    <?php else: ?>
                        <td>Inactive</td>        
                    <?php endif; ?>
                    <?php if( $roledata->id <> 1): ?>
                        <td><button  
                            wire:click="showRoleDatabyID(<?php echo e($roledata->id); ?>)" 
                            id="<?php echo e($roledata->id); ?>" 
                            type="button" class="btn btn-primary edit-department" data-toggle="modal" 
                            data-target="#roleModal">Modify
                        </button></td>
                    <?php else: ?>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($roleList->links('vendor.livewire.bootstrap')); ?>

    </div>


    
    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="roleModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">Modify</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body-->      
                <form wire:submit.prevent ="modifyRole">
              
        
                <div class="modal-body">
                    <label class="mr-2" for="uroleName">Role Name: </label>
                    <input class="form-control mb-2" type="text" wire:model ="uroleName" required>
                    <label class="mr-2" for="uroleDesc">Role Description: </label>
                    <input class="form-control mb-2" type="text" wire:model ="uroleDesc" required>
                
                    <label for="ustatus">Status:</label>
                    <select class="form-control mb-2" wire:model ="ustatus" >
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
<?php /**PATH C:\laragon\www\expenseTracker\resources\views/livewire/role.blade.php ENDPATH**/ ?>