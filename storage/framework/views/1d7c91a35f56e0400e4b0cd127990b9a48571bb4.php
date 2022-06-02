<div>
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>Expense Category</h3>
        </div>
        <!-- <div class="p-2 mr-4">
            <button id="expCatdiv"  data-toggle="collapse" data-target="#expCatdiv" class="btn btn-lg btn-primary">+ Add User Role</button>       
        </div>  -->
       
    </div>

    
    <hr style="margin: 1px !important;">
    
   
    <!-- <div id="expCatdiv" class="collapse"> -->
          <div>
        <form wire:submit.prevent ="addExpenseCategory" id="addExpenseCategory"  style="display:block">
            

            <div class="row">
                <div class="col my-3">
                    <label for="ExpenseCategoryName">Expense Category Name:</label>
                    <input class="form-control" type="text" wire:model ="expenseCategoryName" required>
                    <span id="ExpenseCategoryName-span"></span>
                </div>
                <div class="col my-3">
                    <label for="ExpenseCategoryDesc">Expense Category Description:</label>
                    <input class="form-control" type="text" wire:model ="expenseCategoryDesc" required>
                    <span id="ExpenseCategoryDesc-span"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button >
            
        </form>
    </div>



    <div class="col-xs-2 float-right">
                <input class="form-control" type="text" placeholder="Search Expense Category." wire:model="searchExpenseCategory">
            </div>
    <div class="table-responsive">
        <table id="expense_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
                <tr>      
                    <th>Expense Category ID</th>
                    <th>Expense Category Name</th>
                    <th>Expense Category Description</th> 
                    <th>Updated By</th>     
                    <th>Date updated</th>   
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $expenseCategoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ExpenseCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    
                    <td><?php echo e($ExpenseCategory->id); ?></td>
                    <td><?php echo e($ExpenseCategory->name); ?></td>
                    <td><?php echo e($ExpenseCategory->description); ?></td>
                    <td><?php echo e($ExpenseCategory->fullname); ?></td>
                    <td><?php echo e($ExpenseCategory->updated_at); ?></td>
                    <?php if($ExpenseCategory->statusID =='1'): ?> 
                        <td>Active</td>
                    <?php else: ?>
                        <td>Inactive</td>        
                    <?php endif; ?>
                    <td><button  
                        wire:click="showExpenseCategoryDatabyID(<?php echo e($ExpenseCategory->id); ?>)" 
                        id="<?php echo e($ExpenseCategory->id); ?>" 
                        type="button" class="btn btn-primary edit-department" data-toggle="modal" 
                        data-target="#expenseCategoryDatabyIDModal">Modify
                    </button></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($expenseCategoryList->links('vendor.livewire.bootstrap')); ?>

    </div>


    
    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="expenseCategoryDatabyIDModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">Modify</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body-->      
                <form wire:submit.prevent ="modifyExpenseCategory">
                
        
                <div class="modal-body">
                    <label class="mr-2" for="uexpenseName">Expense Category Name: </label>
                    <input class="form-control mb-2" type="text" wire:model ="uexpenseName" required>
                    <label class="mr-2" for="uexpenseDesc">Expense Category Description: </label>
                    <input class="form-control mb-2" type="text" wire:model ="uexpenseDesc" required>
                
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
<?php /**PATH C:\laragon\www\expenseTracker\resources\views/livewire/expense-category.blade.php ENDPATH**/ ?>