<?php

namespace App\Http\Livewire;

use App\Models\people;
use Livewire\Component;

class CreatePeople extends Component
{
    public $open = false;
    public $names,$age,$born,$inscription,$phone;

    public function mount(){
        $this->identificador = rand();
    }

    public function render()
    {
        return view('livewire.create-people');
    }

    

    protected $rules = [
        'names' => 'required',
        'age' => 'required',
        'born' => 'required',
        'inscription' => 'required',
        'phone' => 'required',
    ];
    
    public function save(){
        $this->validate();
        people::create([
            'names' => $this->names,
            'age' => $this->age,
            'born' => $this->born,
            'inscription' => $this->inscription,
            'phone' =>$this->phone,

        ]);
        $this->identificador = rand();
        $this->reset(['open','names','age','born','inscription','phone']);
        $this->emitTo('component-peoples','render');
        
    }
}
