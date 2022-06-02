<div>
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>Expenses</h3>
        </div>
       
       
    </div>


    <hr style="margin: 1px !important;">
    
   
    <div >
        <form wire:submit.prevent ="addExpense" id="addExpense"  style="display:block">
         

            <div class="row">
                <div class="col my-3">
                   
                    
                    <label for="expenseCat">Expense Category:</label>
                        <select class="form-control "  wire:model ="expenseCat" name="expenseCat"  >
                            @foreach($expenseCategorylist as $expensecategory)
                            @if($expensecategory->statusID == 1)
                            <option value={{ $expensecategory->id }}>{{$expensecategory->name}}</option> 
                            @endif
                                                          
                            @endforeach
                        </select>
                </div>
                <div class="col my-3">
                    <label for="amount">amount:</label>
                    <input class="form-control" type="number" step="0.01"min="0.01" pattern="^\d+(?:\.\d{1,2})?$" wire:model ="amount" required>
                    <span id="amount-span"></span>
                </div>

                <div class="col mb-3">
                    <label for="edate">Entry Data:</label>
                    <input class="form-control" type="date" required  wire:model ="edate" required>
                    <span id="edate-span"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button >
           
        </form>
    </div>


    

    <div class="col-xs-2 float-right">
                <input class="form-control" type="text" placeholder="Search User Expense..." wire:model="searchExpense">
    </div>
    <div class="table-responsive">
        <table id="role_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
                <tr>      
                    <th>Expense ID</th>
                    <th>Expense Category</th>
                    <th>Amount</th>   
                    <th>Entry Date</th>  
                    <th>Updated By</th>   
                    <th>Date updated</th>                      
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenseList as $expensedata)
                <tr>
                    
                    <td>{{ $expensedata->id }}</td>
                    <td>{{ $expensedata->name }}</td>
                    <td>{{ $expensedata->Amount }}</td>
                    <td>{{ $expensedata->entryDate }}</td>
                    <td>{{ $expensedata->fullname }}</td>
                    <td>{{ $expensedata->updated_at }}</td>
                    @if($expensedata->statusID =='1') 
                        <td>Active</td>
                    @else
                        <td>Inactive</td>        
                    @endif
                  
                        <td><button  
                            wire:click="showExpenseByID({{$expensedata->id}})" 
                            id="{{ $expensedata->id }}" 
                            type="button" class="btn btn-primary edit-department" data-toggle="modal" 
                            data-target="#expenseModal">Modify
                        </button></td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $expenseList->links('vendor.livewire.bootstrap') }}
    </div>



    
    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="expenseModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">Modify</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body-->      
                <form wire:submit.prevent ="modifyexpense">               
        
                <div class="modal-body">
                     <label for="uexpenseCat">Expense Category:</label>
                        <select class="form-control "  wire:model ="uexpenseCat" name="uexpenseCat"  >
                            @foreach($expenseCategorylist as $expensecategory)
                                <option value={{ $expensecategory->id }}>{{$expensecategory->name}}</option>                           
                            @endforeach
                        </select>
                    <label for="uamount">amount:</label>
                    <input class="form-control" type="number" step="0.01"min="0.01" pattern="^\d+(?:\.\d{1,2})?$" wire:model ="uamount" required>
                   

                    <label for="uedate">Entry Data:</label>
                    <input class="form-control" type="date" required  wire:model ="uedate" required>
                
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
