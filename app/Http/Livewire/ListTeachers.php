<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Master\PrefixEN;
use App\Models\Master\PrefixTH;
use App\Models\Master\YearClass;
use App\Models\Teacher;

class ListTeachers extends Component
{

    public $prefixTH;
    public $prefixEN;
    public $yearClass;

    public $studentID;
    public $studentNumber;
    public $studentPrefixTH;
    public $studentFirstNameTH;
    public $studentLastNameTH;
    public $studentPrefixEN;
    public $studentFirstNameEN;
    public $studentLastNameEN;
    public $studentClassYear;

    public $studentEdit;

    public function mount()
    {

        $this->yearClass = YearClass::all()->sortDesc();
        $this->prefixTH = PrefixTH::all();
        $this->prefixEN = PrefixEN::all();


    }

    public function render()
    {
        $teacher = Teacher::all();

        return view('livewire.informations.list-teachers', [
            'teachers' => $teacher,
            
        ]);
    }

    public function save()
    {
        
      
    }
    
}