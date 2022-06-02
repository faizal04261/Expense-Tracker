<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\expenseModel;
use App\Models\expenseCategoryModel;
use Illuminate\Http\Request;
use Validator;
class Expenses extends Component
{
    public string $searchExpense ="";
    public  $expenseCat =1;
    public   $amount = 0;
    public  $edate = "";

    public  $uexpenseCat =1;
    public   $uamount = 0;
    public  $uedate = "";
    public int $ustatus = 1;
    public int $uID = 1;
    public function render()
    {
      //  return view('livewire.expenses');

        return view('livewire.expenses',[
            'expenseCategorylist'=> expenseCategoryModel::all(),
            'expenseList'=> expenseModel::search($this->searchExpense)->select('expenses.*','expense_categories.name','users.fullname')
            ->leftJoin('expense_categories','expense_categories.id','=','expenses.catigoryID')
            ->leftJoin('users','users.id','=','expenses.ModifiedByID')
            ->paginate(10),
        
          // 'cateconfiglist' => $this->aQuestionCatroyDatalist,
           // 'questionlist' => $this->aQuestionDatalist,
            //'examlist' => $this->getExamList(),
        ]);

       
    }

    private function updateExpense()
    {
        $roleData = expenseModel::where('id',$this->uID)
        ->update(['catigoryID' =>$this->uexpenseCat,'Amount'=> $this->uamount,'entryDate'=> $this->uedate,"statusID" => $this->ustatus,"ModifiedByID" => \Auth::user()->id]);
        

        
        if ($roleData) {
            // session()->flash('update', 'Category successfully Updated.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'success',
                'title' => 'Expense Updated.',
            ]);
        
        }else{
            // session()->flash('errU', 'Category failed to Update.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Expense failed to Update.',
            ]);
        }

    }
    
    public function modifyexpense(){
        try {
            $data = new Request([
                'Expense Category'  => $this->uexpenseCat,
                'Expense Amount' => $this->uamount,
                'Expense Entry Date' => $this->uedate
            
                ]);
                $validator = Validator::make($data->all(), [              
                            'Expense Category' => 'required',
                            'Expense Amount' => 'required',
                            'Expense Entry Date'  => 'required'
                        ]);

            
            if ($validator->fails()) 
            {
        
            // session()->flash('errU', $validator->messages()->all()[0]);
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => $validator->messages()->all()[0],
            ] );
        
            }else{
                $this->updateExpense();
             
            }

        } catch (\Exception $e) {
            // session()->flash('errU', 'Category name already taken');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Expense failed to save',
            ] );
    
            
        }
    }
    public function showExpenseByID($id){
      
        $expensedata   = expenseModel::where('id',$id)->first();
        $this->uexpenseCat =  $expensedata->catigoryID;
        $this->uamount = $expensedata->Amount;
        $this->uedate = $expensedata->entryDate;
        $this->ustatus = $expensedata->statusID;
        $this->uID = $expensedata->id;


       
        // $this->uid = $userData->fileTypeID;

     //   dd($this->ucatname);
        
     }
    private function saveExpense()
    {
       
        try{
            $Datas = new expenseModel;
            $Datas->catigoryID 	= $this->expenseCat;
            $Datas->Amount    = $this->amount;
            $Datas->entryDate    = $this->edate;
            $Datas->ModifiedByID    = \Auth::user()->id; //$this->roleDesc;
            $Datas->statusID 	= 1;
    
            if ($Datas->save()) {
                // session()->flash('message', 'Category successfully saved.');
                $this->dispatchBrowserEvent( 'swal', [
                    'icon' => 'success',
                    'title' => 'Expense successfully saved.',
                ] );

                // $this->expenseCat ='';
                $this->amount = '';
                $this->edate = '';
            }else{
                // session()->flash('errA', 'Category failed to save.');
                $this->dispatchBrowserEvent( 'swal', [
                    'icon' => 'error',
                    'title' => 'Expense failed to save.',
                ] );
            }

        } catch (\Exception $e) {
            // session()->flash('errU', 'Category failed to save.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Expense failed to save.',
            ] );
            
        }
        
    }
    public function addExpense(){
     
        $data = new Request([
          'Expense'  => $this->expenseCat,
          'Ammount' => $this->amount,
          'Entry Date' => $this->edate,
      
          ]);
         
       $validator = Validator::make($data->all(), [

                  'Expense'  => 'required',
                  'Ammount' => 'required',
                  'Entry Date' => 'required'
              ]);
              if ($validator->fails()) 
              {
             
             
                  $this->dispatchBrowserEvent( 'swal', [
                      'icon' => 'error',
                      'title' => $validator->messages()->all()[0],
                  ] );
           
              }else{
  
                $this->saveExpense();
  
              }
      }
}
