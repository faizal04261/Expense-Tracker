<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\roleModel;
use Illuminate\Http\Request;
use Validator;
class Users extends Component
{

    public string $searchUser ="";
  
    public  string $Fullname = "";
    public string $Email = "";
    public string $password = "";
    public  $roleID = 1;

 
   
    public  string $uFullname = "";
    public string $uEmail = "";
    public string $upassword = "";
    public  $uroleID = 1;
    public int $ustatus = 1;
    public int $uID = 1;

    public function render()
    {
        //return view('livewire.user');
        // $tmplist = User::search($this->searchExpense)->select('users.*')->paginate(10);
        // dd( $tmplist);

        // $tmproleList =  roleModel::where('statusID','==',1)->get();
      //   dd(  $tmproleList);
        if( \Auth::user()->user_roleID <> 1){
            return view('livewire.user',[
                'rolelist'=> roleModel::all(),
                'userlist'=>  User::search($this->searchUser)->select('users.*','user_roles.name as role')
                ->where('users.id',\Auth::user()->id)
                ->leftJoin('user_roles','user_roles.id','=','users.user_roleID')
                ->paginate(10),
            
            ]);
        }else{
            return view('livewire.user',[
                'rolelist'=> roleModel::all(),
                'userlist'=>  User::search($this->searchUser)->select('users.*','user_roles.name as role')
                ->leftJoin('user_roles','user_roles.id','=','users.user_roleID')
                ->paginate(10),
            
            ]);
        }

        

    }

    
    private function saveUser()
    {
       
        try{
            $Datas = new User;
            $Datas->fullname 	= $this->Fullname;
            $Datas->email    = $this->Email;
            $Datas->password    = $this->password;
            $Datas->user_roleID    = $this->roleID;
            $Datas->ModifiedByID    = \Auth::user()->id; 
            $Datas->status 	= 1;
    
            if ($Datas->save()) {
                // session()->flash('message', 'Category successfully saved.');
                $this->dispatchBrowserEvent( 'swal', [
                    'icon' => 'success',
                    'title' => 'User successfully saved.',
                ] );

                $this->Fullname ='';
                $this->Email = '';
                $this->password = '';
            }else{
                // session()->flash('errA', 'Category failed to save.');
                $this->dispatchBrowserEvent( 'swal', [
                    'icon' => 'error',
                    'title' => 'User failed to save.',
                ] );
            }

        } catch (\Exception $e) {
            // session()->flash('errU', 'Category failed to save.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'User failed to save.',
            ] );
            
        }
        
    }
    public function adduser(){
     
        $data = new Request([
          'Name'  => $this->Fullname,
          'Email' => $this->Email,
          'Password' => $this->password
      
          ]);
         
       $validator = Validator::make($data->all(), [

                  'Name'  => 'required',
                  'Email' => 'required',
                  'Password' => 'required'
              ]);
              if ($validator->fails()) 
              {
             
             
                  $this->dispatchBrowserEvent( 'swal', [
                      'icon' => 'error',
                      'title' => $validator->messages()->all()[0],
                  ] );
           
              }else{
  
                $this->saveUser();
  
              }
      }

      public function showUserByID($id){
      
        $userdata   = User::where('id',$id)->first();
        $this->uFullname =  $userdata->fullname;
        $this->uEmail = $userdata->email;
        $this->upassword = $userdata->password;
        $this->ustatus = $userdata->status;
        $this->uroleID = $userdata->user_roleID;
        
        $this->uID = $userdata->id;


       
        // $this->uid = $userData->fileTypeID;

     //   dd($this->ucatname);
        
     }
    private function updateUser()
    {
        $roleData = User::where('id',$this->uID)
        ->update(['fullname' =>$this->uFullname,'email'=> $this->uEmail,'user_roleID'=> $this->uroleID,'password'=> $this->upassword,"status" => $this->ustatus,"ModifiedByID" => \Auth::user()->id]);
        

        
        if ($roleData) {
            // session()->flash('update', 'Category successfully Updated.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'success',
                'title' => 'user Updated.',
            ]);
        
        }else{
            // session()->flash('errU', 'Category failed to Update.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'user failed to Update.',
            ]);
        }

    }
   
    public function modifyUser(){
        try {
            $data = new Request([
                'Name'  => $this->uFullname,
                'Email' => $this->uEmail,
                'Password' => $this->upassword
            
                ]);
                $validator = Validator::make($data->all(), [              
                            'Name' => 'required',
                            'Email' => 'required',
                            'Password'  => 'required'
                        ]);

            
            if ($validator->fails()) 
            {
        
            // session()->flash('errU', $validator->messages()->all()[0]);
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => $validator->messages()->all()[0],
            ] );
        
            }else{
                $this->updateUser();
             
            }

        } catch (\Exception $e) {
            // session()->flash('errU', 'Category name already taken');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'User failed to save',
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

     

    
}
