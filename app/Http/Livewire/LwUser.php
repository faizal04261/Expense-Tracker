<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserMaintenance;
use Livewire\WithPagination;

//use Validator;

class LwUser extends Component
{
    use WithPagination;
    //GJG - User Maintenance controllers
    public string $searchUser ="";
    public string $emp_num = "";
    public string $username = "";
    public string $fname = "";
    public string $lname = "";
    public string $email = "";
    public int $user_level = 1;
    public int $status = 1;
    public int $uid = 1;
    public int $acct=1;

    protected $rules = [
        'emp_num' => 'required',
        'username' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email',
    ];


    public function render()
    {
        return view('livewire.lw-user',[
            'userlist'=>User::search($this->searchUser)->paginate(10),
            'accounts' => Account::all()
        ]);
    }

    public  function store()
    {
      //  dd($this->nt_login);
        $this->validate();
      //  dd($this->nt_login);
       try {
           UserMaintenance::create([
           'emp_num' => $this->emp_num,
           'username' => $this->username,
           'fname' => $this->fname,
           'lname' => $this->lname,
           'email' => $this->email,
           'acctlob_id' => $this->acct,
           'user_level' => $this->user_level,
           'status'=> $this->status,
           ]);
        $this->clear();
        // session()->flash('message', 'User successfully added');
        $this->dispatchBrowserEvent( 'swal', [
            'icon' => 'success',
            'title' => 'User successfully added',
        ]);
       }
       catch (\Exception $e){
        //    session()->flash('errP', 'Saving data failed.');
           $this->dispatchBrowserEvent( 'swal', [
            'icon' => 'error',
            'title' => 'Saving data failed.',
            ]);
       }

    }
    public  function show($id)
    {
        $user = User::findOrFail($id);
        $this->uid = $user->id;
        $this->emp_num = $user->emp_num;
        $this->username = $user->username;
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->email = $user->email;
        $this->acct = $user->acctlob_id;
        $this->user_level = $user->user_level;
        $this->status = $user->status;

      
    }

    public function update()
    {
        $this->validate();
        try {
            User::where('id', $this->uid)
                ->update([
                    'emp_num' => $this->emp_num,
                    'username' => $this->username,
                    'fname' => $this->fname,
                    'lname' => $this->lname,
                    'email' => $this->email,
                    'acctlob_id' => $this->acct,
                    'user_level' => $this->user_level,
                    'status'=> $this->status
                ]);
            // session()->flash('update', 'User successfully updated.');
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'success',
                'title' => 'User successfully updated.',
            ]);
        }
        catch (\Exception $e){
            // session()->flash('errU', $e);
            $this->dispatchBrowserEvent( 'swal', [
                'icon' => 'success',
                'title' => $e,
            ]);
        }
    }

    public function clear()
    {
        $this->emp_num = "";
        $this->username = "";
        $this->fname = "";
        $this->lname = "";
        $this->email = "";
        $this->acct = 1;
        $this->user_level = 1;
        $this->resetErrorBag();
        $this->resetValidation();

    }
}
