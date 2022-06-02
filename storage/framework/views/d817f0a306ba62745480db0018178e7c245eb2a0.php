<div>
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>Users</h3>
        </div>
       
       
    </div>

    <?php if(Auth::user()->user_roleID  == 1): ?>
        <hr style="margin: 1px !important;">
        
    
        <div >
            <form wire:submit.prevent ="adduser" id="adduser"  style="display:block">
            

                <div class="row">

                    <div class="col my-3">
                        <label for="Fullname">Name:</label>
                        <input class="form-control" type="text" wire:model ="Fullname" required>
                        <span id="Fullname-span"></span>
                    </div>

                    <div class="col mb-3">
                        <label for="Email">Email:</label>
                        <input class="form-control" type="text" wire:model ="Email" required>
                        <span id="Email-span"></span>
                    </div>
                    <div class="col mb-3">
                        <label for="Password">Password:</label>
                        <input class="form-control" type="password"  wire:model ="password" required>
                        <span id="Password-span"></span>
                    </div>
                    <div class="col my-3">
                        <label for="roleID">Role:</label>
                            <select class="form-control "  wire:model ="roleID" name="roleID"  >
                                <?php $__currentLoopData = $rolelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $role->statusID == 1): ?>
                                      <option value=<?php echo e($role->id); ?>><?php echo e($role->name); ?></option>       
                                    <?php endif; ?>
                                                      
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </div>
                
                </div>
                <button type="submit" class="btn btn-primary">Save</button >
            
            </form>
        </div>
    <?php endif; ?>

    

    <div class="col-xs-2 float-right">
                <input class="form-control" type="text" placeholder="Search User user..." wire:model="searchUser">
    </div>
    <div class="table-responsive">
        <table id="user_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
                <tr>      
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>   
                    <th>Role</th> 
                    <th>Date updated</th>                      
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $userlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    
                    <td><?php echo e($userdata->id); ?></td>
                    <td><?php echo e($userdata->fullname); ?></td>
                    <td><?php echo e($userdata->email); ?></td>
                    <td><?php echo e($userdata->role); ?></td>           
                    <td><?php echo e($userdata->updated_at); ?></td>
                    <?php if($userdata->status =='1'): ?> 
                        <td>Active</td>
                    <?php else: ?>
                        <td>Inactive</td>        
                    <?php endif; ?>
                  
                        <td><button  
                            wire:click="showUserByID(<?php echo e($userdata->id); ?>)" 
                            id="<?php echo e($userdata->id); ?>" 
                            type="button" class="btn btn-primary edit-department" data-toggle="modal" 
                            data-target="#userModal">Modify
                        </button></td>
                  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($userlist->links('vendor.livewire.bootstrap')); ?>

    </div>



    
    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="userModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">Modify</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body-->      
                <form wire:submit.prevent ="modifyUser">               
        
                <div class="modal-body">


                    <label for="uFullname">Name:</label>
                    <input class="form-control" type="text" wire:model ="uFullname" required>
                    <label for="uEmail">Email:</label>
                    <input class="form-control" type="text" wire:model ="uEmail" required>
                    <label for="uPassword">Password:</label>
                    <input class="form-control" type="password"  wire:model ="upassword" required>
                    <?php if(Auth::user()->user_roleID  == 1): ?>
                        <label for="uroleID">Role:</label>
                            <select class="form-control "  wire:model ="uroleID" name="uroleID"  >
                                <?php $__currentLoopData = $rolelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($role->id); ?>><?php echo e($role->name); ?></option>                           
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        <label for="ustatus">Status:</label>
                        <select class="form-control mb-2" wire:model ="ustatus" >
                            <option value=1>Active</option>
                            <option value=2>Inactive</option>
                        </select>
                    <?php endif; ?>
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
<?php /**PATH C:\laragon\www\expenseTracker\resources\views/livewire/user.blade.php ENDPATH**/ ?>