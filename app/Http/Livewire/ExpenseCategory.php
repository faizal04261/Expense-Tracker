<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\expenseCategoryModel;
use Illuminate\Http\Request;
use Validator;
class ExpenseCategory extends Component
{
    public string $searchExpenseCategory ="";
    public string $expenseCategoryName ="";
    public string $expenseCategoryDesc ="";

    public string $uexpenseName ="";
    public string $uexpenseDesc ="";
    public int $ustatus = 1;
    public int $uID = 1;
    public function render()
    {
       
        return view('livewire.expense-category',[
        
            'expenseCategoryList'=> expenseCategoryModel::search($this->searchExpenseCategory)->select('expense_categories.*','users.fullname')
            ->leftJoin('users','users.id','=','expense_categories.ModifiedByID')
            ->paginate(10),
        
        ]);
    }
  
    private function updateExpenseCategory()
    {
        $expenseData = expenseCategoryModel::where('id',$this->uID)
        ->update(['name' =>$this->uexpenseName,'description'=> $this->uexpenseDesc,"statusID" => $this->ustatus,"ModifiedByID" => \Auth::user()->id]);
        

        
        if ($expenseData) {
            // session()->flash('update', 'Category successfully Updated.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'success',
                'title' => 'Expense Category successfully Updated.',
            ]);
        
        }else{
            // session()->flash('errU', 'Category failed to Update.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Expense Category failed to Update.',
            ]);
        }

    }
    public function modifyExpenseCategory(){
        try {
            $data = new Request([
                'Expense Category Name'  => $this->uexpenseName,
                'Expense Category Description' => $this->uexpenseDesc
            
                ]);
                $validator = Validator::make($data->all(), [              
                            'Expense Category Name'  => 'required',
                            'Expense Category Description' => 'required'
                        ]);

            
            if ($validator->fails()) 
            {
        
            // session()->flash('errU', $validator->messages()->all()[0]);
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => $validator->messages()->all()[0],
            ] );
        
            }else{
                $this->updateExpenseCategory();
             
            }

        } catch (\Exception $e) {
            // session()->flash('errU', 'Category name already taken');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Expense Category name already taken',
            ] );
    
            
        }
    }
    public function showExpenseCategoryDatabyID($id){
        // $userData   =userModel::select()->where('id',$id)->first();
        $expensedata   = expenseCategoryModel::where('id',$id)->first();
        $this->uexpenseName  =  $expensedata->name;
        $this->uexpenseDesc  = $expensedata->description;
        $this->ustatus = $expensedata->statusID;
        $this->uID = $expensedata->id;
        // $this->uid = $userData->fileTypeID;

     //   dd($this->ucatname);
        
     }

    private function saveExpenseCategory()
    {
        try{
            $Datas = new expenseCategoryModel;
            $Datas->name 	= $this->expenseCategoryName ;
            $Datas->description    = $this->expenseCategoryDesc ;
            $Datas->ModifiedByID    = \Auth::user()->id; //$this->roleDesc;
            $Datas->statusID 	= 1;
    
            if ($Datas->save()) {
                // session()->flash('message', 'Category successfully saved.');
                $this->dispatchBrowserEvent( 'swal', [
                    'icon' => 'success',
                    'title' => 'Expense Category successfully saved.',
                ] );

                $this->expenseCategoryName ='';
                $this->expenseCategoryDesc = '';
            }else{
                // session()->flash('errA', 'Category failed to save.');
                $this->dispatchBrowserEvent( 'swal', [
                    'icon' => 'error',
                    'title' => 'Expense Category failed to save.',
                ] );
            }

        } catch (\Exception $e) {
            // session()->flash('errU', 'Category failed to save.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Expense Category failed to save.',
            ] );
            
        }
        
    }
    public function addExpenseCategory(){
        //  dd('123444');
  
        $data = new Request([
          'Expense Category Name'  => $this->expenseCategoryName ,
          'Expense Category Description' => $this->expenseCategoryDesc 
      
          ]);
         
       $validator = Validator::make($data->all(), [
          //   $validator = validate($request, [
                  'Expense Category Name'  => 'required|unique:App\Models\expenseCategoryModel,name',
                  'Expense Category Description' => 'required'
                  
              
                      
              ]);
              if ($validator->fails()) 
              {
             
              //   session()->flash('errA', $validator->messages()->all()[0]);
                  $this->dispatchBrowserEvent( 'swal', [
                      'icon' => 'error',
                      'title' => $validator->messages()->all()[0],
                  ] );
           
              }else{
  
                $this->saveExpenseCategory();
  
              }
      }
}
