<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\roleModel;
use Illuminate\Http\Request;
use Validator;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Model;
class Role extends Component
{
    public string $searchRole ="";
    public string $roleName ="";
    public string $roleDesc ="";

    public string $uroleName ="";
    public string $uroleDesc ="";
    public int $ustatus = 1;
    public int $uID = 1;
    public function render()
    {
       
        return view('livewire.role',[
            'roleList'=> roleModel::search($this->searchRole)->select('user_roles.*','users.fullname')
            ->leftJoin('users','users.id','=','user_roles.ModifiedByID')
            ->paginate(10),
        
        ]);


    }
  
    private function updateRole()
    {
        $roleData = roleModel::where('id',$this->uID)
        ->update(['name' =>$this->uroleName,'description'=> $this->uroleDesc,"statusID" => $this->ustatus,"ModifiedByID" => \Auth::user()->id]);
        

        
        if ($roleData) {
            // session()->flash('update', 'Category successfully Updated.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'success',
                'title' => 'Role successfully Updated.',
            ]);
        
        }else{
            // session()->flash('errU', 'Category failed to Update.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Role failed to Update.',
            ]);
        }

    }
    public function modifyRole(){
        try {
            $data = new Request([
                'Role Name'  => $this->uroleName,
                'Role Description' => $this->uroleDesc
            
                ]);
                $validator = Validator::make($data->all(), [              
                            'Role Name'  => 'required',
                            'Role Description' => 'required'
                        ]);

            
            if ($validator->fails()) 
            {
        
            // session()->flash('errU', $validator->messages()->all()[0]);
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => $validator->messages()->all()[0],
            ] );
        
            }else{
                $this->updateRole();
             
            }

        } catch (\Exception $e) {
            // session()->flash('errU', 'Category name already taken');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Role name already taken',
            ] );
    
            
        }
    }
    public function showRoleDatabyID($id){
        // $userData   =userModel::select()->where('id',$id)->first();
        $roledata   = roleModel::where('id',$id)->first();
        $this->uroleName =  $roledata->name;
        $this->uroleDesc = $roledata->description;
        $this->ustatus = $roledata->statusID;
        $this->uID = $roledata->id;
        // $this->uid = $userData->fileTypeID;

     //   dd($this->ucatname);
        
     }

    private function saveRole()
    {
        try{
            $Datas = new roleModel;
            $Datas->name 	= $this->roleName;
            $Datas->description    = $this->roleDesc;
            $Datas->ModifiedByID    = \Auth::user()->id; //$this->roleDesc;
            $Datas->statusID 	= 1;
    
            if ($Datas->save()) {
                // session()->flash('message', 'Category successfully saved.');
                $this->dispatchBrowserEvent( 'swal', [
                    'icon' => 'success',
                    'title' => 'Role successfully saved.',
                ] );

                $this->roleName ='';
                $this->roleDesc = '';
            }else{
                // session()->flash('errA', 'Category failed to save.');
                $this->dispatchBrowserEvent( 'swal', [
                    'icon' => 'error',
                    'title' => 'Role failed to save.',
                ] );
            }

        } catch (\Exception $e) {
            // session()->flash('errU', 'Category failed to save.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'error',
                'title' => 'Role failed to save.',
            ] );
            
        }
        
    }
    public function addRole(){
        //  dd('123444');
  
        $data = new Request([
          'Role Name'  => $this->roleName,
          'Role Description' => $this->roleDesc
      
          ]);
         
       $validator = Validator::make($data->all(), [
          //   $validator = validate($request, [
                  'Role Name'  => 'required|unique:App\Models\roleModel,name',
                  'Role Description' => 'required'
                  
              
                      
              ]);
              if ($validator->fails()) 
              {
             
              //   session()->flash('errA', $validator->messages()->all()[0]);
                  $this->dispatchBrowserEvent( 'swal', [
                      'icon' => 'error',
                      'title' => $validator->messages()->all()[0],
                  ] );
           
              }else{
  
                $this->saveRole();
  
              }
      }
}
