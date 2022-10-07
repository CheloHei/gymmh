<?php

namespace App\Http\Livewire;

use App\Models\Measures;
use App\Models\people;
use Livewire\Component;

class ComponentPeoples extends Component
{
    protected $paginationTheme = 'bootstrap';
    //public $conector,$identificador,$imagen;
    public $open_edit = false;
    public $open_medidas = false;
    public $open_measures = false;
    public $open_payments = false;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = array('render');
    public $search='';
    public $people,$weight,$waist,$people_id,$measures;

    protected $rules = [
        'people.names' => 'required',
        'people.phone' => 'required',
        'people.age' => 'required',
        'people.born' => 'required',
        'people.inscription' => 'required',
        
    ];

    public function render()
    {
       $peoples = people::paginate(5);
        return view('livewire.component-peoples',compact('peoples'));
    }

    public function mount(people $persona)
    {
        $this->people = new people();
    }
    public function delete(people $persona)
    {
        $persona->delete();
    }
    public function edit(people $persona)
    {
        $this->people = $persona;
        $this->open_edit = true;
    }
    public function openMedidas(people $persona)
    {
        $this->people_id = $persona->id;
        $this->open_medidas = true;
    }
    public function seeMeasures(people $persona)
    {
        $this->measures = $persona->measures;
        $this->open_measures = true;
    }
    public function seePayments(people $persona)
    {
        $this->measures = $persona->measures;
        $this->open_payments = true;
    }

    public function update(){
        $this->validate();

        $this->people->save();

        $this->reset(['open_edit']);
        
    }
    public function saveMedidas(){

        $med = $this->validate([
            'weight' => 'required',
            'waist' => 'required',
            'people_id' => 'required',
        ]);

       
        Measures::create($med);

        $this->reset(['open_medidas']);
        
    }
}
