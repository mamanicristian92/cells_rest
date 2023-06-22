<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UserType;
use App\Models\DocumentType;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Hash;

class ShowUsers extends Component
{
    use WithPagination;

    //table data
    public $fields = ['Id','nombre','tipo','país','correo','opciones'];

    //properties
    public $countries;
    public $states;

    public $search='';
    public $column='id';
    public $direction='desc';
    public $modal_edit=false;
    public $modal_create=false;
    public $modal_view=false;

    //User data
    public $name=null;
    public $email=null;
    public $password=null;
    public $user_type_id=null;
    public $doc_type_id=null;
    public $doc_number=null;
    public $country_id=null;
    public $state_id=null;
    public $city=null;
    public $phone_number=null;
    public $address=null;
    public $birthday=null;
    public $enabled=true;

    protected $rules = [
        'name' => 'required|min:3|string',
        'email' => 'required|email',
        //'user_type_id' => 'required',
        'phone_number' => 'nullable|string',
    ];

    protected $messages = [
        'required' => "Campo Requerido.",
        'integer' => "Sólo números enteros.",
        'min:3' => "Número es demasiado corto.",
        'alpha' => "Sólo letras.",
        'decimal' => "Máximo dos dígitos decimales."
    ];

    public function mount() {
        $this->countries=Country::all();
        $this->user_types=UserType::all();
        $this->doc_types=DocumentType::all();
    }

    public function render()
    {
        $users=User::where('name','like','%'.$this->search.'%')->orderBy($this->column,$this->direction);
        $this->states=State::where('country_id',$this->country_id)->get();
        return view('livewire.users.show-users',[
            'users'=>$users->paginate(10)
        ]);
    }

    public function openModalEdit() {
        $this->modal_edit=true;
        $this->active_modal=1;
    }
    public function closeModalEdit() {
        $this->modal_edit=false;
        $this->active_modal=0;
    }

    public function openModalView() {
        $this->modal_view=true;
        $this->active_modal=2;
    }
    public function closeModalView() {
        $this->modal_view=false;
        $this->active_modal=0;
    }
    public function openModalCreate()
    {
        //$this->resetFields();
        $this->modal_create = true;
        $this->active_modal=3;
    }
    public function closeModalCreate()
    {
        $this->modal_create = false;
        $this->active_modal=0;
    }

    public function resetFields() {
        $this->name="";
        $this->email="";
        $this->password="";
        $this->user_type_id=null;
        $this->doc_type=null;
        $this->doc_number=null;
        $this->country_id=null;
        $this->state_id=null;
        $this->city=null;
        $this->phone_number=null;
        $this->address=null;
        $this->birthday=null;
    }

    public function edit($id) {
        $this->resetFields();
        $user=User::find($id);
        $this->user_id=$id;
        $this->name=$user->name;
        $this->email=$user->email;
        //$this->password=$user->password??"";
        $this->user_type_id=$user->user_type_id;
        $this->doc_type=$user->doc_type;
        $this->doc_number=$user->doc_number;
        $this->country_id=$user->country_id;
        $this->state_id=$user->state_id;
        $this->city=$user->city;
        $this->phone_number=$user->phone_number;
        $this->address=$user->address;
        $this->birthday=$user->birthday;
        $this->openModalEdit();
    }

    public function view($id) {
        $this->resetFields();
        $user=User::find($id);
        $this->user_id=$id;
        $this->name=$user->name;
        $this->email=$user->email;
        //$this->password=$user->password??"";
        $this->user_type_id=$user->user_type_id;
        $this->doc_type=$user->doc_type;
        $this->doc_number=$user->doc_number;
        $this->country_id=$user->country_id;
        $this->state_id=$user->state_id;
        $this->city=$user->city;
        $this->phone_number=$user->phone_number;
        $this->address=$user->address;
        $this->birthday=$user->birthday;
        $this->openModalView();
    }

    public function create()
    {
        $this->resetValidation();
        $this->resetFields();
        $this->openModalCreate();
    }

    public function store()
    {
        $this->validate();
        User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'user_type_id' => ($this->user_type_id==null||$this->user_type_id=="")?7:$this->user_type_id,
                'doc_type_id' => $this->doc_type_id,
                'doc_number' => $this->doc_number,
                'birthday' => $this->birthday,
                'address' => $this->address,
                'country_id' => $this->country_id,
                'state_id' => $this->state_id,
                'city' => $this->city,
                'phone_number' => $this->phone_number,
                'enabled' => true,
            ]
        );
        $this->resetFields();
        $this->closeModalCreate();
    }

    public function update() {
        $user=User::find($this->user_id);
        $user->id=$this->user_id;
        $user->name=$this->name;
        $user->email=$this->email;
        $user->password=($this->password==""||$this->password==null)?$user->password:Hash::make($this->password);
        $user->user_type_id=($this->user_type_id==null||$this->user_type_id=="")?7:$this->user_type_id;
        $user->doc_type=$this->doc_type=$user->doc_type;
        $user->doc_number=$this->doc_number;
        $user->country_id=$this->country_id;
        $user->state_id=$this->state_id;
        $user->city=$this->city;
        $user->phone_number=$this->phone_number;
        $user->address=$this->address;
        $user->birthday=$this->birthday;
        $user->save();
        $this->closeModalEdit();
    }

    public function order($column) {
        if ($this->column==$column) {
            if ($this->direction=='asc') {
                $this->direction='desc';
            }
            else {
                $this->direction='asc';
            }
        }
        else {
            $this->direction=='desc';
        }
        $this->column=$column;
    }
}
