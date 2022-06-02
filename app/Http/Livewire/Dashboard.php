<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\expenseModel;
use App\Models\expenseCategoryModel;
use Illuminate\Support\Facades\DB;
class Dashboard extends Component
{
    public string $fdate = "";
    public string $tdate = "";
    public  $expenselist = [];
    public function render()
    {
        // $tmpExpense = expenseModel::get();  

        // dd($tmpExpense);
       // $this->loaddata();
     //  $this->expenselist = [];
        return view('livewire.dashboard',[
            'expensesList'=>$this->expenselist,

        ]);
    }


    public function loaddata(){


        $tmpExpense = expenseModel::select('expenses.*','expense_categories.name',DB::raw('sum(expenses.Amount) as totalAmount'),DB::raw('count(expenses.id) as count'))
        ->leftJoin('expense_categories','expense_categories.id','=','expenses.catigoryID')   
        ->where('entryDate','>=',$this->fdate)    
        ->where('entryDate','<=',$this->tdate)
        ->groupby('expenses.catigoryID')//->sum('expenses.Amount');
        ->get();
       
        $this->expenselist = $tmpExpense;
       // dd( $this->expenselist);
       
        
    }
}
