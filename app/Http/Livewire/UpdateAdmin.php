<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateAdmin extends Component
{
    public $first_name;

    public $last_name;

    public $email;

    public $username;

    public $admin_id;

    public $password;

    public $password_confirm;

    protected $listeners = [
        'hide.bs.modal' => 'clearError',
        'get-admin' => 'getAdminRecords',
        'password' => 'showPasswordModal'
    ];

    protected $messages = [
        'password_confirm.required' => 'Password confirmation is required.',
        'password_confirm.same' => 'Passwords do not match.'
    ];
    public function __construct()
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(404);
        }
    }

    public function validateData()
    {
        $this->validate([
            'first_name' => 'required|string|min:4',
            'last_name' => 'required|string',
            'email' => 'required|email|min:4',
            'username' => 'required|min:4'
        ]);
    }

    public function updateAdmin()
    {
        $this->username = strtolower($this->username);

        $this->validateData();
        $admin = User::where('id', $this->admin_id)->update([
            'firstname' => $this->first_name,
            'lastname' => $this->last_name,
            'email' => $this->email,
            'username' => strtolower($this->username)
        ]);


        redirect()->route('admins')->with('success', "Admin Details Updated!");
    }

    public function getAdminRecords($id)
    {

        $admin = User::findOrFail($id)->first();

        if ($admin) {
            $this->first_name = $admin->firstname;
            $this->last_name = $admin->lastname;
            $this->email = $admin->email;
            $this->username = $admin->username;
            $this->admin_id = $admin->id;
            $this->dispatchBrowserEvent('show-update-modal');
        } else {
            abort(404);
        }
    }

    public function showPasswordModal($id)
    {
        $admin = User::findOrFail($id)->first();

        if ($admin) {
            $this->admin_id = $admin->id;
            $this->dispatchBrowserEvent('show-password-modal');
        } else {
            abort(404);
        }
    }

    public function changePassword()
    {
        $this->validate([
            'password' => 'required|min:8',
            'password_confirm' =>  'required|same:password', // this will check password  
        ]);
        $admin = User::findOrFail($this->admin_id)->first();
        $admin->password = Hash::make($this->password, ['rounds' => 12]);
        $admin->save();
        $this->dispatchBrowserEvent('hide-password-modal');
    }

    public function createAdmin()
    {
        $this->validate([
            'first_name' => 'required|string|min:4',
            'last_name' => 'required|string',
            'email' => 'required|email|min:4|unique:users,email',
            'username' => 'required|min:4|unique:users,username',
            'password' => 'required|min:8',
            'password_confirm' =>  'required|same:password',
        ]);

        $data = [
            'firstname' => $this->first_name,
            'lastname' => $this->last_name,
            'email' => $this->email,
            'username' => strtolower($this->username),
            'password' => Hash::make($this->password, ['rounds' => 12]),
            'role' => 'admin'
        ];

        User::create($data);

        redirect()->route('admins')->with('success', "Admin profile created!");
    }

    /**
     * clear update form Error
     *
     * @return void
     */

    public function clearError()
    {

        $this->resetErrorBag();
        $this->first_name = "";
        $this->last_name = "";
        $this->email = "";
        $this->username = "";
        $this->password = "";
        $this->password_confirm = "";
        $this->admin_id = "";
    }


    public function render()
    {
        return view('livewire.update-admin');
    }
}
