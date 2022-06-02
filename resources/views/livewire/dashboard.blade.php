<div>

    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h3>Dashboard</h3>
        </div>
       
       
    </div>
    <hr style="margin: 1px !important;">
        
    
        <div >
            <form wire:submit.prevent ="loaddata" id="loaddata"  style="display:block">
            

                <div class="row">

                    <div class="col mb-3">
                        <label for="fdate">From Date:</label>
                        <input class="form-control" type="date" required  wire:model ="fdate" required>
                        <span id="fdate-span"></span>
                    </div>

                    <div class="col mb-3">
                        <label for="tdate">To Date:</label>
                        <input class="form-control" type="date" required  wire:model ="tdate" required>
                        <span id="tdate-span"></span>
                    </div>
                  
                
                </div>
                <button type="submit" class="btn btn-primary">Load</button >
            
            </form>
        </div>



        
    <div class="table-responsive">
        <table id="user_table" class="table table-hover table-bordered mt-4">
            <thead class="thead-dark">
                <tr>      
                    <th>Count</th>
                    <th>Expense Category</th>
                    <th>Total Amount</th>   
                   
                </tr>
            </thead>
            <tbody>
                @foreach($expensesList as $expense)
                <tr>
                    
                    <td>{{ $expense->count }}</td>
                    <td>{{ $expense->name }}</td>
                    <td>{{ $expense->totalAmount }}</td>
                    
                   
                  
                </tr>
                @endforeach
            </tbody>
        </table>
      
    </div>


</div>
